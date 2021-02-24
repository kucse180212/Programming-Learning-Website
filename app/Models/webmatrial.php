<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class webmatrial extends Model
{
    use HasFactory;
    protected $fillable =[ 'document','video'];
    use HasFactory;

    public function questionaire()
    {
        return $this->belongsTo('App\Models\Questionaire');
    }
}
