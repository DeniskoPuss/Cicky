<?php

namespace App\Observers;

use App\Jobs\DatabaseStateChanged;
use App\Models\Review;

class ReviewObserver
{
    public $afterCommit = true;

    /**
     * @param Review $review
     *
     * @return void
     */
    public function created(Review $review)
    {
        DatabaseStateChanged::dispatch($review, 'created', Review::class);
    }

    /**
     * @param Review $review
     *
     * @return void
     */
    public function updating(Review $review)
    {
        DatabaseStateChanged::dispatch($review, 'updating', Review::class);
    }

    /**
     * @param Review $review
     *
     * @return void
     */
    public function deleting(Review $review)
    {
        DatabaseStateChanged::dispatch($review, 'deleting', Review::class);
    }

    /**
     * @param Review $review
     *
     * @return void
     */
    public function restored(Review $review)
    {
        DatabaseStateChanged::dispatch($review, 'restored', Review::class);
    }

    /**
     * @param Review $review
     *
     * @return void
     */
    public function forceDeleted(Review $review)
    {
        DatabaseStateChanged::dispatch($review, 'forceDeleted', Review::class);
    }
}
