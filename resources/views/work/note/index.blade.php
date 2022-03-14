@extends('layouts.app')
@section('title', 'Note')
@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>

</style>
@endsection
@section('content')
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="float-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Eka Bachrudin</a></li>
                        <li class="breadcrumb-item"><a href="#">Work</a></li>
                        <li class="breadcrumb-item active"><a href="#"> Note </a></li>
                    </ol>
                </div>
                <h4 class="page-title">Note</h4>
                <br>
                <div class="d-flex justify-content-between">
                    {{-- <div class="btn btn-pink btn-sm" data-bs-toggle="modal" data-bs-target="#modalAdd"> Add Note <i class="ti ti-circle-plus"></i> </div>
                    <a href="/task/task-history" style="font-size: 20px"><i class="ti ti-history menu-icon"></i><span>History</span></a> --}}
                </div>
            </div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title">Notes list</h4>
                    <div>
                        <div class="btn btn-pink">Add note</div>
                    </div>
                </div>
                <div class="card-body" style="padding-bottom: 500px">
                    <h6>This is a body card</h6>
                </div>
            </div>
        </div>
    </div>
</div>


@include('work.task.modal')

@endsection

@section('javascript')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@endsection