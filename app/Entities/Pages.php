<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'uri'
    ];
    
    /**
     * Get the scraped.
     *
     * @return 
     */
    public function scraped()
    {
        return $this->morphMany('App\Entities\Scraped', 'owner');
    }

    /**
     * Get the likes
     *
     * @return Person
     */
    public function likes()
    {
        return $this->belongsToMany('App\Entities\Person')->withTimeStamps()->withPivot('id');
    }
    
}
