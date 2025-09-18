<?php
require_once('common.php');

$id = $_GET['id'];

show_top("更新と削除");

$gettask=$db->taskdata($id);

$task=$gettask['task'];
$end=$gettask['end'];
$naiyou=$gettask['naiyou'];
$zyoutai=$gettask['zyoutai'];

show_edit($task,$end,$naiyou,$start,"更新",$status,$zyoutai,$error,$id);
show_down("task");


?>