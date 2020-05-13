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
