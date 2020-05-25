<?php

namespace App\Http\Controllers;

use App\Shop;
use App\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function __construct(){
      $this->middleware('auth')->except('index','show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      // $query = Shop::query();
      $area=$request->input('area');
      $age=$request->input('age');
      $room=$request->input('room');
      $languages=$request->input('languages');
      $sex=$request->input('sex');
      $characters=$request->input('characters');

        if(!empty($area)){
          $shops = Shop::where('adress','like','%'.$area.'%')->get();
          $categories=Category::all()->pluck('name','id');
        }
        if(!empty($characters)){
          $shops = Shop::where('characters','like','%'.$area.'%')->get();
          $categories=Category::all()->pluck('name','id');
        }
        if(!empty($area)){
          $shops = Shop::where('adress','like','%'.$area.'%')->get();
          $categories=Category::all()->pluck('name','id');
        }
        if(!empty($age)){
          $shops = Shop::where('years','like',$age)->get();//３つ並行でifおいても最初の物が体とelseでshop::allで検索かかるからダメ
          $categories=Category::all()->pluck('name','id');
        }
        if(!empty($room)){
          $shops = Shop::where('room','like',$room)->get();//３つ並行でifおいても最初の物が体とelseでshop::allで検索かかるからダメ
          $categories=Category::all()->pluck('name','id');
        }
        if(!empty($languages)){
          $shops = Shop::where('language','like','%'.$languages.'%')->get();//３つ並行でifおいても最初の物が体とelseでshop::allで検索かかるからダメ
          $categories=Category::all()->pluck('name','id');
        }
        if(!empty($gender)){
          $shops = Shop::where('sex','like','%'.$sex.'%')->get();
          $categories=Category::all()->pluck('name','id');
        }
        if($request->input()==null){
          // var_dump($request->input('room'));
          $shops = Shop::all();
          $categories=Category::all()->pluck('name','id');
        }
        return view('index',['shops'=>$shops,'categories'=>$categories,'request'=>$request]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all()->pluck('name','id');
        return view('new',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//form使ったときはデータ送られてるからrequest使う。
    {
        $shop = new Shop;
        $user = \Auth::user();//ログインしているユーザーの情報を取り出している

        $shop->name = request('name');
        $shop->adress = request('adress');
        $shop->language = request('language');
        $shop->characters = request('characters');
        $shop->content = request('content');
        $shop->job = request('job');
        $shop->activetime = request('activetime');
        $shop->room  = request('room');
        $shop->fb  = request('fb');
        $shop->sex  = request('sex');
        $shop->user_id = $user->id;//ログインしているユーザーのidを入れる。これまではidを指定してそのidのメンバーの名前を出していた

        if($request->file('photo')==null){
          $shop->picname = '';
          $shop->save();
          return redirect()->route('shop.detail',['id' => $shop->id]);// showに遷移するときはもちろん毎回idを渡す必要があるindex.phpの中のコードも同じ
        }else{
          $file_name = $request->file('photo')->getClientOriginalName();
          $shop->picname = $file_name;
          // 上のddで見てみるとgetclient~~でファイル名が記載されてることがわかる。filenameにファイル名を入れてその名前で名前をつけて保存する
          $request->file('photo')->storeAs('',$file_name);
          // $request->file('photo')->storeAs('',request('name'));
          $shop->save();
          return redirect()->route('shop.detail',['id' => $shop->id]);// showに遷移するときはもちろん毎回idを渡す必要があるindex.phpの中のコードも同じ
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show($id)// この$idは仮引数だからなんでもいいルートの{id}から自動で取ってくる
    {
      $shop=Shop::find($id);
      $user =\Auth::user();//userメソッドよんでログインしているユーザーのテーブル取り出す
      if($user){//ここでif文入れないとログインしてない時に$login_user_id使うviewでエラー起きました！
        $login_user_id = $user->id;//その中のidを代入する。つまり現時点でログインしているユーザーのid
      }else{
        $login_user_id='';
      }

      return view('show',['shop'=>$shop,'login_user_id'=>$login_user_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop,$id)
    {// ほぼnewと同じでいいけど、既存のshopのデータ表示させるから$shop必要
      $shop=Shop::find($id);
      $categories=Category::all()->pluck('name','id');
      return view('edit',['shop'=>$shop,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id, shop $shop)
    {
      $shop = Shop::find($id);

      $shop->name = request('name');//request->input()tと同意技
      $shop->adress = request('adress');
      $shop->sex  = request('sex');
      $shop->language = request('language');
      $shop->content = request('content');
      $shop->category_id  = request('category_id');
      $shop->room  = request('room');
      $shop->characters = request('characters');
      $shop->fb  = request('fb');
      $shop->job = request('job');
      $shop->activetime = request('activetime');

      if($request->file('photo')==null){
        $shop->save();
        return redirect()->route('shop.detail',['id' => $shop->id]);
      }else{
        $file_name = $request->file('photo')->getClientOriginalName();
        $shop->picname = $file_name;
        // 上のddで見てみるとgetclient~~でファイル名が記載されてることがわかる。filenameにファイル名を入れてその名前で名前をつけて保存する
        $request->file('photo')->storeAs('',$file_name);
        $shop->save();
        return redirect()->route('shop.detail',['id' => $shop->id]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(shop $shop,$id)
    {
        $shop=Shop::find($id);
        $shop->delete();
        return redirect('/shops');
    }
}
