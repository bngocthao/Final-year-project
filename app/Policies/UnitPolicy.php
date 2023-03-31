<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Unit;
use App\Models\User;

class UnitPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Unit $unit): Response
    {
        return $user->id === $unit->head_of_unit_id
                ? Response::allow()
                : Response::deny('You do not own this post.');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Unit $unit): bool
    {
        // admin, phòng đào tạo, trưởng unit
        if ($user->role_id == '1' || '2' || $unit->head_of_unit_id){
            return true;
        }
        else
            return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Unit $unit): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Unit $unit): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Unit $unit): bool
    {
        //
    }
}
