<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class love extends Model
{
    use HasFactory;
    protected $table= 'loves';
    protected $fillable = ['profile_id', 'post_id', 'loves'];

    
     public function profile() {
        return $this->belongsTo(Profile::class, 'profile_id');
     }

     public function posts() {
        return $this->belongsTo(Posts::class, 'post_id');
     }

}
