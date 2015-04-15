<?php

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/settings.php';

use Facebook\FacebookJavaScriptLoginHelper;
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;

// set Facebook application
FacebookSession::setDefaultApplication($appId, $appSecret);

// create session using access token provided by js SDK
try {
    $session = new FacebookSession(file_get_contents('php://input'));
} catch(\Exception $e) {
    echo "Exception occured, code: " . $e->getCode();
    echo " with message: " . $e->getMessage();
}

if ($session) {
    try {
        // get Facebook user name
        $user_profile = (new FacebookRequest(
            $session, 'GET', '/me'
        ))->execute()->getGraphObject(GraphUser::className());

        echo "Name: " . $user_profile->getName();
    } catch (\Exception $e) {
        echo "Exception occured, code: " . $e->getCode();
        echo " with message: " . $e->getMessage();
    }
}
