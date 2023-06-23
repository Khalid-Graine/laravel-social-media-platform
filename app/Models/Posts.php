<?php

namespace App\Models;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Posts extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'content',
        'image',
        'likes',
        'profile_id'
    ];


    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }


    public function commentaire()
    {
        return $this->hasMany(Commentaire::class, 'post_id');
    }


    public function loves()
    {
        return $this->hasMany(love::class, 'post_id');
    }


    public function isLikedByUser($profileId)
    {
        return $this->loves()->where('profile_id', $profileId)->exists();
    }



    public function isSavedByUser($profileId)
    {
        return $this->savedByProfiles()->where('profile_id', $profileId)->exists();
    }

    public function savedByProfiles()
    {
        return $this->belongsToMany(Profile::class, 'saved_posts', 'post_id', 'profile_id');
    }

}
