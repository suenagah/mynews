{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.profile')


{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'Myプロフィール')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="{{ route('profile.edit') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">名前（ニックネーム）</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $profile->name }}">
                        </div>
                    </div>
                      
                        <fieldset>
                             <label class="col-md-2">性別</label>
                             <div>
                              <input type="radio" id="genderChoice1" name="gender" value="male" @if ($profile->gender === 'male') checked @endif />
                              <label for="genderChoice1">男性</label>
                              <input type="radio" id="genderChoice2" name="gender" value="female" @if ($profile->gender === 'female') checked @endif/>
                              <label for="genderChoice2">女性</label>
                             </div>
                         </fieldset>
                        
                    <div class="form-group row">
                        <label class="col-md-2">年齢</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="age" value="{{ $profile->age }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">都道府県</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="prefecture" value="{{ $profile->prefecture }}">
                        </div>
                    </div>
              
                        <fieldset>
                             <label class="col-md-2">レベル</label>
                             <div>
                              <input type="radio" id="levelChoice1" name="level" value="advanced" @if ($profile->level === 'advanced') checked @endif />
                              <label for="levelChoice1">上級</label>
                              <input type="radio" id="levelChoice2" name="level" value="intermediate" @if ($profile->level === 'intermediate') checked @endif />
                              <label for="levelChoice2">中級</label>
                              <input type="radio" id="levelChoice3" name="level" value="beginner" @if ($profile->level === 'beginer') checked @endif />
                              <label for="levelChoice3">初級</label>
                             </div>
                         </fieldset>
                    
                        <fieldset>
                             <label class="col-md-2">クライミング種類</label>
                             <div>
                              <input type="radio" id="climbing_typeChoice1" name="climbing_type" value="bouldering" @if ($profile->climbing_type === 'bouldering') checked @endif />
                              <label for="climbing_typeChoice1">ボルダリング</label>
                              <input type="radio" id="climbing_typeChoice2" name="climbing_type" value="lead" @if ($profile->climbing_type === 'lead') checked @endif/>
                              <label for="climbing_typeChoice2">リード</label>
                              <input type="radio" id="climbing_typeChoice3" name="climbing_type" value="everything" @if ($profile->climbing_type === 'everything') checked @endif/>
                              <label for="climbing_typeChoice3">すべて</label>
                             </div>
                         </fieldset>
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ $profile->introduction }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <img src="{{ asset('storage/image/' . $profile->image_path) }}" alt="Image">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $profile->id }}">
                    @csrf
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection