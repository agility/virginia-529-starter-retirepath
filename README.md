# Agility + Laravel

This is an example of how to use Agility CMS with Laravel.  This is the standard basic Laravel site with the Agility PHP SDK added on, as well as Agility Routing and Module.

## Running this site
- install npm dependancies `yarn install`
- install composer dependancies `composer update`
- start vite: `yarn dev`
- start the laravel server `php artisan serve`

## How it works

- The Agility Service at `app\Services\AgilityService.php` does all the heavy lifting and provides access to the Agility SDK

- The routing is done via the `app\routes\web.php` file and has a catch-all route to get the Agility Page object for that particular route.

- The `app\resources\views\agility.blade.php` is the main layout.  It loops all the zones and modules on Agility page object and dynamically includes the partial view for each module.

- The `app\resources\views\partial` folder has all of the views for each module, as well as the header and footer.


