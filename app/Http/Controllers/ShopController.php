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
        if($request==filled('keyword')){
          $keyword=$request->input('keyword');
          $shops = Shop::where('adress','like','%'.$keyword.'%')->get();
        }else{
          $shops = Shop::all();
        }
        if($request==filled('gender')){
          $gender=$request->input('gender');
          $shops = Shop::where('category_id','like','%'.$gender.'%')->get();
          $categories=Category::all()->pluck('name','id');
        }else{
          $shops = Shop::all();
        }

        return view('index',['shops'=>$shops,'categories'=>$categories]);
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
        $shop->years = request('years');
        $shop->adress = request('adress');
        $shop->language = request('language');
        $shop->content = request('content');
        $shop->category_id  = request('category_id');
        $shop->user_id = $user->id;//ログインしているユーザーのidを入れる。これまではidを指定してそのidのメンバーの名前を出していた

        // dd($request->file('photo'));
        // dd($request->all());
        $file_name = $request->file('photo')->getClientOriginalName();
        $shop->picname = $file_name;
        // 上のddで見てみるとgetclient~~でファイル名が記載されてることがわかる。filenameにファイル名を入れてその名前で名前をつけて保存する
        $request->file('photo')->storeAs('',$file_name);
        // $request->file('photo')->storeAs('',request('name'));
        $shop->save();
        return redirect()->route('shop.detail',['id' => $shop->id]);// showに遷移するときはもちろん毎回idを渡す必要があるindex.phpの中のコードも同じ
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
      $shop->years = request('years');
      $shop->adress = request('adress');
      $shop->language = request('language');
      $shop->content = request('content');
      $shop->category_id  = request('category_id');

      // dd($request->all());
      $file_name = $request->file('photo')->getClientOriginalName();
      $shop->picname = $file_name;
      // 上のddで見てみるとgetclient~~でファイル名が記載されてることがわかる。filenameにファイル名を入れてその名前で名前をつけて保存する
      $request->file('photo')->storeAs('',$file_name);
      $shop->save();
      return redirect()->route('shop.detail',['id' => $shop->id]);
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
