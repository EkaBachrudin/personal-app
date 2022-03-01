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

@endsection

@section('javascript')

<script>
    function edit(id){
        
    }
</script>
@endsection