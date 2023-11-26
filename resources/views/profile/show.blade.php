{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.profile')


{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'Myプロフィール')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール</h2>
                
                <table>
                    <tr>
                        <td>ニックネーム</td>
                        <td> {{$profile->name}}</td>
                    </tr>
                    <tr>
                        <td>性別</td>
                        <td>
                            @if($profile->gender == 'male')
                                男性
                            @elseif($profile->gender == 'female')
                                女性
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>年齢</td>
                        <td>{{$profile->age}}</td>
                    </tr>
                    <tr>
                        <td>都道府県</td>
                        <td>{{$profile->prefecture}}</td>
                    </tr>
                    <tr>
                        <td>クライミング種類</td>
                        <td>
                            @if($profile->climbing_type == 'bouldering')
                                ボルダリング
                            @elseif($profile->climbing_type == 'lead')
                                リード
                            @elseif($profile->climbing_type == 'everything')
                                すべて
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>レベル</td>
                        <td>
                            @if($profile->level == 'advanced')
                                上級
                            @elseif($profile->level == 'intermediate')
                                中級
                            @elseif($profile->level == 'beginner')
                                初級
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>自己紹介</td>
                        <td>{{$profile->introduction}}</td>
                    </tr>
                     <tr>
                        <td>プロフィール画像</td>
                        <td><img src="{{ asset('storage/image/' . $profile->image_path) }}" alt="Image"></td>
                    </tr>
                </table>
                    <form action="{{ route('profile.message') }}" method="post" >
                    <div class="form-group row">
                        <label class="col-md-2">メッセージを送る</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="send_message" rows="1">{{ old('send_message') }}</textarea>
                            <input type="hidden" id="user_id" name="user_id" value="{{$profile->user_id}}" />
                        </div>
                    </div>
                    @csrf
                    <input type="submit" class="btn btn-primary" value="送信">
                    </form>  
                    @foreach($messages as $message)
                    <!--<hr>-->
                    <!--<li>{{ $message->fromUser->name }}</li>-->
                    <!--<li>{{ $message->message }}</li>-->
                    @php
                      $align_css = ($message->from_user_id == Auth::user()->id) ? 'text-end' : '';
                    @endphp
                    <p class="{{ $align_css }}">
                        <span class="truncate">{{$message->message}}</span><br />
                        <span class="initialism">{{$message->created_at}} ＠{{$message->fromUser->name}}</span>
                    </p>
                    @endforeach
            </div>
        </div>
        
        
    </div>
@endsection