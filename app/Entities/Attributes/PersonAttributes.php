<?php

namespace App\Entities\Attributes;

trait PersonAttributes 
{
    /**
     * Get the persons profile image
     *
     * @return void
     */
    public function getProfilePictureAttribute()
    {
        return 'https://www.ankarsrum.com/wp-content/uploads/2018/01/no-image-icon-.png';
    }

    /**
     * Get their current city
     *
     * @return string
     */
    public function getCityAttribute()
    {
        return $tis->location[0] ?? 'N/A';
    }
}