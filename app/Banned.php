<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banned extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'equipment'
    ];

    public function equipment()
    {
        return $this->hasOne(Equipment::class);
    }
}
