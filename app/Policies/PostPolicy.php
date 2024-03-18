<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['Admin', 'Editor', 'Author'])
                || $user->hasPermission('view posts');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        return $user->hasAnyRole(['Admin', 'Editor'])
            || $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole(['Admin', 'Editor', 'Author'])
            || $user->hasPermission('create posts');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        return $user->hasAnyRole(['Admin', 'Editor'])
            || $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        return $user->hasAnyRole(['Admin', 'Editor'])
            || $user->id === $post->user_id;
    }

    public function deleteAny(User $user): bool
    {
        return $user->hasAnyRole(['Admin']);
    }
}
