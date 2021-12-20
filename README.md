# PyroCMS

PyroCMS is an easy to use, powerful, and modular CMS and development platform built with Laravel.

## Security

If you discover any security related issues, please email ryan@pyrocms.com instead of using the issue tracker.

## Requirements
1. PHP >= 7.4
2. See [Laravel 8.0 Requirements](https://laravel.com/docs/8.x/deployment#server-requirements)
3. Additional PHP Modules
  - gd

## Installation
1. clone this project `git clone https://github.com/wildanmaulanaa/TodosModule-pyrocms.git`
2. go to the project folder `cd <FOLDER NAME>`
3. run command `composer install`
4. copy file .env `cp .env.example .env`
5. setup your local .env file
6. run command `php artisan key:generate`
7. Dont forget to configure the SMTP
8. start the project `php artisan serve`

** if you got an error when migrating, please refer to this document https://pyrocms.com/forum/channels/streams-platform/error-when-migrating-to-production-class-anomalystreamsplatformmodelusersusersrolesentrymodel-not-found/ 

** If you still have an error when migration, kindly contact me wildaanmaulana@gmail.com and i'll give you the .sql file, and you shoud import it manually.

** if you got an error in user registration, please make sure that your SMTP is setup correctly.
## After Installation
1. Go to the admin page {base-url}/admin and login with your admin user
2. Focus on sidebar and then go to Page
3. Select "Welcome" and go to "Option"
4. Disable "Is this the homepage"
5. Disable "Display this page in navigation"

** Thank You :D