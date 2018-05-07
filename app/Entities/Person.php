<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Attributes\PersonAttributes;

class Person extends Model
{
    use PersonAttributes;

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
    
    /**
     * Get the scraped.
     *
     * @return Scraped
     */
    public function scraped()
    {
        return $this->morphOne('App\Entities\Scraped', 'owner');
    }
    
    /**
     * Get the user's liked pages
     *
     * @return Pages
     */
    public function pages() 
    {
        return $this->belongsToMany('App\Entities\Pages')->withTimeStamps();
    }
}
