<?php

namespace App\Observers;

use App\Jobs\DatabaseStateChanged;
use App\Models\Reservation;
use App\Models\User;

class UserObserver
{
    public $afterCommit = true;

    /**
     * Handle the User "created" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function created(User $user)
    {
        DatabaseStateChanged::dispatch($user, 'created', User::class);
    }

    /**
     * Handle the User "updated" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function updated(User $user)
    {
        DatabaseStateChanged::dispatch($user, 'updated', User::class);
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function deleted(User $user)
    {
        DatabaseStateChanged::dispatch($user, 'deleted', User::class);
    }

    /**
     * Handle the User "restored" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function restored(User $user)
    {
        DatabaseStateChanged::dispatch($user, 'restored', User::class);
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        DatabaseStateChanged::dispatch($user, 'forceDeleted', User::class);
    }
}
