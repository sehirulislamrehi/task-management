<?php

namespace App\Services\Backend;


use App\Enum\TicketStatusEnum;
use App\Enum\UserGroupEnum;
use App\Models\Backend\CommonModule\BusinessUnit;
use App\Models\Backend\TicketingModule\TicketDetail;
use App\Models\Backend\UserModule\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Facades\DataTables;

class DashboardService
{
    /**
     * @return array
     */
    public function getTicketCount(): array
    {

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $ticketPending = TicketDetail::where("status", "pending")->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
        $ticketOnProcess = TicketDetail::where("status", "on-process")->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
        $ticketDone = TicketDetail::where("status", "done")->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
        $ticketCancelled = TicketDetail::where("status", "cancel")->whereBetween('created_at', [$startOfMonth, $endOfMonth]);

        if (auth('web')->check()) {
            $user = auth('web')->user();
            $user = (new \App\Models\Backend\UserModule\User)->find($user?->id);

            if ($user->user_group->name == "Agent") {
                $ticketPending->whereHas("ticket", function ($query) use ($user) {
                    $query->whereIn("user_id", $user->id);
                });
                $ticketOnProcess->whereHas("ticket", function ($query) use ($user) {
                    $query->whereIn("user_id", $user->id);
                });
                $ticketDone->whereHas("ticket", function ($query) use ($user) {
                    $query->whereIn("user_id", $user->id);
                });
                $ticketCancelled->whereHas("ticket", function ($query) use ($user) {
                    $query->whereIn("user_id", $user->id);
                });
            } else {
                $buId = DB::table('business_unit_user')->where("user_id", $user?->id)->pluck("business_unit_id")->toArray();

                if (count($buId) > 0) {
                    $ticketPending->whereIn("business_unit_id", $buId);
                    $ticketOnProcess->whereIn("business_unit_id", $buId);
                    $ticketDone->whereIn("business_unit_id", $buId);
                    $ticketCancelled->whereIn("business_unit_id", $buId);
                }

                if ($user->user_group->id == UserGroupEnum::SERVICE_CENTER->value) {
                    $assignedServiceCenter = DB::table('service_center_user')->where('user_id', $user->id)->pluck('service_center_id')->toArray();
                    $ticketPending->whereIn("service_center_id", $assignedServiceCenter);
                    $ticketOnProcess->whereIn("service_center_id", $assignedServiceCenter);
                    $ticketDone->whereIn("service_center_id", $assignedServiceCenter);
                    $ticketCancelled->whereIn("service_center_id", $assignedServiceCenter);
                }

            }
        }

        $ticketOnProcess = $ticketOnProcess->count();
        $ticketDone = $ticketDone->count();
        $ticketCancelled = $ticketCancelled->count();
        $ticketPending = $ticketPending->count();

        return [
            'pending' => $ticketPending,
            'on_process' => $ticketOnProcess,
            'done' => $ticketDone,
            'cancelled' => $ticketCancelled,
        ];
    }

    /**
     * In a particular business unit how many ticket are in different status
     * @param $bu_id
     * @return Collection
     */
    function ticketProgressDataByBusinessUnit($bu_id,$selected_bu_ids=null): Collection
    {
        if ($bu_id == null) {
            $query = DB::table('ticket_details')->select('status', DB::raw('COUNT(*) as count'))
                ->whereIn('business_unit_id', $selected_bu_ids)->groupBy('status');
            return $query->get();

        }

        if (auth('super_admin')->check()) {

            $query = DB::table('ticket_details')->select('status', DB::raw('COUNT(*) as count'))
                ->where('business_unit_id', $bu_id)->groupBy('status');


        } else {
            $user = auth('web')->user();

            $query = DB::table('ticket_details')->select('status', DB::raw('COUNT(*) as count'))
                ->where('business_unit_id', $bu_id)->groupBy('status');

            if ($user->user_group->id == UserGroupEnum::SERVICE_CENTER->value) {
                $assignedServiceCenter = DB::table('service_center_user')->where('user_id', $user->id)->pluck('service_center_id')->toArray();
                $query->whereIn("service_center_id", $assignedServiceCenter);
            }

        }
        return $query->get();

    }


