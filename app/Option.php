<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
use App\Vote;

class Option extends Model
{
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

}
