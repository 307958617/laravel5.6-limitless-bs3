@extends('layouts.app')

@section('head')
    <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
    {{--<link href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">--}}
    {{--<script src="https://cdn.bootcss.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>--}}

@endsection

@section('page-title')
    <span class="text-semibold">Home</span>
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('home') }}
@endsection

@section('content')
<div class="content">
    <vue-datepicker></vue-datepicker>
</div>
@endsection
