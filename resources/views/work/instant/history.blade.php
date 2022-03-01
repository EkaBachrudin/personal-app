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
                            <h5>{{$task[1]->created_at->format('d-m-y')}}</h5>
                        </div>
                        @php $no=1 @endphp
                        <div class="card-body">
                            @foreach ($task as $item)
                                <dl> {{$item['task']}}</dl>
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

</script>
@endsection