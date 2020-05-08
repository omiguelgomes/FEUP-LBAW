<?php

namespace App\Policies;

use App\User;
use App\Product;

use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ProductPolicy
{
  use HandlesAuthorization;

  public function createRating(User $user)
  {
    // Any authenticated user can create a new purchase
    return print_r($user->purchases);
  }
}
