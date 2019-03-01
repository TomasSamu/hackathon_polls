<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Option;

class Vote extends Model
{
    public function options()
    {
        return $this->belongsTo(Option::class);
    }
}
