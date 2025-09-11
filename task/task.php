<?php
require_once('common.php');

$gettask=$db->gettask();

show_top("タスク一覧");
show_task($gettask);
show_down("create");
?>
