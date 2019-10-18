@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center"><h5>検索ページ</h5></div>
                    <div class="card-body">
                        <form action="" method="get">
                            <fieldset class="mt-1">
                                <h5 class="font-weight-bold" style="background-color: whitesmoke;">
                                    年代</h5>
                                @foreach(config('const.ages') as $key => $age)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="age" value="{{ $key }}">
                                        <label class="form-check-label pl-0 pr-3" for="">{{ $age }}</label>
                                    </div>
                                @endforeach
                            </fieldset>
{{--                            <fieldset class="mt-1">--}}
{{--                                <h5 class="font-weight-bold" style="background-color: whitesmoke;">--}}
{{--                                    地域</h5>--}}
{{--                                @foreach($regions as $key => $region)--}}
{{--                                    <div class="form-check form-check-inline">--}}
{{--                                        <input class="form-check-input" type="radio" name="region_id"--}}
{{--                                               value="{{ $key }}">--}}
{{--                                        <label class="form-check-label pl-0 pr-3" for="">{{ $region->name }}</label>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            </fieldset>--}}
                            <fieldset class="mt-1">
                                <h5 class="font-weight-bold" style="background-color: whitesmoke;">
                                    都道府県</h5>
                                @foreach(config('const.pref') as $key => $pref)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pref_id"
                                               value="{{ $key }}">
                                        <label class="form-check-label pl-0 pr-3" for="">{{ $pref }}</label>
                                    </div>
                                @endforeach
                            </fieldset>
                            <fieldset class="mt-1">
                                <h5 class="font-weight-bold" style="background-color: whitesmoke;">
                                    趣味<small>（複数選択可）</small>
                                </h5>
                                @foreach(config('const.hobby') as $key => $hobby)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="hobby[]"
                                               value="{{ $key }}">
                                        <label class="form-check-label pl-0 pr-3" for="">{{ $hobby }}</label>
                                    </div>
                                @endforeach
                            </fieldset>
                            <button class="btn btn-block btn-primary" type="submit" style="cursor: pointer">検索する
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <h5 class="mt-2 mb-2">{{ $usersAllCount }}件中{{ $users->count() }}件がヒットしました。</h5>
        検索条件: @if(isset($request['pref_id'])){{ config('const.pref')[$request['pref_id']] }}@endif :
                 @if(isset($request['age'])){{ config('const.ages')[$request['age']] }}@endif
        <div class="container">
            <div class="row justify-content-center">
                <p class="text-center">{{ $users->links() }}</p>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($users as $user)
                <div class="col-lg-4">
                    <div class="card border-success ml-2 mr-2 mb-2">
                        <p class="text-center">
                            <a href="{{ route('users.show', $user->id) }}">
                                <img src="/storage/profile_image/{{ $user->image }}" alt="" width="140px"
                                     height="140px"
                                     class="rounded-circle justify-content-center mt-2">
                            </a>
                        </p>
                        <p class="text-center"><i class="far fa-heart mr-2"
                                                  style="color: red"></i>{{ $user->favorites_count }}<i
                                class="far fa-thumbs-up mr-2 ml-2"
                                style="color: pink"></i>{{ $user->likes_count }}
                        </p>
                        <h2 class="text-center">{{ $user->account_name }}
                            @if(auth()->user()->areFollowingEachOther($user))
                                <i class="fas fa-grin-hearts" style="color: deeppink"></i>
                            @elseif(auth()->user()->isFollowing($user))
                                <i class="fas fa-star" style="color: yellow"></i>
                            @elseif($user->isFollowing(auth()->user()))
                                <i class="fas fa-hand-holding-heart" style="color: #a11dff"></i>
                            @endif
                        </h2>
                        <p class="text-center">{{ config('const.ages')[$user->age] }}</p>
                        <p class="text-center">{{ $user->pref->region->name }}</p>
                        <p class="text-center">{{ $user->pref->name }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <p class="text-center">{{ $users->links() }}</p>
        </div>
    </div>
@endsection
