@extends('layouts.app')
@section('firstTitle', 'Work')
@section('title', 'task')
@section('style')
<meta   name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .task-element{
            display: inline-block;
            margin-left: 10px
        }
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
                        <li class="breadcrumb-item active"><a href="#"> Task </a></li>
                    </ol>
                </div>
                <h4 class="page-title">Task</h4>
                <br>
                <div class="btn btn-pink"  data-bs-toggle="modal" data-bs-target="#modalAdd"> Add task </div>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        {{-- task from --}}
                        <div class="nav flex-column nav-pills me-3 rounded shadow" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                          @foreach ($taskFroms as $taskFrom)
                          <button class="nav-link {{$loop->first ? 'active' : ''}}" id="v-pills-{{$taskFrom->id}}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{$taskFrom->id}}" type="button" role="tab" aria-controls="v-pills-{{$taskFrom->id}}" aria-selected="true">{{$taskFrom->name}}</button>
                          @endforeach
                        </div>
                        {{-- end task from --}}
                        <div class="tab-content" id="v-pills-tabContent">
                        {{-- task --}}
                          @foreach ($taskFroms as $taskFrom)
                          <div class="tab-pane fade show {{$loop->first ? 'active' : ''}}" id="v-pills-{{$taskFrom->id}}" role="tabpanel" aria-labelledby="v-pills-{{$taskFrom->id}}-tab">
                                @foreach ($taskFrom->task as $task)
                                <div class="card shadow task-element">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h5>{{$task->title}}</h5>
                                            <i class="fas fa-edit text-pink" onclick="edit({{$task->id}})"></i>
                                        </div>
                                        <hr>
                                        <p>{{$task->task}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                          @endforeach
                        {{-- end task --}}
                        </div>
                      </div>
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

    function submitCreate(){
        var submitTaskFrom   = $('#create').find( $('input[name="task-from"]') ).val();
        var submitTitle      = $('#create').find( $('input[name="title"]') ).val();
        var submitTask       = $('#create').find( $('textarea[name="task"]') ).val();

        var request = $.ajax({
        url: "/task/index/create",
        method: "POST",
        data: { 
            fromTask    : submitTaskFrom,
            title       : submitTitle,
            task        : submitTask
        },
        });
        
        request.done(function( data ) {
            alert(data.success);
        });
        
        request.fail(function( jqXHR, textStatus ) {
        alert( "Request failed: " + textStatus );
        });
    };

    function edit(id){
        $.ajax({
            method: "GET",
            url: "/task/index/getData/"+id,
        })
        .done(function( data ) {
            $('#edit').find( $('input[name="task-from"]') ).val(data.taskFrom.name);
            $('#edit').find( $('input[name="title"]') ).val(data.task.title);
            $('#edit').find( $('textarea[name="task"]') ).val(data.task.task);
            $('#edit').find( $('.btn-primary').attr('onclick', 'submitUpdate('+data.task.id+')') );
            $('#modalEdit').modal('show');
        });
    };

    function submitUpdate(id){
        var submitTaskFrom   = $('#edit').find( $('input[name="task-from"]') ).val();
        var submitTitle      = $('#edit').find( $('input[name="title"]') ).val();
        var submitTask       = $('#edit').find( $('textarea[name="task"]') ).val();

        var request = $.ajax({
        url: "/task/index/update/"+id,
        method: "POST",
        data: { 
            fromTask    : submitTaskFrom,
            title       : submitTitle,
            task        : submitTask
        },
        });
        
        request.done(function( data ) {
            alert(data.success);
        });
        
        request.fail(function( jqXHR, textStatus ) {
        alert( "Request failed: " + textStatus );
        });
    };
</script>
@endsection