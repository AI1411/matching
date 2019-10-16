@extends('layouts.app')

@section('content')
    @if(auth()->user()->id === $user->id)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 mt-3">
                    @include('layouts.message')
                    <div class="card">
                        <div class="card-header">{{ $user->account_name }}さんのプロフィール</div>
                        <form action="{{ url('users/'.$user->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group text-center">
                                    <img class="mb-3" src="/storage/profile_image/{{ $user->image }}" alt="" width="70%"
                                         height="100%">
                                    <input type="file" name="image" class="form-control" value="{{ $user->image }}">
                                </div>
                                <div class="form-group">
                                    <label for="">アカウント名: </label>
                                    <input type="text" name="account_name" value="{{ $user->account_name }}"
                                           class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="age">年齢: </label>
                                    <select name="age" id="">
                                        @foreach(config('const.ages') as $key => $age)
                                            <option value="{{ $key }}"
                                                    name="age">{{ config('const.ages')[$key]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gender">性別: </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="0">
                                        <label class="form-check-label" for="inlineRadio1">男性</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="1">
                                        <label class="form-check-label" for="inlineRadio2">女性</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">都道府県: </label><br>
                                    <select name="pref_id" id="">
                                        @foreach(config('const.pref') as $key => $pref)
                                            <option name="pref_id" value="{{ $key }}">{{ $pref }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">自己紹介: </label>
                                    <textarea name="introduce" id="" class="form-control"
                                              rows="5">{{ $user->introduce }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">趣味1: </label>
                                    <input type="text" class="form-control" name="hobby_1" value="{{ $user->hobby_1 }}">
                                </div>
                                <div class="form-group">
                                    <label for="">趣味2: </label>
                                    <input type="text" class="form-control" name="hobby_2" value="{{ $user->hobby_2 }}">
                                </div>
                                <div class="form-group">
                                    <label for="">趣味3: </label>
                                    <input type="text" class="form-control" name="hobby_3" value="{{ $user->hobby_3 }}">
                                </div>
                                <button class="btn btn-primary text-center" type="submit">更新</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
