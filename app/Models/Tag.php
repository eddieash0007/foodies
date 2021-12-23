<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;

class Tag extends Model
{
    use HasFactory;

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    
    Protected $fillable = ['name'];
}
