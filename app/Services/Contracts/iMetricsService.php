<?php

namespace App\Services\Contracts;

interface iMetricsService
{    
    /**
    * Get the total scraped profiles
    *
    * @return int
    */
    public function totalPeople() : int;

    /**
    * Get the total scraped pages
    *
    * @return int
    */
    public function totalPages() : int;

    /**
    * Get the total scraped links
    *
    * @return int
    */
    public function totalLinks() : int;
}