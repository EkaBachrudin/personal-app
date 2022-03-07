@extends('layouts.app')
@section('title', 'instant history')
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
                        <li class="breadcrumb-item"><a href="#">Instant Task</a></li>
                        <li class="breadcrumb-item active"><a href="#"> History </a></li>
                    </ol>
                </div>
                <h4 class="page-title">Daily / Instant Task History</h4>
            </div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-md-6">
            <ul>
                @foreach ($tasks as $task)
                    <div class="card p-2 shadow rounded border">
                        <div class="card-header">
                            <h5>{{$task[0]->created_at->format('d-m-y')}}</h5>
                        </div>
                        @php $no=1 @endphp
                        <div class="card-body">
                            @foreach ($task as $item)
                                <dl class="d-flex justify-content-between"> <span>{{$item['task']}}</span>
                                     <span>
                                        <i class="ti ti-edit text-info" onclick="edit({{$item['id']}})"></i>
                                        <a href="#" onclick="return confirm('Are u sure delete this task?')"><i class="ti ti-trash text-danger"></i></a>
                                     </span> 
                                </dl>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </ul>
            {{-- {{ $tasks->links() }} --}}
        </div>
    </div>
</div>

  <!-- Modal -->
<div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Edit this hsitory</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="edit">
          <div class="form-group">
              <label for="task">task detail</label>
              <input type="text" name="task" id="task" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('javascript')

<script>
    function edit(id){
        $.ajax({
                method: "GET",
                url: "/instant/history/getData/" + id,
            })
            .done(function (data) {
                var task = data.task;
                $('#edit').find($('input[name="task"]')).val(task.task);
                $('#modal').modal('show');
            });
    }
</script>
@endsection