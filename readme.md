# Card Game
###### by Blaise DuFrain

##### A few comments for whoever is looking at this.  

The code for that handles cards, shuffling, dealing, etc. is contained within the core/ directory in the project root.
The Dealer.php file contains the two methods you have requested in the original assignment. 
  
I wanted to keep this code separate from any framework as it should really work in any php project, not just this one.  
I would have created a separate package for this and required it as a dependency for the project, but I left them together to keep you from having to jump between repos.

I wanted to give you an actual interface to interact with the tool, so I created a pretty straightforward app using [Laravel](https://laravel.com/ "Laravel Homepage") and [Vue.js](https://vuejs.org/). 

### Deployment

Clone the repository into your desired folder by calling `git clone git@github.com:blaisedufrain/card-game.git`

From within the project directory:

Run `cp .env.example .env`

##### Option 1: (Assuming that you have php 7.2 and composer installed on your machine)

Run `composer install`

Run `php artisan key:generate`

Run `php artisan serve`

This will start a webserver listening to port 8000. Confirm it is running by visiting http://127.0.0.1:8000

##### Option 2:

If you do not have php 7.2 installed you can use the docker option.  [Docker](https://docs.docker.com/install/#supported-platforms) and [Docker Compose](https://docs.docker.com/compose/install/) must both be installed.

Run `docker-compose up -d`  
*If you have any port collisions, please adjust the ports as necessary in the docker-compose.yml in the project root.

Run `docker-compose exec app composer install`
Run `docker-compose exec app  docker-compose exec app php artisan key:generate`

Confirm the application is working by going to http://127.0.0.1:809


### Extensibility

##### Card Decks
If you don't like standard playing cards, you can add a variable to your .env file to change the deck used by the game.

CARD_DECK=Pinochle

You can add your own deck in the .core/CardDecks/ directory.  Make sure to follow the naming convention.

##### Shuffler Algorithms
Additional shuffling algorithms can be added to the Shufflers directory.  
I implemented a "CutTheDeck" shuffler solely for demonstration.  To use this or another shuffler, add a variable to your .env as follows:

CARD_SHUFFLER=CutTheDeck

### Tests

Unit tests are located within the ./core/tests/ directory. The suite can be run from the project root with the following command. 

`./vendor/bin/phpunit`

or if you are using docker

`docker-compose exec app ./vendor/bin/phpunit` 




