<?php

namespace App\Services;

use App\Entities\Pages;
use App\Entities\Person;
use App\Entities\Scraped;
use App\Services\Contracts\iMetricsService;

class MetricsService implements iMetricsService
{
    /**
     * Pages model
     *
     * @var Pages
     */
    protected $pages;
    
    /**
     * People model
     *
     * @var People
     */
    protected $people;
    
    /**
     * Scraped Model
     *
     * @var Scraped
     */
    protected $scraped;

    /**
     * Dashboard Constructor
     */
    public function __construct(Pages $pages, Person $people, Scraped $scraped)
    {
        $this->pages = $pages;

        $this->people = $people;

        $this->scraped = $scraped;
    }
    
    /**
    * Get the total scraped profiles
    *
    * @return int
    */
    public function totalPeople() : int
    {
        return $this->people->count();
    }

    /**
    * Get the total scraped pages
    *
    * @return int
    */
    public function totalPages() : int
    {
        return $this->pages->count();
    }

    /**
    * Get the total scraped links
    *
    * @return int
    */
    public function totalLinks() : int
    {
        return $this->scraped->count();
    }
}