# Coding Test for CommentSold

This repository is an example of a mini-web application.
Submitted for CommentSold's approval!

## Requirements
* Docker
* PHP >= 7.3
* Composer

## How to install
Clone this repository and cd into the directory

`composer install`

`cp .env.example .env`

`./vendor/bin/sail up -d`

This may take a few minutes the first time you run it.

Enter into the "sail-8.0/app" docker container:

`docker exec -it {$docker-id} bash`

`php artisan migrate`

`php artisan db:seed`

`npm install`

`npm run dev`


At that point, open your browser to http://localhost:888 and you should see the app there.

## How to shut down
Type `exit` to leave the docker container.

`./vendor/bin/sail down`
