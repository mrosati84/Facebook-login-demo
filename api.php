<?php

require __DIR__.'/vendor/autoload.php';

use Facebook\FacebookJavaScriptLoginHelper;
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;

$appId = '1427319067570324';
$appSecret = '73e2686764a1fd0bf2b20a0632c222ef';

// setta l'applicazione facebook
FacebookSession::setDefaultApplication($appId, $appSecret);

// crea una sessione usando l'access token fornito dal SDK JS
try {
    $session = new FacebookSession(file_get_contents('php://input'));
} catch(\Exception $e) {
    echo "Exception occured, code: " . $e->getCode();
    echo " with message: " . $e->getMessage();
}

if ($session) {
    try {
        // recupera il nome dell'utente
        $user_profile = (new FacebookRequest(
            $session, 'GET', '/me'
        ))->execute()->getGraphObject(GraphUser::className());

        echo "Name: " . $user_profile->getName();
    } catch (\Exception $e) {
        echo "Exception occured, code: " . $e->getCode();
        echo " with message: " . $e->getMessage();
    }
}
