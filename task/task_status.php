<?php
session_start();
require_once('common.php');
if(isset($_SESSION['kansei'])){
    if($_SESSION['kansei']%3==0){
        $where="";
    }
    if($_SESSION['kansei']%3==1){
        $where="zyoutai = '未完了'";
    }
    if($_SESSION['kansei']%3==2){
        $where="zyoutai = '完了'";
    }
}

var_dump($_SESSION);


show_top("タスク一覧");
show_search($gettask);
show_task($gettask);
show_down("create");
?>
