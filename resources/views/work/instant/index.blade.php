@extends('layouts.app')
@section('firstTitle', 'Eka Bachrudin')
@section('title', 'Instant Task')
@section('style')
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Megrim&family=Pompiere&display=swap" rel="stylesheet">
    <style>
        body {
            background: black;
        }
        .container{
        width:30%;
        margin-top: 25%;
        text-align:center;
        overflow:hidden;
        }
        input{
        margin:0;
        padding:0;
        box-sizing:border-box;
        outline:0;
        border:0;
        text-align:center;
        background:black;
        width:100%;
        padding:10px;
        font-size:20px;
        color:cyan;
        text-overflow:ellipsis;
        }
        input::placeholder{
        font-size:14px;
        letter-spacing:3px;
        color:cyan;
        opacity:0.22;
        }
        .underline{
        transition:0.5s cubic-bezier(0.680, -0.550, 0.265, 1.550);
        margin:0 auto;
        display:block;
        height:1px;
        background:cyan;
        width:100%;
        }
        p {
            font-family: 'Pompiere', cursive;
            font-weight: 300;
            text-align: center;
            font-size: 20px;
            color: #fff;
        }
        button {
        margin: 20px;
        }
        .custom-btn {
        color: #fff;
        width: 130px;
        height: 40px;
        padding: 10px 25px;
        font-family: 'Lato', sans-serif;
        font-weight: 500;
        background: transparent;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        display: inline-block;
        }
       /* 6 */
        .btn-6 {
        background: #8ce436;
        line-height: 40px;
        padding: 0;
        border: none;
        box-shadow: 0 0 5px #8ce436;
        }
        .btn-6 span {
        position: relative;
        display: block;
        width: 100%;
        height: 100%;
        }
        .btn-6:hover{
        background: transparent;
        color: #8ce436;
        }
        .btn-6:before,
        .btn-6:after {
        position: absolute;
        content: "";
        height: 0%;
        width: 2px;
        background: #8ce436;
        box-shadow: 0 0 5px #8ce436;
        }
        .btn-6:before {
        right: 0;
        top: 0;
        transition: all 500ms ease;
        }
        .btn-6:after {
        left: 0;
        bottom: 0;
        transition: all 500ms ease;
        }
        .btn-6:hover:before {
        transition: all 500ms ease;
        height: 100%;
        }
        .btn-6:hover:after {
        transition: all 500ms ease;
        height: 100%;
        }
        .btn-6 span:before,
        .btn-6 span:after {
        position: absolute;
        content: "";
        background: #8ce436;
        box-shadow: 0 0 5px #8ce436;
        }
        .btn-6 span:before {
        left: 0;
        top: 0;
        width: 0%;
        height: 2px;
        transition: all 500ms ease;
        }
        .btn-6 span:after {
        right: 0;
        bottom: 0;
        width: 0%;
        height: 2px;
        transition: all 500ms ease;
        }
        .btn-6 span:hover:before {
        width: 100%;
        }
        .btn-6 span:hover:after {
        width: 100%;
        }

        .btn-15 {
        color: #ff9aff;
        border: 1px solid#ff9aff;
        box-shadow: 0 0 5px #ff9aff, 0 0 5px #ff9aff inset;
        z-index: 1;
        }
        .btn-15:after {
        position: absolute;
        content: ""; 
        width: 0;
        height: 100%;
        top: 0;
        right: 0;
        z-index: -1;
        background: #ff9aff;
        box-shadow:
        0 0 20px  #ff9aff;
        transition: all 0.3s ease;8
        }
        .btn-15:hover {
        color: #fff;
        }
        .btn-15:hover:after {
        left: 0;
        width: 100%;
        }
        .btn-15:active {
        top: 2px;
        }
    </style>
@endsection
@section('content')
<div class="container"> 
    <form action="/instant/index" method="POST">
        @csrf
        <input type="text" name="task" placeholder="Type task hire" class="margin-top: 200px" required>
        <span class="underline"></span>
        <div>
            <a href="/instant/history" class="custom-btn btn-6">History</a>
            <button type="submit" class="custom-btn btn-15">Submit</button>
    </form>
</div>


@endsection

@section('javascript')
<script>
    var counter=0;
$('input').on('input',function(e){
  counter = $(this).val().length *4;
 $('.underline').css('width',counter+'%');
  
  // If not input 
  if($(this).val().length == 0)
 $('.underline').css('width','100%');    
})
    $('footer').remove();
</script>
@endsection