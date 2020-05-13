<div class="gender">


  {{ Form::open(['method'=>'get']) }}
  {{ csrf_field()}}
  <div class="form-group">
    {{ Form::label('gender','gender:') }}
    {{ Form::select('gender',$categories,['class'=>'form-control']) }}
  </div>
  <div class="form-group">
    {{ Form::submit('検索',['class'=>'btn btn-outline-primary']) }}
  </div>
  {{ Form::close() }}
</div>
