<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Profile;
use App\Mail\ProfileMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ProfileRequest;
use App\Mail\signUp;
use App\View\Components\alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;

class profileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('verifyemail','create','store');
    }

    public function index()
    {

        $profiles = Cache::remember('profiles', 30, function () {
            return  Profile::all();
        });

        return redirect()->route('home');
    }

    public function show(string $id)
    {
        $cacheKey = 'profile_' . $id;

        $profile = Cache::remember($cacheKey, 30, function () use ($id) {
            return Profile::findOrFail($id);
        });

        return view('profiles.show', compact('profile'));
    }


    public function create()
    {
        return view('profiles.create');
    }


    public function store(ProfileRequest $request)
    {
        $mydata = $request->validated();

        $fileName = $request->file('image')->store('profile', 'public');
        $mydata['image'] = $fileName;
        $mydata['password'] = Hash::make($mydata['password']);
        $profile = Profile::create($mydata);


        Mail::to($mydata['email'])->send(new ProfileMail($profile));

        return redirect()->route('home')->with('success', 'We have sent you a verification link to your email. Please click on it to validate your account.');

    }

    public function verifyemail(Request $request, string $hash)
    {
        // Decode the hash and extract the created_at and id values
        [$created_at, $id] = explode('///', base64_decode($hash));

        // Find the profile with the given id
        $profile = Profile::findOrFail($id);

        // Check if the created_at value from the profile matches the provided created_at value
        if ($profile->created_at->toDateTimeString() !== $created_at) {
            abort('403');
        }

        // Check if the profile's email has already been verified
        if ($profile->email_verified_at !== null) {
            return response('account already verified');
        }

        // Set the email_verified_at column to the current datetime and save the profile
        $profile->fill([
            'email_verified_at' => Carbon::now()
        ])->save();

        // Attempt to authenticate the user
        if (Auth::loginUsingId($profile->id)) {
            // Regenerate the session and redirect to the home page with a success message
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'You have logged in successfully.');
        } else {
            // Return to the previous page with an error message indicating an authentication failure
            return back()->withErrors([
                'email' => 'Your email or password is incorrect.',
            ])->onlyInput('email');
        }
    }




    public function destroy(Profile $profile)
    {
        $profile->delete();

        return redirect()->route('home')->with('success', 'You have deleted a profile successfully');
    }


    public function edit(Profile $profile)
{
    if($profile->id === Auth::user()->id) {
        return view('profiles.edit', compact('profile'));
    } else {
        abort(404);
    }
}



public function update(ProfileRequest $request, Profile $profile)
{
    // dd($request);
    $data = $request->validated();

    if ($request->hasFile('image')) {
        $fileName = $request->file('image')->store('profile', 'public');
        $data['image'] = $fileName;
    }

    if ($request->filled('password')) {
        $data['password'] = Hash::make($data['password']);
    } else {
        unset($data['password']); // Remove the password field from the update if it's not provided
    }

    $profile->update($data);

    return redirect()->route('home')->with('success', 'You have updated a profile successfully.');
}

}
