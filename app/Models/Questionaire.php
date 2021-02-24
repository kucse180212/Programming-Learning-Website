<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questionaire extends Model
{
    use HasFactory;
     protected  $guarded =[];
    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }
    public function documents()
    {
        return $this->hasmany('App\Models\webmatrial');
    }
    public function timers()
    {
        return $this->hasmany('App\Models\timer');
    }
}
