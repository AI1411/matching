<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::latest()->simplePaginate(99);
        return view('users.index', compact('users'));
    }
    public function show(User $user)
    {
        $prefs = config('const.pref');

        return view('users.show', compact('user', 'prefs'));
    }
}
