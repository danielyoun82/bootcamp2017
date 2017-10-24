<?php
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        Learnosity Hello World - Plus!
    </title>
</head>

<body class="lrn-2-col">
    <?php
        require 'dataapi/data_endpoints.php';
        $activities_output = getActivitiesByActivityID('Bootcamp2017Activity');
        echo json_encode($activities_output);
        //print_r($activities_output['data'][0]['data']);
        echo "<br><br>";
        $activities_output = getSessionResponsesByActivityID('Bootcamp2017Activity');
        echo json_encode($activities_output);
        //print_r($activities_output['data'][0]['data']);
    ?>
</body>
</html>
