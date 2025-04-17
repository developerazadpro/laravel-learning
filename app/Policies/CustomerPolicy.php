<?php

namespace App\Policies;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class CustomerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Customer $customer)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->is_admin;
        /* for role based user like role_id => 1 = admin, role_id => 2 = Editor, role_id => 3 = Normal User*/
        //return $user->role_id == 1 | $user->role_id == 2;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Customer $customer)
    {
        /* for role based user like role_id => 1 = admin, role_id => 2 = Editor, role_id => 3 = Normal User*/
        //return $user->role_id == 1 | $user->role_id == 2;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Customer $customer)
    {
        /* for role based user like role_id => 1 = admin, role_id => 2 = Editor, role_id => 3 = Normal User*/
        //return $user->role_id == 1;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Customer $customer)
    {
        /* for role based user like role_id => 1 = admin, role_id => 2 = Editor, role_id => 3 = Normal User*/
        //return $user->role_id == 1;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Customer $customer)
    {
        /* for role based user like role_id => 1 = admin, role_id => 2 = Editor, role_id => 3 = Normal User*/
        //return $user->role_id == 1;
    }
}
