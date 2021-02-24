<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questionaires_all extends Model
{
    use HasFactory;
    protected  $guarded =[];
   public function questions_all()
   {
       return $this->hasMany('App\Models\question_all');
   }
   public function timers_all()
   {
       return $this->hasmany('App\Models\timer_all');
   }
}
