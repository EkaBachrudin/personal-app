@extends('layouts.app')
@section('title', 'task History')
@section('style')
<style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        .timeline{
            width:800px;
            padding:30px 20px;
        }
        .timeline ul{
            list-style-type:none;
            border-left:2px solid #094a68;
            padding:10px 5px;
        }
        .timeline ul li{
            padding:20px 20px;
            position:relative;
            cursor:pointer;
            transition:.5s;
        }
        .timeline ul li span{
            display:inline-block;
            background-color:#1685b8;
            border-radius:25px;
            padding:2px 5px;
            font-size:15px;
            text-align:center;
        }
        .timeline ul li .content h3{
            color:#34ace0;
            font-size:17px;
            padding-top:5px;
        }
        .timeline ul li .content p{
            padding:5px 0px 15px 0px;
            font-size:15px;
        }
        .timeline ul li:before{
            position:absolute;
            content:'';
            width:10px;
            height:10px;
            background-color:#34ace0;
            border-radius:50%;
            left:-11px;
            top:28px;
            transition:.5s;
        }
        .timeline ul li:hover{
            background-color:#071f2a;
            color: white;
        }
        .timeline ul li:hover:before{
            background-color:#0F0;
            box-shadow:0px 0px 10px 2px #0F0;
        }
        @media (max-width:300px){
            .timeline{
                width:100%;
                padding:30px 5px 30px 10px;
            }
            .timeline ul li .content h3{
                color:#34ace0;
                font-size:15px;
            }

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
                        <li class="breadcrumb-item active"><a href="#"> Task History </a></li>
                    </ol>
                </div>
                <h4 class="page-title">Task History</h4>
            </div>
            <!--end page-title-box-->
        </div>
        <!--end col-->
    </div>
    <!-- end page title end breadcrumb -->

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <form action="/task/task-history">
                        <div class="form-group">
                            <input type="text" name="search" placeholder="find or search title task...!" class="form-control" autocomplete="off"/>
                        </div>
                    </form>
        
                    <div class="timeline">
                        <ul>
                            @foreach ($histories as $history)
                            <li>
                                <div class="d-flex justify-content-between">
                                    <span class="text-white px-3">{{$history->from}}</span>
                                    <a href="/task/task-history/restored/{{$history->id}}"><i class="ti ti-arrow-forward-up text-white"></i></a>
                                </div>
                                <div class="content">
                                    <h3>{{$history->title}}</h3>
                                    <p>
                                        {{$history->task}}
                                    </p>
                                    <p><small>{{$history->created_at->format('d-m-Y')}}</small></p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    {{ $histories->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

<script>
</script>
@endsection