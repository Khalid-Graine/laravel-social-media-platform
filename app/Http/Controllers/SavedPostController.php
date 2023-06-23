<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Profile;
use App\Models\SavedPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SavedPostController extends Controller
{
    public function index()
    {
        $profileId = Auth::user()->id;
        $profile = Profile::findOrFail($profileId);
        $posts = $profile->savedposts;
        return view('posts.saved_posts.index', compact('posts'));
    }





    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'profile_id' => 'required',
            'post_id' => 'required',
        ]);

        $profile_id = $validatedData['profile_id'];
        $post_id = $validatedData['post_id'];

        $post = Posts::findOrFail($post_id);

        DB::transaction(
            function () use ($profile_id, $post_id, $post) {
                $isPostExist = SavedPost::where('profile_id', $profile_id)
                    ->where('post_id', $post_id)
                    ->first();

                if ($isPostExist === null) {
                    SavedPost::create([
                        "profile_id" => $profile_id,
                        'post_id' => $post_id,
                    ]);
                    $post->increment('saves');

                } else {
                    $isPostExist->delete();
                    $post->decrement('saves');
                }
            }
        );

        return back(); // Redirect back to the previous page
    }
}
