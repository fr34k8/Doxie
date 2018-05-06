<?php

namespace App\Entities;

use App\Entities\Attributes\ScrapedAttributes;
use Illuminate\Database\Eloquent\Model;
use App\Entities\Scopes\ScrapedScopes;

class Scraped extends Model
{
    use ScrapedScopes, ScrapedAttributes;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'scraped';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uri',
    ];
    
}
