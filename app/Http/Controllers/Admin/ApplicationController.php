<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// 以下の1行を追記することで、News Modelが扱えるようになる
use App\Models\Profile;

class ApplicationController extends Controller
{
    //
    // public function add()
    // {
    //     return view('admin.application.create');
    // }

    // public function create(Request $request)
    // {
    //     // 以下を追記
    //     // Validationを行う
    //     $this->validate($request, User::$rules);

    //     $user = User::find(Auth::id());
    //     var_dump($user);
    //     exit;
    //     $form = $request->all();

    //     // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
    //     if (isset($form['image'])) {
    //         $path = $request->file('image')->store('public/image');
    //         $user->image_path = basename($path);
    //     } else {
    //         $user->image_path = null;
    //     }

    //     // フォームから送信されてきた_tokenを削除する
    //     unset($form['_token']);
    //     // フォームから送信されてきたimageを削除する
    //     unset($form['image']);

    //     // データベースに保存する
    //     $user->fill($form);
    //     $user->save();

    //     return redirect('admin/application/create');
    // }
    
 // 以下を追記
    public function index(Request $request)
    {
        $cond_name = $request->cond_name;
        if ($cond_name != '') {
            // 検索されたら検索結果を取得する
            $posts = Profile::where('name', $cond_name)->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Profile::all();
        }
        return view('admin.application.index', ['posts' => $posts, 'cond_name' => $cond_name]);
    }
    public function edit(Request $request)
    {
        $profile = Profile::find($request->id);
        if (empty($profile)){
            abort(404);
        }
        return view('admin.application.edit', ['profile_form' => $profile]);
    }

    public function update(Request $request)
    {
        // dd($request);
        // Validationをかける
        $this->validate($request, Profile::$rules);
        // News Modelからデータを取得する
        $profile = Profile::find($request->id);
        // 送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        unset($profile_form['_token']);

        // 該当するデータを上書きして保存する
        $profile->fill($profile_form)->save();
        
        return redirect('admin/application/edit');
    }
}
