# Image gallery

This is a simple image gallery using Laravel Framework.

Image gallery consists of three pages:
1. Home page.
2. Gallery page.
3. Upload images page.

----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.8/installation#installation)

Clone the repository

    git clone git@github.com:AndriiZabudskyi/ImageGallery.git

Switch to the repo folder

    cd ImageGallery

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Create a symbolic link from "public/storage" to "storage/app/public"
    
    php artisan storage:link
    
Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone git@github.com:gothinkster/laravel-realworld-example-app.git
    cd laravel-realworld-example-app
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve

----------

# Code overview

## Folders

- `app` - Contains all the Eloquent models
- `app/Repositories/Interfaces` - Contains all repositories interfaces
- `app/Repositories` - Contains all repositories
- `app/Services/Interfaces` - Contains all services interfaces
- `app/Services` - Contains all services
- `app/Http/Controllers` - Contains all the controllers
- `app/Http/Requests` - Contains all the form requests
- `config` - Contains all the application configuration files
- `database/factories` - Contains the model factory for all the models
- `database/migrations` - Contains all the database migrations
- `public/css` - Contains all application css files
- `public/js` - Contains all application javascript files
- `resoutsces/views` - Contains all application views
- `routes` - Contains all the web routes defined in web.php file

## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------
 