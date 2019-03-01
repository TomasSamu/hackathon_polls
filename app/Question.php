<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Option;
use App\User;

class Question extends Model
{
    //
    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
