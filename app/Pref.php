<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pref extends Model
{
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
