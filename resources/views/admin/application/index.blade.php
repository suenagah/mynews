@extends('layouts.admin')
@section('title', '登録済みユーザーの一覧')
<p>テスト</p>

@section('content')
    <div class="container">
        <div class="row">
            <h2>ユーザー一覧</h2>
        </div>
        <div class="row">
           
            <div class="col-md-8">
                <form action="{{ route('admin.application.index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">名前</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_name" value="{{ $cond_name }}">
                        </div>
                        <div class="col-md-2">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="検索">
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
                                <th width="50%">自己紹介</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $user)
                                <tr>
                                    <th>{{ $user->id }}</th>
                                    <td>{{ Str::limit($user->name, 100) }}</td>
                                    <td>{{ Str::limit($user->introduction, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('admin.application.edit', ['id' => $user->id]) }}">編集</a>
                                        </div>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection