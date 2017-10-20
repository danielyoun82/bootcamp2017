<?php
session_start();
$_SESSION['itemID'] = $_POST['itemID1'];
echo $_SESSION['itemID'];
?>