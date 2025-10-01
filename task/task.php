<?php
session_start();
require_once('common.php');
// var_dump($_SESSION);
// if($_SESSION['start']%2==0){
//     $orderby="id";
// }else{
//     $orderby="id DESC";
// }
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
$where=$_SESSION['where'];
$orderby=$_SESSION['orderby'];
$gettask=$db->newtask($where,$orderby);
show_top("タスク一覧");
show_search($gettask);
show_task($gettask);
show_down("create");
?>
