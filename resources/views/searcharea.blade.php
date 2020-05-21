<div class="years">
  {{ Form::open(['method'=>'get']) }}
  {{ csrf_field()}}
  <?php
  $arr=[];
  for ($i=0; $i<100; $i++) {
    $arr[]=$i;
  }
  ?>
  <div class="form-group">
    {{ Form::label('age','age:') }}<!-- 第一引数はshopのデータ持ってきてるんじゃなくてここで定義した物をstoreに入れる用 -->
    {{ Form::select('age',[$arr],['class'=>'form-control']) }}
  </div>
  <div class="form-group">
    {{ Form::submit('検索',['class'=>'btn btn-outline-primary']) }}
  </div>
  {{ Form::close() }}
</div>

<div class="room">
  {{ Form::open(['method'=>'get']) }}
  {{ csrf_field()}}

  <div class="form-group">
    {{ Form::label('room','room:') }}<!-- 第一引数はshopのデータ持ってきてるんじゃなくてここで定義した物をstoreに入れる用 -->
    {{ Form::select('room',['with room' => 'with room',
 'without room' => 'without room'],['class'=>'form-control']) }}<!-- 一個目がvalue,2個目が表示 -->
  </div>
  <div class="form-group">
    {{ Form::submit('検索',['class'=>'btn btn-outline-primary']) }}
  </div>
  {{ Form::close() }}
</div>

<div class="languages">
  {{ Form::open(['method'=>'get']) }}
  {{ csrf_field()}}
  <div class="form-group lan">
    {{ Form::label('languages','languages:') }}
    {{ Form::text('languages',null,['class'=>'form-control']) }}
  </div>
  <div class="form-group">
    {{ Form::submit('検索',['class'=>'btn btn-outline-primary']) }}
  </div>
  {{ Form::close() }}
</div>


<div class="area">
  {{ Form::open(['method'=>'get']) }}
  {{ csrf_field()}}
  <div class="form-group areas">
    {{ Form::label('area','area:') }}
    {{ Form::text('area',null,['class'=>'form-control']) }}
  </div>
  <div class="form-group">
    {{ Form::submit('検索',['class'=>'btn btn-outline-primary']) }}
    <a class="btn btn-secondary" href={{ route('shop.list') }}>クリア</a>
  </div>
  {{ Form::close() }}

</div>

<style >
  .form-control{
    width:20%;
    height:2.5vh;
  }
</style>
