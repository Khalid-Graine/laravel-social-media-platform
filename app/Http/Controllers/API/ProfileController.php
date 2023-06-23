<?php

namespace App\Http\Controllers\API;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use App\Http\Resources\ProfileResource;

class ProfileController extends Controller
{
    private const Cache_key = 'profile_api';
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        dd(DB::table('profiles')->select(['id', 'name', 'email'])->where('id', '<', 5)->get());
        $profiles = Cache::remember(self::Cache_key, 14400, function () {
            return Profile::all();
        });

        return $profiles;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->all();
        $formFields['password'] = Hash::make($formFields['password']);
        Cache::forget(self::Cache_key);
        $profile = Profile::create($formFields);
        return new ProfileResource($profile);
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return new ProfileResource($profile);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        $formFields = $request->all();
        $formFields['password'] = Hash::make($request->password);
        $profile->fill($formFields)->save();
        Cache::forget(self::Cache_key);
        return new ProfileResource($profile);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        Cache::forget(self::Cache_key);
    }
}
