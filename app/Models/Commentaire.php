<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $table = 'commentaire';
    protected $fillable = ['content', 'post_id', 'profile_id'];


    public function posts()
    {
        return $this->belongsTo(Posts::class, 'post_id');
    }
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }
}