    /**
     * Last five ticket
     * @return DataTableAbstract
     * @throws Exception
     */
    function getLastFiveTicket(): DataTableAbstract
    {
        if (auth("web")->check()) {

            $userId = auth("web")->user()->id;
            $user = User::find($userId);

            if ($user->user_group->name == "Agent") {

                $userBusinessUnit = $user->business_unit->pluck("id")->toArray();
                $ticket = TicketDetail::query()->whereHas("ticket", function ($query) use ($user) {
                    $query->where("user_id", $user->id);
                });

                if (count($userBusinessUnit) > 0) {
                    $ticket->whereIn("business_unit_id", $userBusinessUnit);
                }
                $ticket->latest()->take(5)->get();

            } else {
                $userBusinessUnit = $user->business_unit->pluck("id")->toArray();

                $ticket = TicketDetail::query();

                if (count($userBusinessUnit) > 0) {
                    $ticket->whereIn("business_unit_id", $userBusinessUnit);
                }

                if ($user->user_group->id == UserGroupEnum::SERVICE_CENTER->value) {
                    $assignedServiceCenter = DB::table('service_center_user')->where('user_id', $user->id)->pluck('service_center_id')->toArray();
                    $ticket->whereIn('ticket_details.service_center_id', $assignedServiceCenter);
                }

                $ticket->latest()->take(5)->get();

            }
        } else {
            $ticket = TicketDetail::query()->latest()->take(5)->get();
        }

        return DataTables::of($ticket)
            ->rawColumns(['status', 'created_at', 'updated_at', 'action'])
            ->editColumn('status', function (TicketDetail $ticket) {
                return $this->generateStatusBadge($ticket->status);
            })
            ->editColumn('created_at', function (TicketDetail $ticket) {
                return $ticket->created_at->format('d-m-Y h:i:s A');
            })
            ->editColumn('updated_at', function (TicketDetail $ticket) {
                return $ticket->updated_at->format('d-m-Y h:i:s A');
            })
            ->addIndexColumn();
    }

    /**
     * Generate badge according to status
     * @param $status
     * @return string
     */
    private function generateStatusBadge($status): string
    {
        $badgeClass = [
            'pending' => 'badge-info',
            'on-process' => 'badge-warning',
            'done' => 'badge-success',
            'cancel' => 'badge-danger',
        ];

        return '<span class="badge ' . $badgeClass[$status] . '">' . $status . '</span>';
    }

    /**
     * Top five agent who create most of the ticket
     * @return Collection
     */
    public function getLastFiveAgentByTicket(): Collection
    {
        return DB::table('ticket_details')
            ->join('tickets', 'ticket_details.ticket_id', '=', 'tickets.id')
            ->join('users', 'tickets.user_id', '=', 'users.id')
            ->select('users.fullname as name', DB::raw('COUNT(*) as count'))
            ->whereDate("ticket_details.created_at", date("Y-m-d"))
            ->orderByDesc('count')
            ->groupBy('users.fullname')
            ->take(5)
            ->get();
    }


    /**
     * Most arise category problem by for last three month including current month
     * @param $bu_id
     * @return array
     */
    public function fetchMostAriseCategoryProblem($bu_id,$selected_business_unit=null): array
    {


        $twoMonthsAgo = date('Y-m-01', strtotime('-2 months'));

        $data = DB::table('ticket_details')
            ->join('product_categories', 'product_categories.id', '=', 'ticket_details.product_category_id')
            ->select(
                DB::raw('YEAR(ticket_details.created_at) as year'),
                DB::raw('MONTHNAME(ticket_details.created_at) as month'),
                'product_categories.name as category_name', 'ticket_details.business_unit_id',
                DB::raw('COUNT(*) as total_tickets')
            )
            ->where('ticket_details.created_at', '>=', $twoMonthsAgo);

        if ($bu_id === null) {
            $data = $data->whereIn('business_unit_id', $selected_business_unit);
        } else {
            $data = $data->where('ticket_details.business_unit_id', $bu_id);

        }
        $data = $data->groupBy('year', 'month', 'category_name')
            ->orderBy('year')
            ->orderByRaw('MONTH(ticket_details.created_at)')
            ->orderBy('total_tickets', 'desc');
        $data = $data->get();
        $formattedData = [];
        foreach ($data as $datum) {
            if (isset($formattedData[$datum->month])) {
                if (count($formattedData[$datum->month]) < 3) {
                    $formattedData[$datum->month][$datum->category_name] = $datum->total_tickets;
                }
            } else {
                $formattedData[$datum->month][$datum->category_name] = $datum->total_tickets;
            }
        }

        return [
            'status' => 'success',
            'message' => '',
            'data' => $formattedData
        ];
    }

