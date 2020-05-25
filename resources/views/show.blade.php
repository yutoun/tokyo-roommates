@extends('layout')
@section('content')
    <h1 class="pt-5">{{ $shop->user->name }}</h1>
    <div class="show-titleContent mb-3">
      <img src="/storage/<?php echo $shop->picname; ?>" class="img">
      <div class="show-title">
        <!-- <p>pic:</p> -->
        <p class="name">username:</p>
        <p>created_at:</p>
        <p>Adress:</p>
        <p>Gender: </p>
        <p>age:</p>
        <p>room:</p>
        <p>langage:</p>
        <p>character:</p>
        <p>job:</p>
        <p>activetime:</p>
        <p>content:</p>


      </div>
      <div class="show-content">
        <p>{{ $shop->user->name }}</p>
        <p>{{ $shop->created_at }}</p>
        <p>{{ $shop->adress }}</p>
        <p>{{ $shop->sex }}</p>
        <p>{{ $shop->years }}</p>
        <p>{{ $shop->room }}</p>
        <p>{{ $shop->language }}</p>
        <p>{{ $shop->characters}}</p>
        <p>{{ $shop->job}}</p>
        <p>{{ $shop->activetime}}</p>
        <p>{{ $shop->content }}</p>

      </div>
    </div>
      <iframe src="https://maps.google.co.jp/maps?output=embed&t=m&hl=ja&q={{ $shop->adress }}" frameborder="0" width='100%'
    height='320' class="mb-5"></iframe>
    </iframe>
    @auth
      @if($shop->user_id === $login_user_id)
        <div class="buttonbig pl-10">
          <a href={{ route('shop.edit',['id'=>$shop->id]) }} class="btn btn-primary mr-2 " style="float:left">edit</a>
          <span class="mr-2" style="float:left">{{ Form::open(['method'=>'delete','route'=>['shop.destroy',$shop->id]]) }}
            {{ Form::submit('delete',['class'=>'btn btn-secondary']) }}
            {{ Form::close() }}</span>
          <!-- htmlがデリートメソッド対応してないからformでやるしかない -->
          <a class="home btn btn-success" href={{ route('shop.list') }}>HOME</a>
          <a class="btn btn-primary fab fab-facebook" href={{ $shop->fb }}><i class="fa fa-facebook fa-lg"></i></a>

        </div>
      @endif
    @endauth
@endsection
<style media="screen">
  .show-titleContent{
    display: flex;
    margin-bottom: 5vh;
  }
  .show-title{
    margin-right: 5vh;
  }
  .img{
    height: 30em;
    width: 46%;
    margin-right: 5vh;
  }
  .buttonbig a,.buttonbig span{
    /* text-align:center; */
  }
  .buttonbig{
    /* margin: 0 auto; */
    margin-left: 40%;
  }
  .fa-lg {
    font-size: 1.8em !important;
  }
</style>
