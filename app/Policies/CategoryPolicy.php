<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['Admin', 'Editor']);
    }

    public function deleteAny(User $user): bool
    {
        return $user->hasRole('Admin');
    }

    public function delete(User $user, Category $category): bool
    {
        return $user->hasRole('Admin');
    }
}
