@extends('layouts.app')
@section('firstTitle', 'Eka Bachrudin')
@section('title', 'Instant Task')
@section('style')
    <style>
        .page-content-tab{
            background-image: url('https://source.unsplash.com/1920x1080');
            background-size:     cover;   
            background-repeat:   no-repeat;
            background-position: center center; 
        }

        .glass{
            border-radius: 8px;
            padding: 20px;
            background: rgba( 255, 255, 255, 0.2 );
            border: solid 1px rgba(255,255,255,.3);
            backgroud-clip: padding-box;
            backdrop-filter: blur(10px );
        }

        textarea.transparent-input{
        background-color:rgba(0,0,0,0) !important;
        border:none !important;
        }
    </style>
@endsection
@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
      <div class="col-md-6" style="margin-top: 200px">
        <a href="#" class="btn btn-sm btn-dark mb-3">History</a>
        <div class="glass shadow">
            <div class="form-group">
                <textarea type="text" name="task" class="form-control transparent-input" placeholder="text hire....." style="font-size: 30px"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-dark btn-sm mt-3" value="Add task">
            </div>
        </div>
      </div>
  </div>
</div>
@endsection

@section('javascript')
<script>
    $('footer').remove();
</script>
@endsection