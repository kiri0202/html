<?php
require_once('common.php');
$task=$_POST["search"];

$gettask=$db->searchdata($task);

show_top("タスク一覧");
show_task($gettask);
show_down("create");
?>
