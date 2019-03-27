<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'equipment','start','end'
    ];

    public function equipment()
    {
        return $this->hasOne(Equipment::class);
    }
}
