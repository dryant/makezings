<?php

namespace App\Policies;

use App\Models\User;

class ProfilePolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasRole('Admin');
    }
}
