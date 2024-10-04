@extends('error.template.base_error')
@section('title')
   Time Exceed | Ticket Edit
@endsection
@push('css')
    <style>
        body {
            background: rgb(2, 0, 36);
            background: -moz-linear-gradient(264deg, rgba(2, 0, 36, 1) 0%, rgb(239, 2, 37) 50%, rgba(255, 255, 255, 1) 100%);
            background: -webkit-linear-gradient(264deg, rgba(2, 0, 36, 1) 0%, rgb(244, 44, 44) 50%, rgba(255, 255, 255, 1) 100%);
            background: linear-gradient(264deg, rgba(2, 0, 36, 1) 0%, rgb(205, 100, 100) 50%, rgba(255, 255, 255, 1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#020024", endColorstr="#ffffff", GradientType=1);
        }
    </style>
@endpush

@section('content')
    <div class="card p-5 border-0">
        <h3 class="text-center">CRM <sub>V-1.0</sub></h3>
        <div class="card-body">
            <div class="mb-5 text-center">
                <img class="error-icon py-3" src="{{asset('backend/images/sorry2.png')}}" alt="">
                <h1 class="error-header">Edit Time Exceed (টিকেট এডিট এর সময় শেষ)</h1>
            </div>
        </div>
    </div>
@endsection


<style>
    .error-icon{
        width: 50px;
    }
    .card{
        box-shadow: none;
    }
</style>




