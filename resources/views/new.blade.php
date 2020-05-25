@extends('layout')
@section('content')
  <h1 class="pt-5 mb-4">Your Information</h1>
  {{Form::open(['route'=>'shop.store',"enctype"=>"multipart/form-data"]) }}
    <div class="form-group">
      {{ Form::label('adress','*city:',['class'=>'newinfotitle']) }}
      {{ Form::text('adress',null,['class'=>'info-city']) }}
    </div>
    <div class="form-group">
      {{ Form::label('fb','*your FB url:',['class'=>'newinfotitle']) }}
      {{ Form::text('fb',null,['class'=>'info-city']) }}
    </div>
    <div class="form-group">
      {{ Form::label('category_id','*gender:',['class'=>'newinfotitle']) }}
      {{ Form::select('category_id',$categories,['class'=>'info']) }}
      <!-- $categoriesには(name,id)が入っていて、引数１が表示されるもの、引数２がvalueになるようになっている。だからcategory_idには$categoriesのidが送られる -->
    </div>
    <?php
    $arr=[];
    for ($i=0; $i<100; $i++) {
      $arr[]=$i;
    }
    ?>
    <div class="form-group">
      {{ Form::label('years','*age:',['class'=>'newinfotitle']) }}<!-- 第一引数はshopのデータ持ってきてるんじゃなくてここで定義した物をstoreに入れる用 -->
      {{ Form::select('years',[$arr],['class'=>'info-years']) }}
    </div>
    <div class="form-group">
      {{ Form::label('room','*with room or not:',['class'=>'newinfotitle']) }}<!-- 第一引数はshopのデータ持ってきてるんじゃなくてここで定義した物をstoreに入れる用 -->
      {{ Form::select('room',['with room' => 'with room','without room' => 'without room'],['class'=>'info-years']) }}<!-- 一個目がvalue,2個目が表示 -->
    </div>
    <div class="form-group">
      {{ Form::label('characters','*character:',['class'=>'newinfotitle']) }}<!-- 第一引数はshopのデータ持ってきてるんじゃなくてここで定義した物をstoreに入れる用 -->
      {{ Form::select('characters',['partyppl' => 'party ppl','quiet' => 'quiet','normal'=>'normal'],['class'=>'info-years']) }}<!-- 一個目がvalue,2個目が表示 -->
    </div>
    <div class="form-group">
      {{ Form::label('sex','*sex:',['class'=>'newinfotitle']) }}<!-- 第一引数はshopのデータ持ってきてるんじゃなくてここで定義した物をstoreに入れる用 -->
      {{ Form::select('sex',['man' => 'man','woman' => 'woman','no gender'=>'no gender'],['class'=>'info-years']) }}<!-- 一個目がvalue,2個目が表示 -->
    </div>
    <div class="form-group">
      {{ Form::label('job','*job:',['class'=>'newinfotitle']) }}<!-- 第一引数はshopのデータ持ってきてるんじゃなくてここで定義した物をstoreに入れる用 -->
      {{ Form::select('job',['negotiator' => 'negotiator',
   'engineer' => 'engineer','marketer'=>'marketer'],['class'=>'info-years']) }}<!-- 一個目がvalue,2個目が表示 -->
    </div>
    <div class="form-group">
      {{ Form::label('activetime','*activetime:',['class'=>'newinfotitle']) }}<!-- 第一引数はshopのデータ持ってきてるんじゃなくてここで定義した物をstoreに入れる用 -->
      {{ Form::text('activetime',null,['class'=>'info-years']) }}<!-- 一個目がvalue,2個目が表示 -->
    </div>
    <div class="form-group">
      {{ Form::label('language','*languages:',['class'=>'newinfotitle']) }}<!-- 第一引数はshopのデータ持ってきてるんじゃなくてここで定義した物をstoreに入れる用 -->
      {{ Form::text('language',null,['class'=>'info-language']) }}
      (less than 2 languages)
    </div>
    <div class="form-group">
      {{ Form::label('name','*title:',['class'=>'newinfotitle']) }}<!-- 第一引数はshopのデータ持ってきてるんじゃなくてここで定義した物をstoreに入れる用 -->
      {{ Form::text('name',null,['class'=>'info']) }}
    </div>
    <div class="form-group">
      {{ Form::label('content','*content:',['class'=>'newinfotitle content-top']) }}<!-- 第一引数はshopのデータ持ってきてるんじゃなくてここで定義した物をstoreに入れる用 -->
      {{ Form::textarea('content',null,['class'=>'info']) }}
    </div>
    <div class="form-group">
      {{ Form::label('photo','*photo:',['class'=>'newinfotitle']) }}<!-- 第一引数はshopのデータ持ってきてるんじゃなくてここで定義した物をstoreに入れる用 -->
      {{ Form::file('photo',null,['class'=>'info-language']) }}
    </div>
    <div class="form-group">
      {{ Form::submit('submit',['class'=>'btn btn-primary col-2']) }}
    </div>
  {{ Form::close() }}
  <a class="home btn btn-success" href={{ route('shop.list') }}>HOME</a>
@endsection
<style >
  .info{
    width:70%;
  }
  .newinfotitle{
    width:10%;
  }
  .info-years .info-city{
    width:10%;
  }
  .info-langage{
    width:30%;
  }
  .content-top{
    vertical-align: top;
  }
  .home{
    padding-bottom: 5vh;
  }
</style>
