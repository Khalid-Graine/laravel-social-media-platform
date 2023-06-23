<?php

namespace App\Models;

use App\Models\Posts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Profile extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'bio',
        'password',
        'image',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];



    public function posts()
    {
        return $this->hasMany(Posts::class);
    }

    public function commentaire()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function loves()
    {
        return $this->hasMany(love::class, 'profile_id');
    }


    public function savedPosts()
    {
        return $this->belongsToMany(Posts::class, 'saved_posts', 'profile_id', 'post_id');
    }
}
