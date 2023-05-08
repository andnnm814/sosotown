<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        // dd($products);
        $data = [
            "products" => $products,
        ];
        return view("products.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();
        $data = ['product' => $product];
        return view('products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->file('img1_path'));
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->comment = $request->comment;

        if($request->img1_path){
            // name属性が'img1_path'のinputタグをファイル形式に、画像をpublic/imgに保存
            $img1_path = $request->file('img1_path')->store('public');
            // 上記処理にて保存した画像に名前をつけて、productテーブルのimg1_pathに格納
            $product->img1_path = basename($img1_path);
        }
        if($request->img2_path){
            $img2_path = $request->file('img2_path')->store('public');
            $product->img2_path = basename($img2_path);    
        }
        if($request->img3_path){
            $img3_path = $request->file('img3_path')->store('public');
            $product->img3_path = basename($img3_path);
        }
        if($request->img4_path){
            $img4_path = $request->file('img4_path')->store('public');
            $product->img4_path = basename($img4_path);
        }

        $product->save();

        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $data = ['product' => $product];
        return view('products.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $data = ['product' => $product];
        return view('products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // dd($request);
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->comment = $request->comment;

        if($request->img1_path){
            // name属性が'img1_path'のinputタグをファイル形式に、画像をpublic/imgに保存
            $img1_path = $request->file('img1_path')->store('public');
            // 上記処理にて保存した画像に名前をつけて、productテーブルのimg1_pathに格納
            $product->img1_path = basename($img1_path);
        }
        if(!empty($request->img2_path)){
            $img2_path = $request->file('img2_path')->store('public');
            $product->img2_path = basename($img2_path);    
        }
        if(!empty($request->img3_path)){
            $img3_path = $request->file('img3_path')->store('public');
            $product->img3_path = basename($img3_path);
        }
        if(!empty($request->img4_path)){
            $img4_path = $request->file('img4_path')->store('public');
            $product->img4_path = basename($img4_path);
        }

        $product->save();

        return redirect(route('products.edit', $product));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('products.index'));
    }

    public function addCart(Request $request)
    {
        dd($request);
        // 変数を初期化
        $cartData = [];
        // カートに入れられた商品のID＆注文個数を変数に格納
        $cartData = [
            'session_product_id' => $request->cart_item,
            'session_quantity' => $request->product_quantity,
        ];

        // sessionに”cartData”という名前のデータが「無い」場合(＝カート内に商品が入っていない)
        if(!$request->session()->has('cartData')) {
            // 新たに”cartData(key)”という名で$cartDataをSessionに追加
            $request->session()->push('cartData', $cartData);
        }
        else // sessionに”cartData”という名前のデータが「有る」場合（＝カートに商品が入っている）
        {
            // すでに有る”cartData”の情報を取得
            $sessionCartData = $request->session()->get('cartData');
        }

        // 同一商品を追加する場合に個数を合算する
        // $sameProductId = false;　// 同一商品の場合は「true」に書き換える
        // リクエストされた"product_id"と、セッションに入っている"product_id"が同じ場合、
        // ① $sameProductIdをtrueにする
        // ② 個数を合算する
        // ③ ②で作成した変数を用いて、セッション内の配列内のデータ（商品個数のみ）を上書き
        // ④ 処理を一回で終わらせる
        // foreach($sessionCartData as $index => $sessionData) {
        //     if($sessionData['session_product_id'] === $cartData['session_product_id']) {
        //         $sameProductId = true; //①
        //         $quantity = $sessionData['session_quantity'] + $cartData['session_quantity']; //②
        //         $request->session()->put('cartData.'.$index.'.session_quantity',$quantity); //③
        //         break; //④
        //     }
        // }


        // return view('products.showCart');
    }

    public function showCart(Request $request)
    {
        dd($request->cart_item);
        // // サーバーに保存していた「cart-item」と言う名前のセッション情報を引っ張り出す
        // $request->session()->get('cart-item', )
        return view('products.showCart');
    }
}
