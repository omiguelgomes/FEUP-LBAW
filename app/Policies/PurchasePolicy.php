<?php

namespace App\Policies;

use App\User;
use App\Purchase;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class PurchasePolicy
 {
    use HandlesAuthorization;

    public function create(User $user)
    {
      // Any authenticated user can create a new purchase
      return Auth::check();
    }

 }