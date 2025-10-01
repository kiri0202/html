<?php
session_start();
require_once('common.php');

// if($_SESSION['end']%2==0){
//     $orderby="end;";
// }else{
//     $orderby="end DESC;";
// }


$where=$_SESSION['where'];
$orderby=$_SESSION['orderby'];
$gettask=$db->newtask($where,$orderby);

show_top("タスク一覧");
show_search($gettask);
show_task($gettask);
show_down("create");
?>
