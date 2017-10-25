<?php

    $schemasPaths = array(
        'prod' => 'http://schemas.learnosity.com/',
        'qa' => 'http://schemas-qa.learnosity.com/',
        'staging' => 'http://schemas.staging.learnosity.com/',
        'vg' => 'http://schemas.vg.learnosity.com/',
        'user.vg' => 'http://schemas.{:name:}.vg.learnosity.com/'
    );

    $dataApiPaths = array(
        'prod' => 'https://data.learnosity.com/latest/',
        'qa' => 'https://data-qa.learnosity.com/latest/',
        'staging' => 'https://data.staging.learnosity.com/latest/',
        'vg' => 'https://data.vg.learnosity.com/latest/',
        'user.vg' => 'https://data.{:name:}.vg.learnosity.com/latest/'
    );

    $questionsApiPaths = array(
        'prod' => '//questions.learnosity.com/',
        'qa' => '//questions-qa.learnosity.com/',
        'sandbox' => '//questions.sandbox.lninfra.net/',
        'staging' => '//questions.staging.learnosity.com/',
        'vg' => '//questions.vg.learnosity.com/?latest',
        'user.vg' => '//questions.{:name:}.vg.learnosity.com/?latest',
    );

    $ssoApiPaths = array(
        'prod' => '//sso.learnosity.com/',
        'qa' => '//sso-qa.learnosity.com/',
        'sandbox' => '//sso.sandbox.lninfra.net/',
        'staging' => '//sso.staging.learnosity.com/',
        'vg' => '//sso.vg.learnosity.com/?latest',
        'user.vg' => '//sso.{:name:}.vg.learnosity.com/?latest',
    );

    $questionEditorApiPaths = array(
        'prod' => '//questioneditor.learnosity.com?V2',
        'qa' => '//questioneditor-qa.learnosity.com?V3',
        'sandbox' => '//questioneditor.sandbox.lninfra.net?V2',
        'staging' => '//questioneditor.staging.learnosity.com?V2',
        'vg' => '//questioneditor.vg.learnosity.com/?latest',
        'user.vg' => 'http://questioneditor.{:name:}.vg.learnosity.com/?latest',
    );

    $assessApiPaths = array(
        'prod' => '//assess.learnosity.com/',
        'qa' => '//assess-qa.learnosity.com/',
        'sandbox' => '//assess.sandbox.lninfra.net/',
        'staging' => '//assess.staging.learnosity.com/',
        'vg' => '//assess.vg.learnosity.com/?latest',
        'user.vg' => 'http://assess.{:name:}.vg.learnosity.com/?latest',
    );

    $itemsApiPaths = array(
        'prod' => '//items.learnosity.com/',
        'qa' => '//items-qa.learnosity.com/',
        'sandbox' => '//items.sandbox.lninfra.net/',
        'staging' => '//items.staging.learnosity.com/',
        'vg' => '//items.vg.learnosity.com/?latest',
        'user.vg' => 'http://items.{:name:}.vg.learnosity.com/?latest',
    );

    $reportsApiPaths = array(
        'prod' => 'https://reports.learnosity.com/',
        'qa' => 'https://reports-qa.learnosity.com/',
        'sandbox' => 'https://reports.sandbox.lninfra.net/',
        'staging' => 'https://reports.staging.learnosity.com/',
        'vg' => 'https://reports.vg.learnosity.com/?latest',
        'user.vg' => 'http://reports.{:name:}.vg.learnosity.com/?latest',
    );

    $authorApiPaths = array(
        'prod' => 'https://authorapi.learnosity.com?latest',
        'qa' => 'https://authorapi-qa.learnosity.com?latest',
        'sandbox' => 'https://authorapi.sandbox.lninfra.net?v0.15',
        'staging' => 'https://authorapi.staging.learnosity.com/?latest',
        'vg' => 'https://authorapi.vg.learnosity.com/?latest',
        'user.vg' => 'http://authorapi.{:name:}.vg.learnosity.com/?latest',
    );

    $apiLegacyPaths = array(
        'prod' => '//api.learnosity.com/',
        'qa' => '//api-qa.learnosity.com/',
        'sandbox' => '//api.sandbox.lninfra.net/',
        'staging' => '//api.staging.learnosity.com/',
        'vg' => '//api.vg.learnosity.com/?latest',
        'user.vg' => 'http://api.{:name:}.vg.learnosity.com/?latest',
    );

    $apiAppCachePaths = array(
        'prod' => 'http://questions.learnosity.com/{:version:}/appcache',
        'qa' => 'http://questions-qa.learnosity.com/{:version:}/appcache',
        'sandbox' => 'http://questions.sandbox.lninfra.net/{:version:}/appcache',
        'staging' => 'http://questions.staging.learnosity.com/{:version:}/appcache',
        'vg' => 'http://questions.vg.learnosity.com/{:version:}/appcache',
        'user.vg' => 'http://questions.{:name:}.vg.learnosity.com/{:version:}/appcache',
    );

    $eventsApiPaths = array(
        'prod' => 'https://events.learnosity.com/',
        'qa' => 'https://events-qa.learnosity.com/',
        'sandbox' => 'https://events.sandbox.lninfra.net/',
        'staging' => 'https://events.staging.learnosity.com/?latest',
        'vg' => 'http://events.vg.learnosity.com/?latest',
        'user.vg' => 'http://events.{:name:}.vg.learnosity.com/?latest',
    );

    $environments = array(
        '.sandbox.' => 'sandbox',
        '.staging.' => 'staging',
        '.vg.' => 'vg',
        '-qa.' => 'qa',
        'http.*?\..*?\.vg.' => 'user.vg'
    );

    if (array_key_exists('env', $_REQUEST)) {
        $environment = $_REQUEST['env'];
        if ($environment === 'production') {
            $environment = 'prod';
        }
    } else {
        $environment = 'prod';
        foreach ($environments as $pattern => $name) {
            if (strpos($_SERVER['HTTP_HOST'], $pattern) !== false) {
                $environment = $name;
                break;
            }
        }
    }

    if (array_key_exists('region', $_GET)) {
        $environment = 'prod';
    }

    $schemasPath = $schemasPaths[$environment];
    $dataApiPath = $dataApiPaths[$environment];
    $ssoApiPath = $ssoApiPaths[$environment];
    $questionsApiPath = $questionsApiPaths[$environment];
    $questionEditorApiPath = $questionEditorApiPaths[$environment];
    $assessApiPath = $assessApiPaths[$environment];
    $itemsApiPath = $itemsApiPaths[$environment];
    $reportsApiPath = $reportsApiPaths[$environment];
    $authorApiPath = $authorApiPaths[$environment];
    $apiLegacyPath = $apiLegacyPaths[$environment];
    $apiAppCachePath = $apiAppCachePaths[$environment];
    $eventsApiPath = $eventsApiPaths[$environment];

    if ($environment === 'vg' && preg_match('/[^.]+\.([^.]+)\.vg\./i', $_SERVER['HTTP_HOST'], $matches)) {
        $environment = 'user.vg';
        $userVgName = $matches[1];
        $schemasPath = preg_replace('/{:name:}/', $userVgName, $schemasPaths[$environment]);
        $dataApiPath = preg_replace('/{:name:}/', $userVgName, $dataApiPaths[$environment]);
        $ssoApiPath = preg_replace('/{:name:}/', $userVgName, $ssoApiPaths[$environment]);
        $questionsApiPath = preg_replace('/{:name:}/', $userVgName, $questionsApiPaths[$environment]);
        $questionEditorApiPath = preg_replace('/{:name:}/', $userVgName, $questionEditorApiPaths[$environment]);
        $assessApiPath = preg_replace('/{:name:}/', $userVgName, $assessApiPaths[$environment]);
        $itemsApiPath = preg_replace('/{:name:}/', $userVgName, $itemsApiPaths[$environment]);
        $reportsApiPath = preg_replace('/{:name:}/', $userVgName, $reportsApiPaths[$environment]);
        $authorApiPath = preg_replace('/{:name:}/', $userVgName, $authorApiPaths[$environment]);
        $apiLegacyPath = preg_replace('/{:name:}/', $userVgName, $apiLegacyPaths[$environment]);
        $apiAppCachePath = preg_replace('/{:name:}/', $userVgName, $apiAppCachePaths[$environment]);
        $eventsApiPath = preg_replace('/{:name:}/', $userVgName, $eventsApiPaths[$environment]);
    }

    $region = '';
    if (array_key_exists('env', $_GET) && $_GET['env'] == 'qa') {
        $environment = 'qa';
    }

    if ($environment == 'qa') {
        $environment = 'prod';
        $region ='qa';
        /* XXX: QA has its own URL already, so we don't want to rewrite them */
    } elseif (array_key_exists('region', $_GET)) {
        $region = $_GET['region'];
        function insert_region($path, $region)
        {
            $pos = strpos($path, '.');
            return substr_replace($path, '-' . $region, $pos, 0);
        }

        $schemasPath = insert_region($schemasPath, $region);
        $dataApiPath = insert_region($dataApiPath, $region);
        $ssoApiPath = insert_region($ssoApiPath, $region);
        $questionsApiPath = insert_region($questionsApiPath, $region);
        $questionEditorApiPath = insert_region($questionEditorApiPath, $region);
        $assessApiPath = insert_region($assessApiPath, $region);
        $itemsApiPath = insert_region($itemsApiPath, $region);
        $reportsApiPath = insert_region($reportsApiPath, $region);
        $authorApiPath = insert_region($authorApiPath, $region);
        $apiLegacyPath = insert_region($apiLegacyPath, $region);
        $apiAppCachePath = insert_region($apiAppCachePath, $region);
        $eventsApiPath = insert_region($eventsApiPath, $region);
    }

    switch ($region) {
        case 'qa':
            $consumerKey = 'lrnIntQA2qPj8oIy';
            $consumerSecret = 'OIHMaHm9Yooa3SkrWZqtojjrZ9bhytfMBwjmDVvm';
            break;

        default:
            $consumerKey = 'yis0TYCu7U9V4o7M';
            $consumerSecret = '74c5fd430cf1242a527f6223aebd42d30464be22';
            break;
    }

    if (array_key_exists('consumer_key', $_REQUEST)) {
        $consumerKey = $_REQUEST['consumer_key'];
    }

    if (array_key_exists('consumer_secret', $_REQUEST)) {
        $consumerSecret = $_REQUEST['consumer_secret'];
    }

    $questionEditorV3ApiPath = $questionEditorApiPath;
    if (!strpos($questionEditorV3ApiPath, '.vg.')) {
        $questionEditorV3ApiPath = str_replace('?latest', '?v3', $questionEditorV3ApiPath);
        $questionEditorV3ApiPath = str_replace('?V2', '?v3', $questionEditorV3ApiPath);
    }

    // ugh ugh ugh ugh ugh i hate our mix of snake & camel case!
    $consumer_key = $consumerKey;
    $consumer_secret = $consumerSecret;

if (!function_exists('getS3AssetPath')) {
    function getS3AssetPath($option = []) {
        if ($GLOBALS['environment'] === 'vg' && isset($option['vg_path']) && $option['use_vg'] == true) {
            $endPath = '//docs.vg.learnosity.com/' . $option['vg_path'];
        } else {
            $endPath = '//assets.learnosity.com/' . (isset($option['path']) ? $option['path'] : '');
        }

        return $endPath;
    }
}