    /**
     * Get Most arise category problems
     */
    public function fetchMostAriseProblem($bu_id,$selectedBusinessUnitIds=null): array
    {
        $query = DB::table('ticket_detail_problems')
            ->join('product_category_problems', 'product_category_problems.id', '=', 'ticket_detail_problems.product_category_problem_id')
            ->join('product_categories', 'product_categories.id', '=', 'product_category_problems.product_category_id')
            ->join('business_unit_product_category', 'business_unit_product_category.product_category_id', '=', 'product_categories.id')
            ->join('business_units', 'business_units.id', '=', 'business_unit_product_category.business_unit_id')
            ->join('ticket_details', 'ticket_detail_problems.ticket_details_id', '=', 'ticket_details.id')
            ->whereNotIn("product_category_problems.name", ["Other Problem", "Others"]);
        if ($bu_id == null) {
            $query = $query->whereIn('business_units.id', $selectedBusinessUnitIds);
        } else {
            $query = $query->where('business_units.id', $bu_id);
        }

        $query = $query->select(
            "product_category_problems.name as problem_name",
            "business_units.name as business_unit",
            'product_categories.name as category_name',
            'business_units.id as bu_id',
            DB::raw('COUNT(*) as total_tickets')
        )
            ->groupBy('problem_name', 'category_name', 'bu_id')->orderBy('total_tickets', 'DESC');
        $data = $query->take(5)->get()->toArray();
        return [
            'status' => 'success',
            'message' => '',
            'data' => $data
        ];

    }

