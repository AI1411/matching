<?php

namespace App\Http\Controllers;

use App\Region;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index(Request $request, User $user)
    {
        $authUser = Auth::user();
        $regions = Region::all();
        $usersAllCount = User::select('id')->where('gender', '!=', $authUser->gender)->count();
        $users = User::where('gender', '!=', $authUser->gender);

        foreach ($request->only(['age', 'pref_id']) as $key => $value) {
            $users = $users->where($key, $value);
        }

        $users = $users->simplePaginate(100);
//        if (isset($requestHobby)) {
//            $users = $users->where('hobby_1', $requestHobby);
//        }
//        if (isset($requestHobby2)) {
//            $users = $users->where('hobby_2', $requestHobby2);
//        }
//        if (isset($requestHobby3)) {
//            $users = $users->where('hobby_1', $requestHobby3);
//        }
        return view('search.search', compact('users', 'regions', 'usersAllCount', 'request'));
    }
}
