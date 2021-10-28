<?php

namespace App\Observers;

use App\Jobs\DatabaseStateChanged;
use App\Models\Reservation;
use PhpParser\Node\Scalar\String_;

class ReservationObserver
{
    public $afterCommit = true;

    /**
     * @param Reservation $reservation
     *
     * @return void
     */
    public function created(Reservation $reservation)
    {
        DatabaseStateChanged::dispatch($reservation, 'created', Reservation::class);
    }

    /**
     * @param Reservation $reservation
     *
     * @return void
     */
    public function updating(Reservation $reservation)
    {
        DatabaseStateChanged::dispatch($reservation, 'updating', Reservation::class);
    }

    /**
     * @param Reservation $reservation
     *
     * @return void
     */
    public function deleting(Reservation $reservation)
    {
        DatabaseStateChanged::dispatch($reservation->id, 'deleting', Reservation::class);
    }

    /**
     * @param Reservation $reservation
     *
     * @return void
     */
    public function restored(Reservation $reservation)
    {
        DatabaseStateChanged::dispatch($reservation, 'restored', Reservation::class);
    }

    /**
     * @param Reservation $reservation
     *
     * @return void
     */
    public function forceDeleted(Reservation $reservation)
    {
        DatabaseStateChanged::dispatch($reservation, 'forceDeleted', Reservation::class);
    }
}
