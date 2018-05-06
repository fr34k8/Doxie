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
     * Return the instance of the facebook page
     *
     * @param string $uri
     * @return \App\Tools\FacebookScraper
     */
    public function getProfile(string $uri)
    {
        $goutteClient = new Client();
        $guzzleClient = new \GuzzleHttp\Client(array(
            'timeout' => 60,
            'verify' => false,
        ));

        $goutteClient->setClient($guzzleClient);

        $this->page = $goutteClient->request('GET', $uri);

        return $this;
    }

    /**
     * Return the facebook profile name
     *
     * return text
     */
    public function getName()
    {
        dump('scraping name');
        
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
        dump('scraping profile image');
        
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
        dump('scraping work');
        
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
        dump('scraping education');
        
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
        dump('scraping location');

        return $this->page->filter($this->selectors['location'])->each(function ($node) {
            $replace = ["Current city", "Home Town"];
            return str_replace($replace, "", $node->text());
        });
    }

    /**
     * Get their profile images
     *
     * @return uri
     */
    public function getImages()
    {
        dump('scraping images');
        
        return $this->page->filter($this->selectors['images'])->each(function ($node) {
            return $node->attr('src');
        });
    }
}