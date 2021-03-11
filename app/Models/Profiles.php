<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function user()
    {   
        return $this->belongsTo(Members::class, 'userId');
    }
}
