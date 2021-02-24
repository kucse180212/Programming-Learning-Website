<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class timer extends Model
{
    use HasFactory;
    public function questionaire()
    {
        return $this->belongsTo('App\Models\Questionaire');
    }
}
