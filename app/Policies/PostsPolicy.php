<?php

namespace App\Policies;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\GenericUser;

class PostsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Posts $posts)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(GenericUser $user, Posts $posts)
    {
        return $user->id === $posts->profile_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(GenericUser $user, Posts $posts)
    {
        return $user->id === $posts->profile_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Posts $posts)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Posts $posts)
    {
        //
    }

}
