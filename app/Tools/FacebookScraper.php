<?php

namespace App\Tools;

use Goutte\Client;

class FacebookScraper
{
    /**
     * Cralwer instance 
     * 
     * @var \Goutte\Client
     */
    protected $crawler;

    /**
     * @var \Goutte\Crawler
     */
    protected $page;

    /**
     * Profile selectors
     *
     * @var array
     */
    protected $selectors = [
        'name'         => '._2nlw',
        'profileImage' => '._11kf',
        'work'         => '#pagelet_eduwork > div > div:nth-child(1) > ul > li',
        'education'    => '#pagelet_eduwork > div > div:nth-child(2) > ul > li',
        'location'     => '#pagelet_hometown > div > div > ul > li',
        'images'       => '._xcx > div > img'
    ];

    /**
     * Undocumented variable
     *
     * @var string
     */
    public $profile_uri = "https://www.facebook.com/profile.php?id=";

    /**
     * FacebookScraper constructor.
     *
     * @param \Goutte\Client $client
     */
    public function __construct()
    {
        if(!$this->crawler){

            $client = new \Goutte\Client();

            $guzzleClient = new \GuzzleHttp\Client(array(
                'timeout' => 90,
                'verify' => false,
            ));
    
            $this->crawler = $client->setClient($guzzleClient);
        }

        return $this->crawler;
    }   

    /**
     * Return the instance of the facebook page
     *
     * @param string $uri
     * @return \App\Tools\FacebookScraper
     */
    public function getProfile(string $uri)
    {
        $this->page = $this->crawler->request('GET', $uri);

        return $this;
    }

    /**
     * Return the facebook profile name
     *
     * return text
     */
    public function getName()
    {
        return $this->page->filter($this->selectors['name'])->each(function ($node) {
            return $node->text();
        });
    }

    /**
     * Return the facebook profile image
     *
     * @return mixed
     */
    public function getProfileImage()
    {
        return $this->page->filter($this->selectors['profileImage'])->each(function ($node) {
           return $node->attr('src');
        });
    }

    /**
     * Get the profile's work
     *
     * @return mixed
     */
    public function getWork()
    {
        return $this->page->filter($this->selectors['work'])->each(function ($node) {
            return $node->text();
        });
    }

    /**
     * Get their education
     *
     * @return mixed
     */
    public function getEducation()
    {
        return $this->page->filter($this->selectors['education'])->each(function ($node) {
            return $node->text();
        });
    }

    /**
     * Get their location
     *
     * @return mixed
     */
    public function getLocation()
    {
        return $this->page->filter($this->selectors['location'])->each(function ($node) {
            return $node->text();
        });
    }

    /**
     * Get their profile images
     *
     * @return uri
     */
    public function getImages()
    {
        return $this->page->filter($this->selectors['images'])->each(function ($node) {
            return $node->attr('src');
        });
    }
}