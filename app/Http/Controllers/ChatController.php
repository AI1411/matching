<?php

namespace App\Http\Controllers;

use App\Chat;
use ChatEvent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $chats = Chat::all();
        return view('chats.index', compact('chats'));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request) : JsonResponse
    {
        $chat = new Chat($request->all());
        $chat->save();
        event(new ChatEvent($chat));

        return response()->json(['message' => '投稿しました。']);
    }
}
