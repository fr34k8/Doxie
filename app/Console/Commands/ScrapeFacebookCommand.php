<?php

namespace App\Console\Commands;

use App\Entities\Person;
use App\Entities\Scraped;
use App\Tools\FacebookScraper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

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
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(FacebookScraper $scraper, Person $person, Scraped $scraped)
    {
        $this->person = $person;  

        $this->scraped = $scraped;  

        $this->scraper = $scraper;  

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
            $profile_uri = $this->scraper->profile_uri . $i;
            
            // Check if they have scraped this uri before
            if($this->scraped->hasScraped($profile_uri)){
            
                // Get the profile page
                $profile = $this->scraper->getProfile($profile_uri);

                // Save the profile
                if(!empty($this->profileInformation($profile)['name'])) {
                   
                    $created = $this->person->create($this->profileInformation($profile));
                   
                   if($created){
                        // Save the images
                        foreach($profile->getImages() as $key => $image){
                            $contents = file_get_contents($image);
                            Storage::put("profile/{$created->id}/{$key}.jpg", $contents);
                        }

                        $created->scraped()->save(new $this->scraped(['uri' => $profile_uri]));
                    } else {
                        $this->scraped(['uri' => $profile_uri]);
                    }
                }

                // Save the scraped uri so we don't run it again
            }
        }
    }
}
