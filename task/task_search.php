<?php
session_start();

var_dump($_SESSION);
require_once('common.php');
$task=$_POST["search"];

$task = "";
$gettask = [];

if (!empty($_POST["keyword"])) {
    $task = $_POST["keyword"];
    $gettask = $db->search($task);
}
show_top("タスク検索");
show_search($gettask);
show_task($gettask);
show_down("search");
?>
