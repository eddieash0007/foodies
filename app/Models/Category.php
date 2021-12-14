<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    Protected $fillable = ['name','description','image','slug'];

}
