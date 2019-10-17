<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Pref;
use App\Region;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::otherGenderOfLoginUser()
            ->searchOfPref()
            ->searchOfAge()
            ->sortByLoginAtOrLatest()
            ->searchAccountName()
            ->sortByLikesOrFavoriteCount()
//            ->searchOfRegion()
            ->simplePaginate(99);
        $regions = Region::all();
        $prefs = Pref::all();
        $totalUsers = User::otherGenderOfLoginUser()
            ->searchOfPref()
            ->searchOfAge()
            ->sortByLoginAtOrLatest()
            ->searchAccountName()
            ->sortByLikesOrFavoriteCount()
//            ->searchOfRegion()
            ->get();
        return view('users.index', compact('users',
            'totalUsers',
            'regions',
            'prefs'
        ));
    }

    public function show(User $user, Request $request)
    {
        $login_user = auth()->user();

        $login_user->followUser($user);
        $login_user->likeUser($user);
        $login_user->favoriteUser($user);

        if ($login_user->points == 0){
            session()->flash('danger', 'ポイントがありません');
            return redirect()->route('users.index');
        }
        if ($login_user->points > 0) {
            if ($login_user->gender == 0){
                $login_user->decrement('points');
            }
        }
        return view('users.show', compact('user', 'login_user', 'doFollow'));
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
            'hobby'
        ]);

        $user->name = $request->input('name');
        $user->account_name = $request->input('account_name');
        $user->age = $request->input('age');
        $user->gender = $request->input('gender');
        $user->pref_id = $request->input('pref_id');
        $user->introduce = $request->input('introduce');
        $user->hobby_1 = $request->merge(['hobby_1' => $data['hobby'][0]]);
        $user->hobby_2 = $request->merge(['hobby_2' => $data['hobby'][1]]);
        $user->hobby_3 = $request->merge(['hobby_3' => $data['hobby'][2]]);

        $user->updateProfile($data);

        session()->flash('success', 'プロフィールが更新されました。');

        return redirect()->route('users.show', $user->id);
    }
}
