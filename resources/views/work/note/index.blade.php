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
                        <div class="btn btn-pink"  data-bs-toggle="modal" data-bs-target="#modalCreate">Add note</div>
                    </div>
                </div>
                <div class="card-body" style="padding-bottom: 500px">
                    <table class="table border">
                        <thead>
                            <tr>
                                <th> Title </th>
                                <th> Date note </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notes as $note)
                                <tr>
                                    <td> {{$note->title}} </td>
                                    <td> {{$note->created_at}} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



  <!-- Modal Create -->
  <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCreateLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-danger"><strong>{{ $error }}</strong></li>
                        @endforeach
                    </ul>
            @endif
            <form id="createNote" action="/note/index/create">
                <div class="form-group">
                    <input type="text" name="title" id="title" value="{{old('title')}}" class="form-control" placeholder="title hire...">
                </div>
                <br>
                <textarea id="basic-conf" name="body" placeholder="note hire ...">{{old('body')}}</textarea>
                <div class="form-group mt-3">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
            </form>  
        </div>
      </div>
    </div>
  </div>

@endsection

@section('javascript')
    <script src="{{asset('plugins/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('pages/form-editor.init.js')}}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    @if (count($errors) > 0)
        var myModal = new bootstrap.Modal(document.getElementById('modalCreate'), {
            keyboard: false
        });
        myModal.show();
    @endif
</script>
@endsection