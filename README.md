Facebook hybrid authentication demo
===================================

This simple PHP application shows how to use PHP SDK with JS SDK to provide simple user authentication for Facebook.

I am using the default PHP SDK provided from Facebook (as you can see in `composer.json`)

    {
        "require": {
            "facebook/php-sdk-v4" : "4.0.*"
        }
    }

Once downloaded the code, install vendors using composer

    $ php composer.phar install

Then configure a Facebook application copying the `settings.php.dist` file to `settings.php` filling `$appId` and `$appSecret` variables.

Finally, start a local PHP web server using PHP built-in webserver

    $ php -S 0.0.0.0:<port>

You can now visit your application and test Facebook authentication.

References
----------

- https://developers.facebook.com/docs/reference/php/4.0.0
- https://developers.facebook.com/docs/javascript
