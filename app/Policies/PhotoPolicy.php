<?php

namespace App\Policies;

use App\Photo;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhotoPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the given photo can be edit by the user.
     *
     * @param \App\User $user
     * @param \App\Photo $photo
     */
    public function edit(User $user, Photo $photo)
    {
        return $user->id === $photo->author_id;
    }

    /**
     * Determine if the given photo can be update by the user.
     *
     * @param \App\User $user
     * @param \App\Photo $photo
     */
    public function update(User $user, Photo $photo)
    {
        return $user->id === $photo->author_id;
    }

    /**
     * Determine if the given photo can be deleted by the user.
     *
     * @param \App\User $user
     * @param \App\Photo $photo
     */
    public function destroy(User $user, Photo $photo)
    {
        return $user->id === $photo->author_id;
    }
}
