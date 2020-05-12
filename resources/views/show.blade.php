@extends('layout')
@section('content')
    <h1 class="pt-5">{{ $shop->name }}</h1>
    <div class="show-titleContent mb-8">
      <img src="/storage/<?php echo $shop->picname; ?>" class="img">
      <div class="show-title">
        <!-- <p>pic:</p> -->
        <p class="name">Name:</p>
        <p>Adress:</p>
        <p>Gender: </p>
        <p>age:</p>
        <p>langage:</p>
        <p>content:</p>
      </div>
      <div class="show-content">
        <p>{{ $shop->user->name }}</p>
        <p>{{ $shop->adress }}</p>
        <p>{{ $shop->category->name }}</p>
        <p>{{ $shop->years }}</p>
        <p>{{ $shop->language }}</p>
        <p>{{ $shop->content }}</p>
      </div>
    </div>
      <iframe src="https://maps.google.co.jp/maps?output=embed&t=m&hl=ja&q={{ $shop->adress }}" frameborder="0" width='100%'
    height='320'></iframe>
    </iframe>
    @auth
      @if($shop->user_id === $login_user_id)
        <a href={{ route('shop.edit',['id'=>$shop->id]) }} class="btn btn-primary mr-2" style="float:left">edit</a>
        <span class="mr-2" style="float:left">{{ Form::open(['method'=>'delete','route'=>['shop.destroy',$shop->id]]) }}
          {{ Form::submit('delete',['class'=>'btn btn-secondary']) }}
        {{ Form::close() }}</span>
        <!-- htmlがデリートメソッド対応してないからformでやるしかない -->
        <a class="home btn btn-success" href={{ route('shop.list') }}>HOME</a>
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
    height: 33vh;
    width: 46%;
    margin-right: 5vh;
  }
</style>
