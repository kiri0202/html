<?php
session_start();
require_once('common.php');

if($_SESSION['kansei']%3==0){
    $gettask=$db->gettask();
}elseif($_SESSION['kansei']%3==1){
    $gettask=$db->taskmikanryou();
}elseif($_SESSION['kansei']%3==2){
    $gettask=$db->taskkanryou();
}

var_dump($_SESSION);


show_top("タスク一覧");
show_search($gettask);
show_task($gettask);
show_down("create");
?>
