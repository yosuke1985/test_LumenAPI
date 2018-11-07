<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{

    public function index(){
      $product = Product::all();
      return response()->json($product);
    }


    public function create(Request $request){
        $product = new Product;

        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;

        $product->save();

        return response()->json($product);

    }

    public function show($id){
        $product = Product::find($id);
        return response()->json($product);
    }

    public function update(Request $request,$id){
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
        return response()->json($product);

    }

    public function destroy($id){
        $product = Product::find($id);
        $product->delete();

        return response()->json('product remmoved! hell yea!');
    }

    /**
     * @param $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function pageShow($page)
    {
        $products = Product::orderBy('updated_at', 'desc')->select('id','name','price','description','created_at', 'updated_at')->take(10)->get();


        // 型の調べ方
        \Log::debug(get_class($products));

        $filtered = $products->map(function ($item) {

//            \Log::debug(get_class(collect($item)));
            $item = collect($item)->forget('created_at');
            \Log::debug($item);

            return $item;
        });


        return response()->json($filtered);

        //User tableとArticleテーブルを作って記事にユーザーを登録
        //ユーザーごとの記事一覧

    }



}