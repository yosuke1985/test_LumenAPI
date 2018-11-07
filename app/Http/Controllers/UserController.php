<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{

    //user_idに紐付いたArticleを取ってくる。

    public function showUserAllArticle($id)
    {
        $posts = User::find($id)->posts;

        //createdat見せない

        $filtered = $posts->map(function ($item) {

//            \Log::debug(get_class(collect($item)));
            $item = collect($item)->forget('created_at');
            \Log::debug($item);

            return $item;
        });



        return response()->json($filtered);

    }


    //articleをとってきて、それ


    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }


    public function create(Request $request)
    {
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return response()->json($user);

    }

    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return response()->json($user);

    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json('article remmoved! hell yea!');
    }

    /**
     * @param $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function pageShow($page)
    {
        $users = User::orderBy('updated_at', 'desc')->select('id', 'name', 'email', 'password', 'created_at', 'updated_at')->take(10)->get();


        // 型の調べ方
        \Log::debug(get_class($users));

        $filtered = $users->map(function ($item) {

//            \Log::debug(get_class(collect($item)));
            $item = collect($item)->forget('created_at');
            \Log::debug($item);

            return $item;
        });


        return response()->json($filtered);

        //User tableとUserテーブルを作って記事にユーザーを登録
        //ユーザーごとの記事一覧

    }




}



