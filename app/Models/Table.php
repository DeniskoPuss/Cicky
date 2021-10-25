<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperTable
 */
class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'people',
        'name'
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
