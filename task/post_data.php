<?php
require_once('common.php');
session_start();
if(isset($_POST["status"])){
  if(isset($_POST["task"])){
    $task=$_POST["task"];
  }
  if(isset($_POST["end"])){
    $end=$_POST["end"];
  }
  if(isset($_POST["naiyou"])){
    $naiyou=$_POST["naiyou"];
  }
  if(isset($_POST["start"])){
    $start=$_POST["start"];
  }
  if(isset($_POST["button"])){
    $button=$_POST["button"];
  }
  if(isset($_POST["status"])){
    $status=$_POST["status"];
  }
  if(isset($_POST["zyoutai"])){
    $zyoutai=$_POST["zyoutai"];
  }
  if(isset($_POST["id"])){
    $id=$_POST["id"];
  }
  if(check_input($task,$naiyou,$end,$error)==false){
    
    $_SESSION['task']=$task;
    $_SESSION['naiyou']=$naiyou;
    $_SESSION['end']=$end;
    $_SESSION['error']=$error;
    header("Location: index.php");
    exit;
  }
  if($_POST["status"] == "create"){
    $db->createtask($task,$end,$naiyou,$start,$zyoutai);
    header("Location: task.php");
    exit();
  }elseif($button == "更新"){
    $db->updatatask($task,$end,$naiyou,$zyoutai,$id);
    header("Location: task.php");
    exit();
  }elseif($button == "削除"){
    $db->deletetask($id);
    header("Location: task.php");
    exit();
  }
}
// if (!isset($_SESSION['count'])) {
//     $_SESSION['count'] = 0;
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
  
    $_SESSION['where']=$where;
  }
  if ($_POST['start']) {
      $_SESSION['start']++;
      if($_SESSION['start']%2==0){
        $orderby="id";
      }else{
        $orderby="id DESC";
      }
      $_SESSION['orderby']=$orderby;
    header("Location: task.php");
    exit;
    }
  if ($_POST['end']) {
      $_SESSION['end']++;
      if($_SESSION['end']%2==0){
        $orderby="end";
      }else{
        $orderby="end DESC";
      }
      $_SESSION['orderby']=$orderby;
    header("Location: task_end.php");
    exit;
    }
  if (isset($_POST['kansei'])) {
      $_SESSION['kansei']++;
    header("Location: task.php");
    exit;
  }

$_SESSION['orderby']=$orderby;
$_SESSION['where']=$where;
?>

<!-- }elseif($button == "検索"){
  $id=$_POST["search"];
  $db->gettask($id);
  
  
  exit();
} -->