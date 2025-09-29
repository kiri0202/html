<?php
session_start();
require_once('common.php');

if($_SESSION['start']%2==0){
    $gettask=$db->gettask();
}else{
    $gettask=$db->gettaskdown();
}

var_dump($_SESSION);

show_top("タスク一覧");
show_search($gettask);
show_task($gettask);
show_down("create");
?>
