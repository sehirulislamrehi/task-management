<?php

namespace App\Models\Backend\UserModule;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Backend\CommonModule\BusinessUnit;
use App\Models\Backend\CommonModule\OthobaDepartment;
use App\Models\Backend\CommonModule\ServiceCenter;
use App\Models\Backend\CommonModule\Thana;
use App\Models\Backend\QCModule\EvaluationReport\AgentEvaluationReport;
use App\Models\Backend\TicketingModule\Ticket;
use App\Models\Backend\TicketingModule\TicketDetail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * User model
 * @property int id
 * @property string fullname
 * @property string username
 * @property string password
 * @property mixed $phone
 * @property mixed $phone_login
 * @property mixed $phone_password
 * @property mixed $user_group_id
 * @property mixed $role_id
 * @property mixed $is_active
 * @property mixed $agent_type
 * @property mixed $agent_type_id
 *
 * @method static find($userId)
 * @method static where(string $string, string $trim)
 * @method static findOrFail($userId)
 * @method static whereNot(string $string, int $int)
 * @method static whereIn(string $string, mixed[] $userIds)
 * @method static orderBy(string $string, string $string1)
 * @method static select(string $string)
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    function user_group(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(UserGroup::class, 'user_group_id');
    }

    function role(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    function service_center(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(ServiceCenter::class, 'service_center_user');
    }

    function ticket(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Ticket::class, 'user_id');
    }

    function thanas(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Thana::class, 'user_thanas');
    }

    function business_unit(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(BusinessUnit::class, 'business_unit_user');
    }

    function ticket_details(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(TicketDetail::class, 'cancel_by');
    }

    function agent_type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AgentType::class, 'agent_type_id');
    }

    function othoba_department(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(OthobaDepartment::class, 'othoba_department_id','id');
    }

    function evaluation_report(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AgentEvaluationReport::class, 'agent_id');
    }

    function qc_agent(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AgentEvaluationReport::class, 'qc_agent_id');
    }
}
