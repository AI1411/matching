<?php

namespace App\Http\Controllers;

use App\Region;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $authUser = Auth::user();
        $regions = Region::all();
        $usersAllCount = User::select('id')->where('gender', '!=', $authUser->gender)->count();
        $users = User::where('gender', '!=', $authUser->gender)->paginate(100);

        $requestAges = $request->input('age');
        $requestPref = $request->input('pref_id');
        $requestHobby1 = $request->input('hobby');
        $requestHobby2 = $request->input('hobby');
        $requestHobby3 = $request->input('hobby');


        if (isset($requestAges)) {
            $users = $users->where('age', $requestAges);
        }

        if (isset($requestPref)) {
            $users = $users->where('pref_id', $requestPref);
        }
        if (isset($requestHobby1)) {
            $users = $users->where('hobby_1', $requestHobby1);
        }
        if (isset($requestHobby2)) {
            $users = $users->where('hobby_2', $requestHobby2);
        }
        if (isset($requestHobby3)) {
            $users = $users->where('hobby_1', $requestHobby3);
        }
        dump($request);

        return view('search.search', compact('users', 'regions', 'usersAllCount', 'request'));
    }
}
