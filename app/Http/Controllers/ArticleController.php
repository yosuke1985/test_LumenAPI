<?php
namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;


class ArticleController extends Controller
{

    public function index(){
        $articles = Article::all();
        return response()->json($articles);
    }


    public function create(Request $request){

        \Log::debug($request);


        $article = new Article;
        $article->title = $request->title;
        $article->contents = $request->contents;
        $article->user_id = $request->user_id;
        $article->save();
        return response()->json($article);
    }

    public function show($id){
        $article = Article::find($id);
        return response()->json($article);
    }

    public function update(Request $request,$id){
        $article = Article::find($id);
        $article->title = $request->title;
        $article->contents = $request->contents;
        $article->user_id = $request->user_id;
        $article->save();
        return response()->json($article);
    }

    public function destroy($id){
        $article = Article::find($id);
        $article->delete();
        return response()->json('article remmoved! hell yea!');
    }

    /**
     * @param $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function pageShow($page)
    {
        $articles = Article::orderBy('updated_at', 'desc')->select('id','title','contents','user_id','created_at', 'updated_at')->take(10)->get();


        // 型の調べ方
        \Log::debug(get_class($articles));
        $filtered = $articles->map(function ($item) {

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