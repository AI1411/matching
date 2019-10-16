<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Pref;
use App\Region;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::otherGenderOfLoginUser()->searchOfPref()->searchOfAge()->simplePaginate(99);
        $regions = Region::all();
        $prefs = Pref::all();
        $totalUsers = User::otherGenderOfLoginUser()->searchOfPref()->searchOfAge()->get();
        return view('users.index', compact('users',
            'totalUsers',
            'regions',
            'prefs'
        ));
    }

    public function show(User $user)
    {
        $login_user = auth()->user();
        if ($login_user->points === 0){
            session()->flash('danger', 'ポイントがありません');
            return redirect()->route('users.index');
        }
        if ($login_user->points > 0) {
            $login_user->decrement('points');
        }
        return view('users.show', compact('user', 'login_user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->only([
            'name',
            'account_name',
            'image',
            'age',
            'gender',
            'pref_id',
            'introduce',
            'hobby_1',
            'hobby_2',
            'hobby_3',
        ]);

        $user->name = $request->input('name');
        $user->account_name = $request->input('account_name');
        $user->age = $request->input('age');
        $user->gender = $request->input('gender');
        $user->pref_id = $request->input('pref_id');
        $user->introduce = $request->input('introduce');
        $user->hobby_1 = $request->input('hobby_1');
        $user->hobby_2 = $request->input('hobby_2');
        $user->hobby_3 = $request->input('hobby_3');

        $user->updateProfile($data);

        session()->flash('success', 'プロフィールが更新されました。');

        return redirect()->route('users.show', $user->id);
    }
}
