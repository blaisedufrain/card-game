# Card Game
###### by Blaise DuFrain

##### A few comments for whoever is looking at this.  

The code for that handles cards, shuffling, dealing, etc. is contained within the core/ directory in the project root.
  
I wanted to keep this code separate from any framework as it should really work in any php project, not just this one.  
In reality I likely would have created a separate composer package for this and required it as a dependency for the project, but I left them together to keep you from having to jump between repos.

I wanted to give you an actual interface to interact with the tool, so I created a pretty straightforward app to show it in use. I use [Laravel](https://laravel.com/ "Laravel Homepage") and [Vue.js](https://vuejs.org/) for this particular implementation. 

### Deployment

##### Option 1: (Assuming that you have php 7.2 and composer installed on your machine)

Run `php artisan serve`

This will start a webserver listening to port 8000. Confirm it is running by visiting http://127.0.0.1:8000

##### Option 2:
If you do not have php 7.2 installed you can use the docker option.

I rely on [Docker](https://docs.docker.com/install/#supported-platforms) and [Docker Compose](https://docs.docker.com/compose/install/) to simplify the deployment for you.  Please make sure you have both of these installed.

Clone the repository into your desired folder by calling `git clone git@github.com:blaisedufrain/card-game.git`

From within the project directory:

Run `cp .env.example .env`

Run `composer install`
 
Run `php artisan key:generate`

Run `docker-compose up -d`  
*If you have any port collisions, please adjust the ports as necessary in the docker-compose.yml in the project root.

Confirm the application is working by going to http://127.0.0.1:809


### Extensibility

If you don't like standard playing cards, you can add a variable to your .env file to change the deck used by the game.
CARD_DECK=Pinochle

You can add your own deck in the .core/CardDecks/ directory.  Make sure to follow the naming convention.  

### Tests

Unit tests are located within the ./core/test/ directory. The suite can be run from the project root with the following command. 

`./vendor/bin/phpunit`




