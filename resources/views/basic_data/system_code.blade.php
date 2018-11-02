@extends('layouts.app')

@section('head')
    <script src="{{ asset('limitless/js/datatables.min.js') }}" defer></script>
    <script src="{{ asset('limitless/js/select2.min.js') }}" defer></script>
    <script src="{{ asset('limitless/js/jszip.min.js') }}" defer></script>
    <script src="{{ asset('limitless/js/buttons.min.js') }}" defer></script>
    <script src="{{ asset('limitless/js/select.min.js') }}" defer></script>
    <script src="{{ asset('limitless/js/col_reorder.min.js') }}" defer></script>
    <script src="{{ asset('limitless/js/row_reorder.min.js') }}" defer></script>
@endsection

@section('page-title')
    <span class="text-semibold">基础数据 - <span class="text-muted">系统编码</span></span>
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('show_system_code') }}
@endsection

@section('content')
<div class="content">
    <system-code></system-code>
</div>
@endsection