    public function getRealTimeCallingStatus(): array
    {
        $dataArray = DB::connection("mysql_remote")->table('vicidial_live_agents')
            ->selectRaw("
                COUNT(*) as total,
                COUNT(CASE WHEN status = 'INCALL' THEN 1 END) as incall,
                COUNT(CASE WHEN status = 'PAUSED' THEN 1 END) as paused,
                COUNT(CASE WHEN status = 'READY' OR status = 'CLOSER' THEN 1 END) as waiting
            ")
            ->first();

        $ivr = DB::connection("mysql_remote")->table('vicidial_auto_calls')
            ->where('status', 'IVR')
            ->count();

        $queue = DB::connection("mysql_remote")->table('vicidial_auto_calls')
            ->selectRaw('count(*) as waitcall')
            ->where('status', 'LIVE')
            ->first();

        return [
            'total' => $dataArray->total,
            'incall' => $dataArray->incall,
            'paused' => $dataArray->paused,
            'waiting' => $dataArray->waiting,
            'ivr' => $ivr,
            'queue' => $queue->waitcall,

        ];
    }

    /**
     * Get call center performance at real time
     * @param $initialDateTime
     * @param $endDateTime
     * @return array
     */
    public function realTimeCallCenterPerformance($initialDateTime, $endDateTime): array
    {
        $reachCount = DB::connection("mysql_remote")->table('vicidial_closer_log')
            ->where('call_date', '>=', $initialDateTime)
            ->where('call_date', '<=', $endDateTime)
            ->whereIn('status', ['Reach', 'DSIMX'])
            ->count();

        //outgoing_call_total;
        $totalDialedOutgoingCalls = DB::connection("mysql_remote")->table('vicidial_log')
            ->where('call_date', '>=', $initialDateTime)
            ->where('call_date', '<=', $endDateTime)
            ->count();

        $uniqueId = DB::connection("mysql_remote")->table('vicidial_log')
            ->whereBetween('call_date', [$initialDateTime, $endDateTime])
            ->whereNotNull('uniqueid')
            ->pluck('uniqueid')
            ->toArray();


        $totalConnectedCalls = DB::connection("mysql_remote")->table('vicidial_carrier_log')
            ->whereIn('uniqueid', $uniqueId)
            ->where('dialstatus', 'ANSWER')
            ->whereBetween('call_date', [$initialDateTime, $endDateTime])
            ->count();

        $totalIncomingCalls = DB::connection("mysql_remote")->table('vicidial_closer_log')
            ->whereBetween('call_date', [$initialDateTime, $endDateTime])
            ->count();


        $count_callAnswer = DB::connection("mysql_remote")->table('vicidial_closer_log')
            ->select(DB::raw('count(*) as total, SUM(length_in_sec) as length_in_sec'))
            ->where('status', '!=', 'DROP')
            ->where('status', '!=', 'AFTHRS')
            ->where('call_date', '>=', $initialDateTime)
            ->where('call_date', '<=', $endDateTime)
            ->first();

        $count_callAllOutgoing = DB::connection("mysql_remote")->table('vicidial_log')
            ->select(DB::raw('SUM(length_in_sec) as length_in_sec'))
            ->whereIn('uniqueid', $uniqueId)
            ->where('call_date', '>=', $initialDateTime)
            ->where('call_date', '<=', $endDateTime)
            ->first();


        $total_call_answered = $count_callAnswer->total; // Total count
        $total_answered_call_length_in_sec = $count_callAnswer->length_in_sec; // Total length in seconds
        $total_outgoing_call_length_in_sec = $count_callAllOutgoing->length_in_sec; // Total length in seconds


        //Drop call count
        $totalDroppedCalls = DB::connection("mysql_remote")->table('vicidial_closer_log')
            ->where('call_date', '>=', $initialDateTime)
            ->where('call_date', '<', $endDateTime)
            ->where('status', 'DROP')
            ->count();


        $dropPercentage = ($totalIncomingCalls != 0) ? number_format(($totalDroppedCalls * 100) / $totalIncomingCalls) : 0;


        //Drop call back
        $back_count = 0;

        $dropCalls = DB::connection("mysql_remote")->table('vicidial_closer_log')
            ->where('call_date', '>=', $initialDateTime)
            ->where('call_date', '<', $endDateTime)
            ->where('status', 'DROP')
            ->get();

        return [
            'reachCount' => $reachCount,
            'total_outbound_dialed' => $totalDialedOutgoingCalls,
            'total_outbound_connected' => $totalConnectedCalls,
            'total_outbound_abandoned' => $totalDialedOutgoingCalls - $totalConnectedCalls,
            'outbound_connected' => ($totalDialedOutgoingCalls != 0) ? floor(($totalConnectedCalls * 100) / $totalDialedOutgoingCalls) : 0,
            'total_incoming' => $totalIncomingCalls,
            'total_answered' => $total_call_answered,
            'total_duration_hr' => (float)number_format((int)$total_answered_call_length_in_sec / 3600, 2),
            'average_duration_hr' => (double)number_format(($total_answered_call_length_in_sec + $total_outgoing_call_length_in_sec) / ($totalConnectedCalls + $total_call_answered), 2),
            'total_dropped' => $totalDroppedCalls,
            'drop_percentage' => (float)$dropPercentage,
            'call_back' => $back_count
        ];
    }

    /**
     * Realtime agent activity for all agents
     * @return array
     */
    public function getRealTimeAgentsActivity(): array
    {
        $idate = date("Y-m-d") . ' ' . '00:00:00';
        $edate = date("Y-m-d") . ' ' . '23:59:59';


        $from_table_column = [
            'vicidial_live_agents.user',
            'vicidial_live_agents.extension',
            'vicidial_live_agents.status',
            'vicidial_live_agents.pause_code',
            'vicidial_live_agents.callerid',
            'vicidial_live_agents.last_update_time',
            'vicidial_live_agents.last_state_change',
            'vicidial_live_agents.campaign_id',
        ];


        $results = DB::connection("mysql_remote")->table('vicidial_live_agents')
            ->select($from_table_column)
            // ->where('vicidial_live_agents.user', $user)
            // ->orderBy('vicidial_live_agents.calls_today','desc')
            ->get();

        $data = [];

        foreach ($results as $result) {

            $user = $result->user;
            $extension = substr($result->extension, 4);
            $status = $result->status;
            $pause_code = $result->pause_code;

            //pause code
            $pause_code = DB::connection("mysql_remote")->table("vicidial_pause_codes")->select("pause_code")->where("pause_code", $pause_code)->pluck("pause_code")->first();

            //get agent full name
            $agent_full_name = DB::connection("mysql_remote")->table("vicidial_users")->select("full_name")->where("user", $user)->pluck("full_name")->first();

            //login time
            $login_time = DB::connection("mysql_remote")->table("vicidial_user_log")->select("event_date")->where("user", $user)->where("event", "LOGIN")->whereBetween("event_date", [$idate, $edate])->pluck("event_date")->first();

            //total inbound call
            $total_inbound_call = DB::connection("mysql_remote")->table("vicidial_closer_log")->where("user", $user)->whereBetween("call_date", [$idate, $edate])->count();

            //total outgoing call
            $total_outbound_calls = DB::connection("mysql_remote")->table("vicidial_log")->select("vicidial_log.uniqueid", "vicidial_carrier_log.dialstatus")
                ->rightJoin('vicidial_carrier_log', function ($join) use ($idate, $edate) {
                    $join->on('vicidial_log.uniqueid', '=', 'vicidial_carrier_log.uniqueid')
                        ->whereBetween('vicidial_carrier_log.call_date', [$idate, $edate])
                        ->where('vicidial_carrier_log.dialstatus', "ANSWER");
                })
                ->where("vicidial_log.user", $user)->whereBetween("vicidial_log.call_date", [$idate, $edate])->count();

            //status modify
            if ($status == 'INCALL') {
                $caller_phone = DB::connection("mysql_remote")->table("vicidial_auto_calls")->select("phone_number")->where("callerid", $result->callerid)->pluck("phone_number")->first();
                $status = '<span class="badge badge-success" style="width: 100%">In call: <strong>' . $caller_phone . '</strong></span>';
            } elseif ($status == 'PAUSED') {
                if ($pause_code) {
                    $status = '<span class="badge badge-info" style="width: 100%"> ' . $status . ' (' . $pause_code . ')' . '</span>';
                } else {
                    $status = '<span class="badge badge-info" style="width: 100%"> ' . $status . '</span>';
                }
            } elseif ($status == 'CLOSER' || $status == 'READY') {
                $status = '<span class="badge badge-info" style="width: 100%" >READY</span>';
            } else {
                $status = '<span class="badge badge-danger" style="width: 100%" >' . $status . '</span>';
            }

            //last activity
            $last_activity = gmdate('H:i:s', strtotime($result->last_update_time) - strtotime($result->last_state_change));

            $data[] = [
                "campaign" => $result->campaign_id,
                "agent_id" => $user . ' (' . $extension . ')',
                "agent_full_name" => $agent_full_name,
                "time" => date('h:i A', strtotime($login_time)),
                "inbound_calls" => $total_inbound_call,
                "outbound_calls" => $total_outbound_calls,
                "status" => $status,
                "last_activity" => $last_activity,
            ];
        }

        return $data;

    }

    public function getSingleAgentTicketCount($agent_id): Collection
    {
        return DB::table('tickets')
            ->join('users', 'tickets.user_id', '=', 'users.id')
            ->select('users.fullname as name', DB::raw('COUNT(*) as count'))
            ->where('users.username', $agent_id)
            ->groupBy('users.fullname')
            ->get();
    }


    /**
     * @param $start_date
     * @param $end_date
     * @param $bu_id
     * @param null $selectedBusinessUnitIds
     * @return array
     */
    public function getLastSevenDayTotalTicketVsSolved($start_date, $end_date, $bu_id,$selectedBusinessUnitIds=null): array
    {

        $query = TicketDetail::selectRaw('DATE(created_at) as date')
            ->selectRaw('COUNT(*) as total_tickets')
            ->selectRaw("SUM(CASE WHEN status = ? THEN 1 ELSE 0 END) as solved_tickets", [TicketStatusEnum::Done->value])
            ->whereBetween('created_at', [$start_date, $end_date]);

        if ($bu_id == null) {
            $query->whereIn('business_unit_id', $selectedBusinessUnitIds);
        } else {
            $query->where('business_unit_id', $bu_id);

        }
        return $query->groupByRaw('DATE(created_at)')
            ->orderBy('date')
            ->get()
            ->map(function ($item) {
                $item->solved_tickets = (int)$item->solved_tickets;
                $item->ratio = (double)number_format($item->total_tickets > 0 ? ($item->solved_tickets / $item->total_tickets) * 100 : 0);
                return $item;
            })
            ->toArray();
    }

}
