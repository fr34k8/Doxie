<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'people';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'work',
        'education',
        'location',
    ];

    /**
     * Cast the row to a datatype.
     */
    protected $casts = [
        'work'      => 'array',
        'education' => 'array',
        'location'  => 'array',
    ];
    
}
