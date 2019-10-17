@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if($login_user->points >= 0)
                <div class="col-md-8 mt-3">
                    @include('layouts.message')
                    <div class="card">
                        <div class="card-header">
                            {{ $user->account_name }}さんのプロフィール
                            @if($login_user->id === $user->id)
                                <a href="{{ route('users.edit', $user->id) }}">
                                    <button class="ml-auto btn btn-primary btn-sm float-right">プロフィールを編集する</button>
                                </a>
                            @endif
                        </div>
                        <div class="card-body">
                            @if(!$login_user->isFollowing($user))
                                <form action="" method="get">
                                    <button type="submit" name="follow" value="1"><i class="fas fa-heart"></i></button>
                                    {{ $user->favorites_count }}
                                </form>
                            @else
                                <form action="" method="get">
                                    <button type="submit" name="follow" value="0"><i class="fas fa-heart" style="color: red"></i></button>
                                    {{ $user->favorites_count }}
                                </form>
                            @endif
                            <a href=""><i class="far fa-thumbs-up ml-2"></i></a>{{ $user->likes_count }}
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item text-center">
                                    <img src="/storage/profile_image/{{ $user->image }}" alt="" height="100%"
                                         width="70%">
                                </li>
                                <li class="list-group-item">名前：　{{ $user->account_name }}</li>
                                <li class="list-group-item">性別：　{{ config('const.gender')[$user->gender] }}</li>
                                <li class="list-group-item">年齢：　{{ config('const.ages')[$user->age] }}</li>
                                <li class="list-group-item">地域：　{{ $user->pref->region->name }}</li>
                                <li class="list-group-item">都道府県：　{{ $user->pref->name }}</li>
                                <li class="list-group-item">自己紹介：　{{ $user->introduce }}</li>
                                <li class="list-group-item">
                                    趣味１：　{{ config('const.hobby')[$user->hobby_1] }}</li>
                                <li class="list-group-item">
                                    趣味２：　{{ config('const.hobby')[$user->hobby_2] }}</li>
                                <li class="list-group-item">
                                    趣味３：　{{ config('const.hobby')[$user->hobby_3] }}</li>
                                <a href="{{ route('users.index') }}" class="btn btn-primary">一覧へ戻る</a>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
