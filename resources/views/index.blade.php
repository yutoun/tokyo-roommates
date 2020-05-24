@extends('layout')
@section('content')
<style>
.body{
  background-color: white;
  width:80%;
  margin-left: 12vh;
}

.newbtn a{
  margin-top: 3vh !important;
}

.infos{
  margin-top:1.5vh;
  width:100%;
  border-top: 1px solid #ebebeb;
  margin-bottom: 5vh;
}
.content{
  height:26vh;
  border-bottom:1px solid #ebebeb;
  display: flex;
}
.img{
  height:145px;
  width:200px;
  margin-right: 5vh;
}
.pic{
  padding: 0 10vh;
  /* height:10vh; */
}
p{
  display: inline-block;
}
.right{
  display: inline;
  width:100%;
}
.right-center{
  width: 100%;
  height: 45%;
}
.right-top{
  margin-top: 1vh;
}
.right-bottom p{
  padding: 0 1vh;
}
.right-bottom{
  position: relative;
  position:relative;
}
.time{
  padding:0 !important;
  margin-left: 1vh;
  position: absolute;
  right:5px;
  margin-right: 1vh;
}

.name{
  width:10vh;
}
.gender{
  width: 30%;
}
.years{
  width: 30%;
}
.area,.languages{
  width:30%;
}
.areas input{
  width:40%;
}
.lan input{
  width: 40%;
}
.area .areas{
  display: flex;
}
.gender{
  margin-left: 6vh;
  /* margin-top:2vh; */
}
.years .form-group{
  display: flex;
}
.search{
  display: flex;
}
.languages{

}
.lan{
  display: flex;
}
</style>

<div class="body">
  @auth<!-- これはログインという行動をもし完了していたら表示する物。authifとは違う -->
    <div class="newbtn">
      <a href={{ route('shop.new') }} class="btn btn-outline-primary mt-2">add your info</a>
    </div>
  @endauth
  <div class="search mt-5">
    @include('searchGender')
  </div>
  <div class="results">
    <p class="border text-light rounded bg-success">{{$request->room}}</p>
    <p class="border text-light rounded bg-success">{{$request->languages}}</p>
    <p class="border text-light rounded bg-success">{{$request->area}}</p>
  </div>

  <div class="infos">
    @foreach($shops as $shop)
      <div class="content">
        <div class="left">
          <img src="/storage/<?php echo $shop->picname; ?>" class="img">
        </div>
        <div class="right">
          <div class="right-top">
            <p class="name">{{ $shop->user->name }}</p>
            <p><a href={{ route('shop.detail',['id'=>$shop->id]) }}>{{ $shop->name }}</a></p><!-- 'id'はshop/{id}のid -->
          </div>
          <div class="right-center">
            <p>
              <?php echo substr($shop->content,0,130) ?>
              <a href={{ route('shop.detail',['id'=>$shop->id]) }} style="color:black; font-family:solid;">...</a>
            </p>
          </div>
          <div class="right-bottom">
            <p class="border text-light rounded bg-success">{{ $shop->adress }}</p>
            <p class="border text-light rounded bg-success category_name">{{ $shop->category->name }}</p> <!-- shop.phpのカテゴリーメソッドにいく -->
            <p class="border text-light rounded bg-success">{{ $shop->years }}</p>
            <p class="border text-light rounded bg-success">{{ $shop->language }}</p>
            <p class="border text-light rounded bg-success">{{ $shop->room }}</p>
            <p class="border-bottom border-dark time">{{ $shop->created_at }}</p>

          </div>
        </div>

      </div>
    @endforeach
  </div>
</div>



@endsection
