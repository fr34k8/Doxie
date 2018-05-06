<?php

namespace App\Entities\Attributes;

trait ScrapedAttributes
{
    /**
     * Check if we have scraped this uri before
     *
     * @param [type] $uri
     * @return boolean
     */
    public function hasScraped($uri)
    {
        return $this->uri($uri)->count() === 0;
    }
}