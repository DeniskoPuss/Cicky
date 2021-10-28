<?php

namespace App\Jobs;

use App\Models\Reservation;
use App\Models\Review;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class DatabaseStateChanged implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $model;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int|User|Reservation|Review $model, private string $event, private string $model_name)
    {
        $this->model = $model;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->event === 'created') {
            if ($this->model_name === Reservation::class) {
                DB::transaction(function () {
                    foreach (Config::get('database.sync') as $connection) {
                        DB::connection($connection)
                            ->table('reservations')
                            ->insert([
                                'table_id' => $this->model->table_id,
                                'user_id' => $this->model->user_id,
                                'people' => $this->model->people,
                                'since' => Carbon::make($this->model->since)->format('Y-m-d H:i:s'),
                                'created_at' => Carbon::make($this->model->created_at)->format('Y-m-d H:i:s'),
                                'updated_at' => Carbon::make($this->model->updated_at)->format('Y-m-d H:i:s'),
                            ]);
                    }
                });
            }
        }
        if ($this->event === 'deleting') {
            if ($this->model_name === Reservation::class) {
                DB::transaction(function () {
                    foreach (Config::get('database.sync') as $connection) {
                        DB::connection($connection)
                            ->table('reservations')
                            ->where('id', $this->model)
                            ->delete();
                    }
                });
            }
        }
    }
}
