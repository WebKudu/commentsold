# Coding Test for CommentSold

This repository is an example of a mini-web application.
Sumbitted for CommentSold's approval!

## Requirements
* Docker

## How to install
Clone this repository, cd into the directory
and type `docker-compose up -d`

This may take a few minutes the first time you run it.

Enter into the docker container `docker exec -it {$docker-id} bash`

`composer install`

`php artisan migrate`

`php artisan db:seed`

`npm install`

`npm run dev`

`cp .env.example .env`

At that point, open your browser to http://localhost:888 and you should see the app there.

## How to shut down
Type `exit` to leave the docker container.

`docker-compose down`
