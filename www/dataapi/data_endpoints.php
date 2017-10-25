<?php

use LearnositySdk\Request\DataApi;
use LearnositySdk\Request\Init;

function getActivitiesByActivityID($activity_name)
{
    //error_reporting(E_ALL);
    //ini_set('error_reporting', E_ALL);
    //ini_set('display_errors', 1);

    include 'config.php';

    require 'includes/app_paths.php';

    $security = array(
        'consumer_key' => $consumer_key,
        'domain'       => $domain
    );

    $dataRequest =  array(
        'limit' => 5,
        'references' => array(
            $activity_name
        )
    );

    $dataAction = 'get';
    // Only in Data API v1, but latest still is v0
    $dataApiPath = str_replace("latest", "v1", $dataApiPath);
    $dataApi = new DataApi();
    $dataApiUrl = "{$dataApiPath}itembank/activities";
    $dataOutput = json_decode($dataApi->request(
        $dataApiUrl,
        $security,
        $consumer_secret,
        $dataRequest,
        $dataAction
    )->getBody(), true);

    return $dataOutput;
}

function getSessionResponsesByActivityID($activity_name)
{
    //error_reporting(E_ALL);
    //ini_set('error_reporting', E_ALL);
    //ini_set('display_errors', 1);

    include 'config.php';

    require 'includes/app_paths.php';

    $security = array(
        'consumer_key' => $consumer_key,
        'domain'       => $domain
    );

    $dataRequest =  array(
        'limit' => 10,
        'activity_id' => array(
          $activity_name
        )
    );
    $dataAction = 'get';
    // Only in Data API v1, but latest still is v0
    $dataApiPath = str_replace("latest", "v1", $dataApiPath);
    $dataApi = new DataApi();
    $dataApiUrl = "{$dataApiPath}sessions/responses";
    $dataOutput = json_decode($dataApi->request(
        $dataApiUrl,
        $security,
        $consumer_secret,
        $dataRequest,
        $dataAction
    )->getBody(), true);

    return $dataOutput;
}
