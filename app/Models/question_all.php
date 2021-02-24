<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question_all extends Model
{
    use HasFactory;
    public function answers_all()
    {
        return $this->hasMany('App\Models\answer_all');
    }

    public function questionaire_all()
    {
        return $this->belongsTo('App\Models\questionaires_all');
    }
}
