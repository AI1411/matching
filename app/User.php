<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;
use Symfony\Component\Console\Input\Input;
use function Composer\Autoload\includeFile;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pref()
    {
        return $this->belongsTo(Pref::class);
    }

    public function updateProfile($params)
    {
        if (isset($params['image'])) {
            $file_name = $params['image']->store('public/profile_image/');
            $this::where('id', $this->id)
                ->update([
                    'account_name' => $params['account_name'],
                    'age' => $params['age'],
                    'pref_id' => $params['pref_id'],
                    'gender' => $params['gender'],
                    'introduce' => $params['introduce'],
                    'hobby_1' => $params['hobby'][0],
                    'hobby_2' => $params['hobby'][1],
                    'hobby_3' => $params['hobby'][2],

                    'image' => basename($file_name),
                ]);
        } else {
            $this::where('id', $this->id)
                ->update([
                    'account_name' => $params['account_name'],
                    'age' => $params['age'],
                    'gender' => $params['gender'],
                    'pref_id' => $params['pref_id'],
                    'introduce' => $params['introduce'],
                    'hobby_1' => $params['hobby'][0],
                    'hobby_2' => $params['hobby'][1],
                    'hobby_3' => $params['hobby'][2],
                ]);
        }
        return;
    }

    public function scopeOtherGenderOfLoginUser($query)
    {
        if (auth()->user()->gender === 0) {
            return $query->where('gender', 1);
        } else {
            return $query->where('gender', 0);
        }
    }

    public function scopeSearchOfPref($query)
    {
        $searchOfPref = Request::input('searchPref');
        if ($searchOfPref) {
            return $query->where('pref_id', $searchOfPref);
        }
        return $query;
    }

    public function scopeSearchOfAge($query)
    {
        $searchOfAge = Request::input('searchAge');

        if ($searchOfAge) {
            return $query->where('age', $searchOfAge);
        }
        return $query;
    }

    public function scopeSortByLoginAtOrLatest($query)
    {
        $keyword = Request::input('sortByLoginAtOrLatest');

        if ($keyword == 1){
            return $query->orderBy('last_login_at', 'desc');
        }elseif ($keyword == 2){
            return $query->latest();
        }
        return $query;
    }
}
