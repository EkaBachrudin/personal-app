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
                <div class="btn btn-pink"  data-bs-toggle="modal" data-bs-target="#exampleModal"> Add task </div>
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3 rounded shadow" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                          <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</button>
                          <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</button>
                          <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</button>
                          <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</button>
                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                              <div class="card shadow task-element">
                                  <div class="card-body">
                                      <h5>TEST Header</h5>
                                      <hr>
                                      <p>lorem</p>
                                  </div>
                              </div>
                              <div class="card shadow task-element">
                                <div class="card-body">
                                    <h5>TEST Header</h5>
                                    <hr>
                                    <p>lor</p>
                                </div>
                            </div>
                          </div>
                          <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                          <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                          <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- MODAL CREATE --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title modal-title" id="exampleModalLabel">Create Task</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="create">
            <div class="form-group mb-2">
                <label for="task-from">Task From</label>
                <input type="text" name="task-from" id="task-from" class="form-control" />
            </div>
            <div class="form-group mb-2">
                <label for="title">Title Task</label>
                <input type="text" name="title" id="title" class="form-control" />
            </div>
            <div class="form-group mb-2">
                <label for="task">Task</label>
                <textarea name="task" id="task" cols="30" rows="10" class="form-control"></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="submitCreate()">Save changes</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('javascript')
{{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}
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
            console.log(data.taskFrom);
            ///////
        });
        
        request.fail(function( jqXHR, textStatus ) {
        alert( "Request failed: " + textStatus );
        });
    };
</script>
@endsection