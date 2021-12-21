<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    Protected $fillable = ['title','post','author','description','image','slug'];

    public function category()
    {
       return $this->belongsTo(Category::class,'category_id');
    }    
}
