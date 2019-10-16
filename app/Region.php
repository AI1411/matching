<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function prefs()
    {
        return $this->hasMany(Pref::class);
    }
}
