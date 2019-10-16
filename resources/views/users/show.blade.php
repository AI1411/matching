@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                <div class="card">
                    <div class="card-header">{{ $user->account_name }}さんのプロフィール</div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center"><img src="/storage/profile_image/{{ $user->image }}" alt="" height="300px" width="500px"></li>
                            <li class="list-group-item">名前：　{{ $user->account_name }}</li>
                            <li class="list-group-item">年齢：　{{ $user->age }}</li>
                            <li class="list-group-item">地域：　{{ $user->pref->region->name }}</li>
                            <li class="list-group-item">都道府県：　{{ $user->pref->name }}</li>
                            <li class="list-group-item">自己紹介：　{{ $user->introduce }}</li>
                            <li class="list-group-item">趣味１：　{{ $user->hobby_1 }}</li>
                            <li class="list-group-item">趣味２：　{{ $user->hobby_2 }}</li>
                            <li class="list-group-item">趣味３：　{{ $user->hobby_3 }}</li>
                            <li class="list-group-item"><i class="fas fa-heart"></i>：　{{ $user->favorites_count }}</li>
                            <li class="list-group-item"><i class="far fa-thumbs-up"></i>：　{{ $user->likes_count }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
