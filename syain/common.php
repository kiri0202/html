<?php

require_once('app/Datebase.php');
require_once('app/html_func.php');
require_once('app/check.php');

function get_error()
{
  $error = "";
  if (isset($_GET["error"])) {
    $error = $_GET["error"];
  }
    return $error;
}

$db= new Database();
?>