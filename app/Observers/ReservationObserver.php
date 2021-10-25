<?php

namespace App\Observers;

use App\Jobs\DatabaseStateChanged;
use App\Models\Reservation;
use PhpParser\Node\Scalar\String_;

class ReservationObserver
{
    public $afterCommit = true;

    /**
     * Handle the Reservation "created" event.
     *
     * @param \App\Models\Reservation $reservation
     * @return void
     */
    public function created(Reservation $reservation)
    {
        DatabaseStateChanged::dispatch($reservation,'created',Reservation::class);

    }

    /**
     * Handle the Reservation "updated" event.
     *
     * @param \App\Models\Reservation $reservation
     * @return void
     */
    public function updated(Reservation $reservation)
    {
        DatabaseStateChanged::dispatch($reservation,'updated',Reservation::class);
    }

    /**
     * Handle the Reservation "deleted" event.
     *
     * @param \App\Models\Reservation $reservation
     * @return void
     */
    public function deleted(Reservation $reservation)
    {
        DatabaseStateChanged::dispatch($reservation,'deleted',Reservation::class);
    }

    /**
     * Handle the Reservation "restored" event.
     *
     * @param \App\Models\Reservation $reservation
     * @return void
     */
    public function restored(Reservation $reservation)
    {
        DatabaseStateChanged::dispatch($reservation,'restored',Reservation::class);;
    }

    /**
     * Handle the Reservation "force deleted" event.
     *
     * @param \App\Models\Reservation $reservation
     * @return void
     */
    public function forceDeleted(Reservation $reservation)
    {
        DatabaseStateChanged::dispatch($reservation,'forceDeleted',Reservation::class);
    }
}
