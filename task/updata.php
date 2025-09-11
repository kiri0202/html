<?php
require_once('common.php');

$task = $_GET['task'];
show_top("更新と削除");
$gettask=$db->taskdata($task);

$task=$gettask['task'];
$end=$gettask['end'];
$naiyou=$gettask['naiyou'];
$start=$gettask['start'];
$zyoutai=$gettask['zyoutai'];

show_edit($task,$end,$naiyou,$start,"更新",$status,$zyoutai);
show_down("task");


?>