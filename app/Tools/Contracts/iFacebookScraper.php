<?php

namespace App\Tools\Contracts;

interface iFacebookScraper
{
    /**
     * Return the instance of the facebook page
     *
     * @param string $uri
     * @return \App\Tools\FacebookScraper
     */
    public function getProfile(string $uri);

    /**
     * Return the facebook profile name
     *
     * return text
     */
    public function getName();

    /**
     * Return the facebook profile image
     *
     * @return mixed
     */
    public function getProfileImage();

    /**
     * Get the profile's work
     *
     * @return mixed
     */
    public function getWork();

    /**
     * Get their education
     *
     * @return mixed
     */
    public function getEducation();

    /**
     * Get their location
     *
     * @return mixed
     */
    public function getLocation();

    /**
     * Get their profile images
     *
     * @return uri
     */
    public function getImages();

    /**
     * Get profile likes
     *
     * @return void
     */
    public function getLikes();
}