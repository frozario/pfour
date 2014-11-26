## Description:
A Laravel web application which allows users to manage their own personal cookbook.  Users can add new juice recipes and look for ones they've added before.  

This application demonstrates knowledge of the Laravel framework, the MVC pattern, Object-relational mapping with Eloquent, database migrations, & user authentication.

## How to access the application:
Sign up with a unique email address

OR 

Check out the application using either of the following credentials:



## Design:

### Requirements:

* Users can sign up & login
* Users can create, read, update, & delete concoctions
* Users can upload photos of concoctions
* Users can add (from a set of predefined) tags to concoctions
* Users can search their recipes
* Users should not be able to view, edit, or delete other users' Concoction Keepers.

Link:
https://p4.dwa15-frozario.me

## License details:
* This project uses the Twitter Bootstrap framework: http://getbootstrap.com/.  Bootstrap license included in this repository.
* This project uses the laravel/framework & the paste/pre packages.  These can be found here: https://packagist.org/

## Future Plans
### Bug Fixes / Tasks
Add more user validation using Laravel's built-in Validation helper:
* Maximum number of characters for text input (currently breaks the app)
* Sign up email/password requirements
* Photo upload maximum size

Move controller logic from routes to separate controller files

Isolate common functionalities duplicated in the code & put into helper functions

Make list of concoctions on /overview page collapsible

### Features
* Users can export recipes or the entire cookbook
* Users can add friends in app and view friends cookbooks
* Users can give copies of recipes to friends and those friends can accept
* Users can plan when to cook recipes on a calendar
