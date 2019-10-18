<?php

namespace App;

use Overtrue\LaravelFollow\Traits\CanFollow;
use Overtrue\LaravelFollow\Traits\CanLike;
use Overtrue\LaravelFollow\Traits\CanFavorite;
use Overtrue\LaravelFollow\Traits\CanSubscribe;
use Overtrue\LaravelFollow\Traits\CanVote;
use Overtrue\LaravelFollow\Traits\CanBookmark;
use Overtrue\LaravelFollow\Traits\CanBeLiked;
use Overtrue\LaravelFollow\Traits\CanBeFavorited;
use Overtrue\LaravelFollow\Traits\CanBeVoted;
use Overtrue\LaravelFollow\Traits\CanBeBookmarked;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;
use Symfony\Component\Console\Input\Input;
use function Composer\Autoload\includeFile;

class User extends Authenticatable
{
    use Notifiable;
    use CanFollow, CanBookmark, CanLike, CanFavorite, CanSubscribe, CanVote;
    use CanBeLiked, CanBeFavorited, CanBeVoted, CanBeBookmarked;

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
        if (auth()->user()->gender == 0) {
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

    public function scopeSearchAccountName($query)
    {
        $searchKeyword = Request::input('searchAccountName');

        if ($searchKeyword){
            return $query->where('account_name', 'LIKE', "%{$searchKeyword}%");
        }
        return $query;
    }

    public function scopeSortByLikesOrFavoriteCount($query)
    {
        if (Request::input('sortByLikesOrFavorite') == 'sortByLikes'){
            return $query->orderBy('likes_count', 'desc');
        }elseif (Request::input('sortByLikesOrFavorite') == 'sortByFavorites'){
            return $query->orderBy('favorites_count', 'desc');
        }
        return $query;
    }

    public function scopeMatching($query, $search_target, $search_items)
    {
        $matching_data = $query->where(function ($query) use ($search_target, $search_items) {
            $query->where($search_target, $search_items[0]);
            for ($i = 1; $i < count($search_items); $i++) {
                $query->orWhere($search_target, $search_items[$i]);
            }
        });
        return $matching_data;
    }

    public function followUser(User $user)
    {
        $login_user = auth()->user();

        if (Request::input('follow') == 'follow'){
            $login_user->follow($user);
        }
        if (Request::input('follow') == 'unfollow'){
            $login_user->unfollow($user);
        }
    }

    public function likeUser(User $user)
    {
        $login_user = auth()->user();

        if (Request::input('like') == 'like'){
            $login_user->like($user);
            $user->increment('likes_count');
        }
        if (Request::input('like') == 'unlike'){
            $login_user->unlike($user);
            $user->decrement('likes_count');
        }
    }

    public function favoriteUser(User $user)
    {
        $login_user = auth()->user();

        if (Request::input('favorite') == 'favorite'){
            $login_user->favorite($user);
            $user->increment('favorites_count');
        }
        if (Request::input('favorite') == 'unfavorite'){
            $login_user->unfavorite($user);
            $user->decrement('favorites_count');
        }
    }

    public function setRegionIdAttribute(User $user)
    {
        $this->attributes['region_id'] = $user->pref->region->id;
    }
}
