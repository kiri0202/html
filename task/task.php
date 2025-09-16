<?php
require_once('common.php');

$gettask=$db->gettask();
var_dump($gettask);
show_top("タスク一覧");
show_task($gettask);
show_down("create");
?>
