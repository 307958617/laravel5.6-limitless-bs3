@extends('layouts.app')

@section('head')
    <script src="{{ asset('limitless/js/datatables.min.js') }}" defer></script>
    <script src="{{ asset('limitless/js/select2.min.js') }}" defer></script>
    <script src="{{ asset('limitless/js/jszip.min.js') }}" defer></script>
    <script src="{{ asset('limitless/js/pdfmake.min.js') }}" defer></script>
    <script src="{{ asset('limitless/js/vfs_fonts.min.js') }}" defer></script>
    <script src="{{ asset('limitless/js/buttons.min.js') }}" defer></script>
    <script src="{{ asset('limitless/js/select.min.js') }}" defer></script>
    <script src="{{ asset('limitless/js/col_reorder.min.js') }}" defer></script>
    <script src="{{ asset('limitless/js/row_reorder.min.js') }}" defer></script>
@endsection

@section('page-title')
    <span class="text-semibold">系统管理 - <span class="text-muted">人员信息</span></span>
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('users') }}
@endsection

@section('content')
<div class="content">
    <vue-datepicker></vue-datepicker>
    <data-table-for-user></data-table-for-user>
</div>
@endsection
