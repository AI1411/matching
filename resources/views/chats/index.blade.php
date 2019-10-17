@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <ul id="board">
                            @foreach($chats as $chat)
                                <li>{{ $chat->text }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="card-body">
                        <input type="text" id="text">
                        <input type="submit" value="送信" id="submit">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
