<?php

namespace App\Policies;

use App\User;
use App\Dish;
use Illuminate\Auth\Access\HandlesAuthorization;

class DishPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the dish.
     *
     * @param  \App\User  $user
     * @param  \App\Dish  $dish
     * @return mixed
     */
    public function view(User $user, Dish $dish)
    {
        //
    }

    /**
     * Determine whether the user can create dishes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->admin == 1;
    }

    /**
     * Determine whether the user can update the dish.
     *
     * @param  \App\User  $user
     * @param  \App\Dish  $dish
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->admin == 1;
    }

    /**
     * Determine whether the user can delete the dish.
     *
     * @param  \App\User  $user
     * @param  \App\Dish  $dish
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->admin == 1;
    }
}
