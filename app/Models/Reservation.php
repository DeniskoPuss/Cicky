<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperReservation
 */
class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'table_id',
        'people',
        'since'
    ];
}
