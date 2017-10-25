<?php
    session_start();
    $_SESSION['itemID'] = $_POST['itemID2'];
    echo $_SESSION['itemID'];
