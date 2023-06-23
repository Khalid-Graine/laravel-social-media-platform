<?php

namespace App\Http\Controllers;

use App\Models\love;
use App\Models\Posts;
use Illuminate\Http\Request;

class LovesController extends Controller
{
    public function store(Request $request)
    {
        $profileId = $request->profile_id;
        $postId = $request->post_id;

        $existingLike = Love::where('profile_id', $profileId)
            ->where('post_id', $postId)
            ->first();

        $post = Posts::findOrFail($postId);

        if ($existingLike) {
            $existingLike->delete();
            $post->decrement('likes');
            return redirect()->back();
        }


        Love::create([
            'loves' => $request->loves,
            'profile_id' => $profileId,
            'post_id' => $postId,
        ]);

        $post->increment('likes');

        return redirect()->route('home');
    }

}
