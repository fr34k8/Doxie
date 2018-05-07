<?php

namespace App\Entities\Attributes;

trait UserAttributes 
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
}