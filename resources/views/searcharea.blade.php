<div class="years">
  {{ Form::open(['method'=>'get']) }}
  {{ csrf_field()}}
<div class="section s_01">

  <div class="accordion_one">
    <div class="accordion_header">search<div class="i_box"><i class="one_i"></i></div></div>
    <div class="accordion_inner">
      <div class="box_one">
        <p class="txt_a_ac">  <?php
          $arr=[' '];
          for ($i=0; $i<100; $i++) {
            $arr[]=$i;
            // var_dump($arr);
          }
          ?>

          <div class="form-group">
            {{ Form::label('room','room:') }}<!-- 第一引数はshopのデータ持ってきてるんじゃなくてここで定義した物をstoreに入れる用 -->
            {{ Form::select('room',[''=>null,'with room' => 'with room',
            'without room' => 'without room'],['class'=>'form-control']) }}<!-- 一個目がvalue,2個目が表示 -->
          </div>

          <div class="form-group lan">
            {{ Form::label('languages','languages:') }}
            {{ Form::text('languages',null,['class'=>'form-control']) }}
          </div>

          <div class="form-group areas">
            {{ Form::label('area','area:') }}
            {{ Form::text('area',null,['class'=>'form-control']) }}
          </div>
          <div class="form-group">
            {{ Form::submit('search',['class'=>'btn btn-outline-primary h-100']) }}
            <a class="btn btn-secondary" href={{ route('shop.list') }}>clear</a>
          </div>
          {{ Form::close() }}
</p>
      </div>
    </div>
  </div>
  </div>
</div>

<style >
.form-group label{
  width: 40%;
  font-size: 1.2em;
}
.form-group select, .form-group input{
  width: 60%;
  height: 25px;
}
.s_01{
  width:50vh;
}
  .form-control{
    width:20%;
    height:2.5vh;
  }
  .s_01 .accordion_one {
    max-width: 1024px;
    margin: 0 auto;
}
.s_01 .accordion_one .accordion_header {
    background-color: green;
    color: #fff;
    font-size: 20px;
    width:50vh;
    font-weight: bold;
    padding: 8px;
    text-align: center;
    position: relative;
    cursor: pointer;
    transition-duration: 0.2s;
}
.s_01 .accordion_one:nth-of-type(2) .accordion_header {
    background-color: #ff9a05;
}
.s_01 .accordion_one:nth-of-type(3) .accordion_header {
    background-color: #1c85d8;
}
.s_01 .accordion_one .accordion_header:hover {
    opacity: .8;
}
.s_01 .accordion_one .accordion_header .i_box {
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    top: 50%;
    right: 5%;
    width: 20px;
    height: 20px;
    border: 1px solid #fff;
    margin-top: -20px;
    box-sizing: border-box;
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
    transform-origin: center center;
    transition-duration: 0.2s;
}
.s_01 .accordion_one .accordion_header .i_box .one_i {
    display: block;
    width: 18px;
    height: 18px;
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg);
    transform-origin: center center;
    transition-duration: 0.2s;
    position: relative;
}
.s_01 .accordion_one .accordion_header.open .i_box {
    -webkit-transform: rotate(-360deg);
    transform: rotate(-360deg);
}
.s_01 .accordion_one .accordion_header .i_box .one_i:before, .s_01 .accordion_one .accordion_header .i_box .one_i:after {
    display: flex;
    content: '';
    background-color: #fff;
    border-radius: 10px;
    width: 18px;
    height: 4px;
    position: absolute;
    top: 7px;
    left: 0;
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
    transform-origin: center center;
}
.s_01 .accordion_one .accordion_header .i_box .one_i:before {
    width: 4px;
    height: 18px;
    top: 0;
    left: 7px;
}
.s_01 .accordion_one .accordion_header.open .i_box .one_i:before {
    content: none;
}
.s_01 .accordion_one .accordion_header.open .i_box .one_i:after {
    -webkit-transform: rotate(-45deg);
    transform: rotate(-45deg);
}
.s_01 .accordion_one .accordion_inner {
    display: none;
    padding: 30px 30px;
    border-left: 2px solid #db0f2f;
    border-right: 2px solid #db0f2f;
    border-bottom: 2px solid #db0f2f;
    box-sizing: border-box;
}
.s_01 .accordion_one:nth-of-type(2) .accordion_inner {
    border-left: 2px solid #ff9a05;
    border-right: 2px solid #ff9a05;
    border-bottom: 2px solid #ff9a05;
}
.s_01 .accordion_one:nth-of-type(3) .accordion_inner {
    border-left: 2px solid #1c85d8;
    border-right: 2px solid #1c85d8;
    border-bottom: 2px solid #1c85d8;
}
.s_01 .accordion_one .accordion_inner .box_one {
    height: 300px;
}
.s_01 .accordion_one .accordion_inner p.txt_a_ac {
    margin: 0;
}
@media screen and (max-width: 1024px) {
    .s_01 .accordion_one .accordion_header {
        font-size: 18px;
    }
    .s_01 .accordion_one .accordion_header .i_box {
        width: 30px;
        height: 30px;
        margin-top: -15px;
    }
}
@media screen and (max-width: 767px) {
    .s_01 .accordion_one .accordion_header {
        font-size: 16px;
        text-align: left;
        padding: 15px 60px 15px 15px;
    }
}
</style>
<script type="text/javascript" defer>
$(function(){
//.accordion_oneの中の.accordion_headerがクリックされたら
$('.s_01 .accordion_one .accordion_header').click(function(){
  //クリックされた.accordion_oneの中の.accordion_headerに隣接する.accordion_innerが開いたり閉じたりする。
  $(this).next('.accordion_inner').slideToggle();
  $(this).toggleClass("open");
});
});
</script>
