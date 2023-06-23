<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Profile;
use App\Mail\ProfileMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Client\Request as ClientRequest;

class homeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index(Request $request) {
        $x = $request->session()->get('x', 0) + 1;
        $request->session()->put('x', $x);
        $profiles = Profile::latest()->paginate(11);
        $posts = Posts::latest()->get();
        return view('home', compact('profiles', 'x', 'posts'));
    }


}
