<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\Like;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * TOPページを表示
     */
    public function index()
    {
        $products = Product::paginate(18);
        // dd($products);
        $data = [
            "products" => $products,
        ];
        return view("products.index", $data);
    }

    /**
     * 商品新規登録ページを表示
     */
    public function create()
    {
        $product = new Product();
        $data = ['product' => $product];
        return view('products.create', $data);
    }

    /**
     * 商品新規登録
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required|integer|min:0',
            'comment' => 'string',
            'img1_path' => 'required'
        ]);

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
     * 商品詳細ページを表示
     */
    public function show(Product $product)
    {
        // $likeProducts = Auth::user()->likes()->pluck('product_id');
        // $user_id = Auth::id();  
                
        // $data = [
        //     'product' => $product,
        //     'likeProducts' => $likeProducts,
        //     'user_id' => $user_id
        // ];

        if(Auth::check()){
            $likeProducts = Auth::user()->likes()->pluck('product_id');
            $user_id = Auth::id(); 
            $data = [
                'product' => $product,
                'likeProducts' => $likeProducts,
                'user_id' => $user_id
            ];
        }elseif(!Auth::check()){
            $data = [
                'product' => $product
            ];
        }
        
        return view('products.show', $data);
    }

    /**
     * 商品編集ページを表示
     */
    public function edit(Product $product)
    {
        $data = ['product' => $product];
        return view('products.edit', $data);
    }

    /**
     * 商品更新
     */
    public function update(Request $request, Product $product)
    {
        // $request->validate($request, Product::$rules);
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required|integer|min:0',
            'comment' => 'string',
        ]);

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

        return redirect(route('products.show', $product));
    }

    /**
     * 商品削除
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('products.index'));
    }

    public function addCart(Request $request)
    {
        // dd($request);
        // 変数を初期化
        $cartData = [];
        // カートに入れられた商品のID＆注文個数を変数に格納
        $cartData = [
            'session_product_id' => $request->product_id,
            'session_quantity' => $request->product_quantity,
        ];

        // 1 カート内に商品が入っていない場合(＝sessionに”cartData”という名前のデータが「無い」)
        if(!$request->session()->has('cartData')) {
            // セッションに商品を追加する
            $request->session()->push('cartData', $cartData);
        }
        else // 2 カート内に商品が入っている場合（＝sessionに”cartData”という名前のデータが「有る」）
        {
            // ”cartData”の情報を取得
            $sessionCartData = $request->session()->get('cartData');
        
            // カート内の商品と同一商品を追加する場合、個数を合算する
            $sameProductId = false;
            // リクエストされた"product_id"と、セッションに入っている"product_id"が同じ場合、
            // ① $sameProductIdをtrueにする
            // ② 個数を合算する
            // ③ ②で作成した変数を用いて、セッション内の配列内のデータ（商品個数のみ）を上書き
            // ④ 処理を一回で終わらせる
            foreach($sessionCartData as $index => $sessionData) {
                if($sessionData['session_product_id'] === $cartData['session_product_id']) {
                    $sameProductId = true; //①
                    $quantity = $sessionData['session_quantity'] + $cartData['session_quantity']; //②
                    $request->session()->put('cartData.'.$index.'.session_quantity',$quantity); //③
                    break; //④
                }   
            }
            // 3 カート内に商品があり、かつ追加する商品がカート内の商品が異なる場合
            if($sameProductId === false){
                $request->session()->push('cartData', $cartData);
            }
        }

        $request->session()->put('user_id', ($request->user_id));
        return redirect()->route('products.showCart');
    }

    public function showCart(Request $request)
    {
        // 1）セッションに保存されているかつ、現在ログインしているユーザーIDを取得
        $sessionUser = User::find($request->session()->get('user_id'));

        // 2）index番号の歯抜け対策のため、「セッションに'cartData'が有る場合、それらの値のindex番号を連番になるよう処理する」
        if($request->session()->has('cartData')){
            $cartData = array_values($request->session()->get('cartData'));
        }

        if(isset($cartData)){
            // ①商品IDのみを変数から抽出
            $sessionProductId = array_column($cartData, 'session_product_id');
            // ② ①を元にDBから商品情報を取得し、同時にリレーション先の情報も取得する
            $product = Product::with('category')->find($sessionProductId);

            foreach($cartData as $index => &$data) {
                $data['product_image'] = $product[$index]->img1_path;
                $data['product_name'] = $product[$index]->name;
                $data['category_name'] = $product[$index]['category']->name;
                $data['price'] = $product[$index]->price;
                $data['itemPrice'] = $data['price'] * $data['session_quantity'];
            }
            unset($data);

            return view('products.showCart', compact('sessionUser', 'cartData'));

        } else {
            return view('products.emptyCart');
        }
    }

    public function removeCart(Request $request)
    {
        $sessionCartData = $request->session()->get('cartData');
        // dd($sessionCartData);

        // 削除ボタンから受け取ったproduct_idと個数を配列に格納
        $removeCartItem = [
            ['session_product_id' => $request->product_id,
            'session_quantity' => $request->product_quantity]
        ];

        // sessionデータと削除対象データを比較、重複部分を削除し、残りの配列を抽出
        $removeCompletedCartData = array_udiff($sessionCartData, $removeCartItem, function($sessionCartData, $removeCartItem) {
            $result1 = $sessionCartData['session_product_id'] - $removeCartItem['session_product_id'];
            $result2 = $sessionCartData['session_quantity'] - $removeCartItem['session_quantity'];
            return $result1 + $result2;
        });

        // 上記の抽出情報でcartDataを上書き処理
        $request->session()->put('cartData', $removeCompletedCartData);
        // 上書き後のsessionを再取得
        $cartData = $request->session()->get('cartData');

        // session情報があればtrue
        if(!empty($cartData)) {
            return redirect()->route('products.showCart');
        }
        return view('products.emptyCart');
    }

    public function showLiked()
    {
        $likeProductId = Auth::user()->likes()->get('product_id');
        $likeProducts = Product::find($likeProductId);
        
        // dd($likeProduct);
        $data = [
            "likeProducts" => $likeProducts
        ];
        return view('products.showLiked', $data);
    }

    public function search(Request $request)
    {
        $category_id = $request->category_id;
        $keyword = $request->keyword;
        $min_price = (int)$request->min_price;
        $max_price = (int)$request->max_price;
        $sort = $request->sort;


        // DBからデータを取得
        $query = Product::query();

        // カテゴリー検索
        if(!empty($category_id)) {
            $query->where('category_id', '=', $category_id);
        }
        // キーワード検索
        if(!empty($keyword)) {
            $query->where(function($query) use($keyword){
                $query->where('name', 'LIKE', '%'.$keyword.'%')
                ->orWhere('comment', 'LIKE', '%'.$keyword.'%');
            });
        }
        // 価格検索
        if(!empty($min_price) && !empty($max_price)) {
            $query
                ->where('price', '>=', $min_price)
                ->where('price', '<=', $max_price);
        }
        elseif(!empty($min_price)){
            $query->where('price', '>=', $min_price);
        }
        elseif(!empty($max_price)){
            $query->where('price', '<=', $max_price);
        }
        // 並び順
        if(!empty($sort) && $sort == 'price_asc') {
            $query->orderBy('price', 'asc');
        }elseif(!empty($sort) && $sort == 'price_desc') {
            $query->orderBy('price', 'desc');
        }


        $products = $query->paginate(20);
        $data = [
            "products" => $products,
        ];

        return view('products.index', $data);
    }

    // 商品お気に入り機能
    public function storeLike(Request $request) {
        $like = Like::where('product_id', $request->productId)
        ->where('user_id', $request->userId)
        ->first();

        if($like) {
            $like->delete();
            return response()->json(['message' => 'Like deleted successfully'], 200);
        }

        $like = new Like();
        $like->user_id = $request->userId;
        $like->product_id = $request->productId;
        $like->save();
        return response()->json(['message' => 'Like deleted successfully'], 200);
    }

    // public function deleteLike(Request $request) {
    //     // Likeを検索する
    //     $like = Like::where('product_id', $request->productId)
    //     ->where('user_id', $request->userId)
    //     ->first();

    //     // Likeが存在する場合は削除する
    //     if ($like) {
    //     $like->delete();

    //     // 必要な処理を追加する...
    //     return response()->json(['message' => 'Like deleted successfully'], 200);
    //     }
    // }
    



}
