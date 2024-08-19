<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isEditor();
    }

    public function view(User $user, Category $category): bool
    {
        return $user->isAdmin() || $user->isEditor();
    }

    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isEditor();
    }

    public function update(User $user, Category $category): bool
    {
        return $user->isAdmin() || $user->isEditor();
    }

    public function delete(User $user, Category $category): bool
    {
        return $user->isAdmin();
    }
    public function deleteAny(User $user): bool
    {
        return $user->isAdmin();
    }

    public function restore(User $user, Category $category): bool
    {
        return $user->isAdmin();
    }
    public function restoreAny(User $user): bool
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, Category $category): bool
    {
        return $user->isAdmin();
    }
    public function forceDeleteAny(User $user): bool
    {
        return $user->isAdmin();
    }
}
