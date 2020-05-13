<div class="area">
  {{ Form::open(['method'=>'get']) }}
  {{ csrf_field()}}
  <div class="form-group areas">
    {{ Form::label('keyword','area:') }}
    {{ Form::text('keyword',null,['class'=>'form-control']) }}
  </div>
  <div class="form-group">
    {{ Form::submit('検索',['class'=>'btn btn-outline-primary']) }}
    <a href={{ route('shop.list') }}>クリア</a>
  </div>
  {{ Form::close() }}
  <style >
    .form-control{
      width:20%;
      height:2.5vh;
    }
  </style>

</div>
