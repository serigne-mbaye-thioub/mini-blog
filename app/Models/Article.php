<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
 
    protected $fillable = ['titre', 'contenu', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}