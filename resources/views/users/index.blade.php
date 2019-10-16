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
            <div class="container">
                <div class="row justify-content-center">
                    <p class="text-center">{{ $users->links() }}</p>
                </div>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <p class="text-center">
                        <input type="text">
                    </p>
                    <p class="text-center">
                        <input type="text">
                    </p>
                    <p class="text-center">
                        <input type="text">
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach($users as $user)
                    <div class="col-lg-4">
                        <p class="text-center">
                            <a href="{{ route('users.show', $user->id) }}">
                                <img src="/storage/profile_image/{{ $user->image }}" alt="" width="140px" height="140px"
                                     class="rounded-circle justify-content-center">
                            </a>
                        </p>
                        <h2 class="text-center">{{ $user->account_name }}</h2>
                        <p class="text-center">{{ $user->age }}歳</p>
                        <p class="text-center">{{ $user->pref->name }}</p>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <p class="text-center">{{ $users->links() }}</p>
        </div>
    </div>

@endsection
