<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Posts;
use App\Policies\PostsPolicy;
use Illuminate\Auth\GenericUser;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        Posts::class => PostsPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
        // Gate::define('update-posts', function(GenericUser $profile, Posts $post) {
        //     return $profile->id === $post->profile_id;
        // });
    }
}
