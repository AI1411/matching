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
                                    <button class="ml-auto btn btn-primary float-right">プロフィールを編集する</button>
                                </a>
                            @endif
                        </div>
                        @if(!$login_user->isFollowing($user))
                            <form action="">
                                <button type="submit" name="follow" value="follow" class="btn btn-dark mt-2 ml-2">フォローしていません</button>
                            </form>
                        @elseif($login_user->isFollowing($user))
                            <form action="">
                                <button type="submit" name="follow" value="unfollow" class="btn btn-success mt-2 ml-2">フォローしています</button>
                            </form>
                        @endif
                        @if(!$login_user->hasLiked($user))
                            <form action="" class="ml-2 mt-2">
                                <button type="submit" name="like" value="like"><i class="fas fa-thumbs-up"></i></button>
                                {{ $user->likes_count }}
                            </form>
                        @elseif($login_user->hasLiked($user))
                            <form action="" class="ml-2 mt-2">
                                <button type="submit" name="like" value="unlike"><i class="fas fa-thumbs-up" style="color: #227dc7"></i></button>
                                {{ $user->likes_count }}
                            </form>
                        @endif
                        @if(!$login_user->hasFavorited($user))
                            <form action="" class="ml-2 mt-2">
                                <button type="submit" name="favorite" value="favorite"><i class="fas fa-heart"></i></button>
                                {{ $user->favorites_count }}
                            </form>
                        @elseif($login_user->hasFavorited($user))
                            <form action="" class="ml-2 mt-2">
                                <button type="submit" name="favorite" value="unfavorite"><i class="fas fa-heart" style="color: red"></i></button>
                                {{ $user->favorites_count }}
                            </form>
                        @endif
                        <div class="card-body">
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
