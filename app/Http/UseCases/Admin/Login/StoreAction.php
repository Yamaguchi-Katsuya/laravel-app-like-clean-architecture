<?php

namespace App\Http\UseCases\Admin\Login;

use App\Models\User;

class StoreAction
{
    /**
     * @param User|null $user
     * @return bool
     */
    public function invoke(?User $user): bool
    {
        if ($user) {
            Auth::login($user);
            return true;
        }
        return false;
    }
}
