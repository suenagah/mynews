@extends('layouts.front')

@section('title', '登録済みプロフィールの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>プロフィール一覧</h2>
        </div>
        <div class="row">
           
            <div class="col-md-8">
                <form action="{{ route('profile.index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">名前</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="cond_name" value="{{ $cond_name }}">
                        </div>
                        <div class="col-md-4">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                        <div class="col-md-2">
                            @if($profile)
                            <a href="/profile/edit" class="btn btn-primary">プロフィール編集</a>
                            @else
                            <a href="/profile/create" class="btn btn-primary">プロフィール作成</a>
                            @endif
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">名前</th>
                                <th width="20%">クライミング種類</th>
                                <th width="10%">レベル</th>
                                <th width="20%">都道府県</th>
                                <th width="10%">メッセージを送る</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $profile)
                                <tr>
                                    <th>{{ $profile->id }}</th>
                                    <td>
                                        <a href="/profile/{{$profile->id}}">{{ Str::limit($profile->name, 100) }}</a>
                                    </td>
                                    
                                    <td>
                                        @if($profile->climbing_type == 'bouldering')
                                            ボルダリング
                                        @elseif($profile->climbing_type == 'lead')
                                            リード
                                        @elseif($profile->climbing_type == 'everything')
                                            すべて
                                        @endif
                                    </td>
                                    
                                    <td>
                                        @if($profile->level == 'advanced')
                                            上級
                                        @elseif($profile->level == 'intermediate')
                                            中級
                                        @elseif($profile->level == 'beginner')
                                            初級
                                        @endif
                                    </td>
                                    
                                    <td>{{ Str::limit($profile->prefecture, 250) }}</td>
                                    <td><a href="/profile/{{$profile->id}}"><img src="{{ asset('image/kkrn_icon_mail_9.png') }}" width="36"></a></td>
                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection