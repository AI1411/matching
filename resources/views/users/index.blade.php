@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
                <div class="col-md-6 px-0">
                    <h1 class="display-4 font-italic">Title of a longer featured blog post</h1>
                    <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and
                        efficiently about what’s most interesting in this post’s contents.</p>
                    <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
                </div>
            </div>
            @include('layouts.message')
            <div class="container">
                <div class="row justify-content-center">
                    <p class="text-center">{{ $users->links() }}</p>
                </div>
            </div>
            <div class="container">
                <p class="float-left mt-4">
                    {{ $totalUsers->count() }}人のユーザーがいます
                </p>
                <div class="row justify-content-center">
                    @include('components.severalScope')
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
                                    class="far fa-thumbs-up mr-2 ml-2" style="color: pink"></i>{{ $user->likes_count }}
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
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <p class="text-center">{{ $users->appends(request()->input())->links() }}</p>
        </div>
    </div>
@endsection
