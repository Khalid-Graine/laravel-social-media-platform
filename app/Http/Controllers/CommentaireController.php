<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Posts;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->input();
        Commentaire::create($data);

        $post = Posts::findOrFail($request->post_id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commentaire $commentaire, Request $request)
    {
        $commentaire->delete();
        return redirect()->route('home')->with('success', 'you have deleted a comment successfully');
    }
}
