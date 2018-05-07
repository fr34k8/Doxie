<?php

namespace App\Console\Commands;

use App\Entities\Person;
use App\Entities\Scraped;
use App\Tools\FacebookScraper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Entities\Pages;

class ScrapeFacebookCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'doxie:scrape-facebook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape Facebook profiles';

    /**
     * Return the model
     *
     * @var Person
     */
    protected $person;

    /**
     * Return the model
     *
     * @var Scraped
     */
    protected $scraped;

    /**
     * Return the model
     *
     * @var Scraper
     */
    protected $scraper;

    /**
     * Return the model
     *
     * @var Pages
     */
    protected $pages;

    /**
     * Profile uri
     *
     * @var [type]
     */
    protected $uri;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(FacebookScraper $scraper, Person $person, Scraped $scraped, Pages $pages)
    {
        $this->person = $person;  

        $this->scraped = $scraped;  

        $this->scraper = $scraper;  

        $this->pages = $pages;  

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->scrapeFacebook();
    }

    /**
     * Scrape facebook profiles
     *
     * @param FacebookScraper $scraper
     * @return void
     */
    public function scrapeFacebook()
    {
        for($i = 4; $i < 200; $i++){

            // The profile uri
            $this->uri = $this->scraper->profile_uri . $i;
            
            // Run when it's not been scraped
            $this->notScraped(function(){

                // Get the profile page
                $profile = $this
                    ->scraper
                    ->getProfile($this->uri);

                // Save the profile
                if(!empty($this->profileInformation($profile)['name'])) {
                   
                    // Create a person
                    $created = $this
                        ->person
                        ->create($this->profileInformation($profile));

                    // create a page and add it to the scraped
                    foreach($profile->getLikes() as $page) {
                        
                        $pageCreated = $this->pages->firstOrCreate([
                            'name' => $page['name'],
                            'uri'  => $page['uri']
                        ]);

                        // Assign the like to the profile....
                        $pageCreated->likes()->save($created);

                        $pageCreated->scraped()->save(new $this->scraped(['uri' => $page['uri']]));

                    }
                          
                    
                   if($created){                        
                        // Save the images
                        // foreach($profile->getImages() as $key => $image){
                        //     $contents = file_get_contents($image);
                        //     Storage::put("profile/{$created->id}/{$key}.jpg", $contents);
                        // }
                        $created->scraped()->save(new $this->scraped(['uri' => $this->uri]));

                    } else {
                        $this->scraped(['uri' => $this->uri]);
                    }
                } 
            });
        }
    }

    /**
     * Run when it's not been scraped
     *
     * @param callable $callable
     * @return void
     */
    public function notScraped(callable $callable)
    {
        if($this->scraped->hasScraped($this->uri) && is_callable($callable)) {
            call_user_func($callable);
        }
    }

    /**
     * Return an array of information to store
     *
     * @return array
     */
    public function profileInformation($profile) : array
    {
        return [
            'name'      => $profile->getName()[0] ?? null,
            'work'      => $profile->getWork(),
            'education' => $profile->getEducation(),
            'location'  => $profile->getLocation(),
        ];
    }
}
