@extends("backend.template.layout")

@section('per_page_css')
<style>
    .small-box .inner h3 {
        font-size: 18px;
    }

    .card-report-item {
        padding: 15px;
    }

    p {
        margin-bottom: 0;
    }

    #spinner{
        z-index: 99;
    }
    #spinner:not([hidden]) {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #spinner::after {
        content: "";
        width: 80px;
        height: 80px;
        border: 2px solid #f3f3f3;
        border-top: 3px solid #f25a41;
        border-radius: 100%;
        will-change: transform;
        animation: spin 1s infinite linear
    }

    @keyframes spin {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }
</style>
@endsection

@section('body-content')

<!-- this will show our spinner -->
<div hidden id="spinner"></div>

<div class="br-mainpanel">
    <div class="br-pagetitle"></div>
    <div class="br-pagebody">
        <div class="row d-flex align-items-stretch">

            <!-- task_counting -->
            <div class="col-md-12 mb-3">
                @include("backend.modules.report_module.dashboard_report.task_counting.index")
            </div>

            <!-- highest_task_completed_user_list -->
            <div class="col-md-6 mb-3">
                @include("backend.modules.report_module.dashboard_report.highest_task_completed_user_list.index")
            </div>

            <!-- highest_average_time_taken_user -->
            <div class="col-md-6 mb-3">
                @include("backend.modules.report_module.dashboard_report.highest_average_time_taken_user.index")
            </div>

        </div>
    </div>
</div>
@endsection

@section("per_page_js")
<script src="{{ asset('backend/js/apexcharts/apexcharts.js') }}"></script>

<script>
    const spinner = document.getElementById("spinner");
</script>
@include("backend.modules.report_module.dashboard_report.task_counting.script")
@include("backend.modules.report_module.dashboard_report.highest_task_completed_user_list.script")
@include("backend.modules.report_module.dashboard_report.highest_average_time_taken_user.script")

@endsection