@extends('layouts.app')

@section('head')
    <script src="{{ asset('limitless/js/plugins/ui/moment.min.js') }}" defer></script>
    <script src="{{ asset('limitless/js/plugins/pickers/daterangepicker.js') }}" defer></script>
@endsection

@section('page-title')
    <span class="text-semibold">Home</span>
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('home') }}
@endsection

@section('content')
<div class="content">
    <date-range-picker></date-range-picker>
</div>
@endsection
