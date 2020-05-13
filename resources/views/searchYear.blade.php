<div class="years">
  {{ Form::open(['method'=>'get']) }}
  {{ csrf_field()}}
  <div class="form-group">
    {{ Form::label('age','age:') }}
    {{ Form::text('age',null,['class'=>'form-control']) }}
  </div>
  <div class="form-group">
    {{ Form::submit('検索',['class'=>'btn btn-outline-primary']) }}
  </div>
  {{ Form::close() }}
</div>
  <style >
    .form-control{
      width:20%;
      height:2.5vh;
    }
  </style>
