<?php
require_once('common.php');
$task=$_POST["search"];

$gettask=$db->searchdata($task);
var_dump($gettask);
show_top("タスク一覧");
show_task($gettask);
show_down("create");
?>
