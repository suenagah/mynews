@extends('layouts.application')
@section('title', 'Find Climbers')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="{{ route('admin.application.update') }}" method="post" enctype="multipart/form-data">

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
                            <input type="text" class="form-control" name="name" value="{{ $user_form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="gender" value="{{ $user_form->gender }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">年齢</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="age" value="{{ $user_form->age }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">都道府県</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="prefecture" value="{{ $user_form->prefecture }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">レベル</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="level" value="{{ $user_form->level }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">クライミングタイプ</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="climbing_type" value="{{ $user_form->climbing_type }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ $user_form->introduction }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $user_form->id }}">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection