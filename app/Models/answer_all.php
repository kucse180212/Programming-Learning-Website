<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answer_all extends Model
{
    use HasFactory;
    protected  $guarded =[];

    public function question_all()
    {
        return $this->belongsTo('App\Models\question_all');
        
    
    }
}
