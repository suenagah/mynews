<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
// 追記

class ProfileController extends Controller
{
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
            $profile = Profile::where('user_id',  Auth::user()->id)->first();
        return view('profile.index', ['posts' => $posts, 'cond_name' => $cond_name, 'profile' => $profile]);
    }
    // 以下を追記
    public function add()
    {
        return view('profile.create');
    }
    
    public function edit()
    {
        $profile = Profile::where('user_id',  Auth::user()->id)->first();
        return view('profile.edit',['profile' => $profile]);
    }

    public function create(Request $request)
    {
        // 以下を追記
        // Validationを行う
        $this->validate($request, Profile::$rules);

        $profile = new Profile;
        $form = $request->all();
        
        // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $profile->image_path = basename($path);
        } else {
            $profile->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);

        // データベースに保存する
        $profile->fill($form);
        $profile->user_id = Auth::user()->id;
        $profile->save();
        
        return redirect('profile/index');
    }
        public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Profile::$rules);
        // News Modelからデータを取得する
        $profile = Profile::find($request->id);
        // dd($request);
        // dd($profile);
        // 送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        
        if ($request->remove == 'true') {
            $profile_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $profile_form['image_path'] = basename($path);
        } else {
            $profile_form['image_path'] = $profile->image_path;
        }

        unset($profile_form['image']);
        unset($profile_form['remove']);
        unset($profile_form['_token']);

        // 該当するデータを上書きして保存する
        $profile->fill($profile_form)->save();

        return redirect('profile/index');
    }
    // 以下を追記

    public function delete(Request $request)
    {
        // 該当するNews Modelを取得
        $profile = Profile::find($request->id);

        // 削除する
        $profile->delete();

        return redirect('profile/index/');
    }
    
    public function show($id)
    {
        
        $profile = Profile::findOrFail($id);
        return view('profile.show', ['profile' => $profile]);
    }
    
    //
}
