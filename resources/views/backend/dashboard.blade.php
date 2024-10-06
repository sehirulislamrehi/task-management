@extends("backend.template.layout")

@section('per_page_css')
<style>
    .small-box .inner h3 {
        font-size: 18px;
    }

    .card-report-item {
        padding: 15px;
    }
</style>
@endsection

@section('body-content')
<div class="br-mainpanel">
    <div class="br-pagetitle">
    </div>

    <div class="br-pagebody">
        
    </div>
</div>
@endsection

@section("per_page_js")
<script src="{{ asset('backend/js/apexcharts/apexcharts.js') }}"></script>
@endsection