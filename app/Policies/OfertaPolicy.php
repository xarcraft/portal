<?php

namespace App\Policies;

use App\Models\Oferta;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OfertaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): void
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Oferta $oferta): void
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): void
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Oferta $oferta): bool
    {
        return $user->id === $oferta->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Oferta $oferta): bool
    {
        return $user->id === $oferta->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Oferta $oferta): void
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Oferta $oferta): void
    {
        //
    }
}
