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
if (isset($_POST['start'])) {
    $_SESSION['start']++;
  header("Location: task.php");
}
if (isset($_POST['end'])) {
    $_SESSION['end']++;
  header("Location: task_end.php");
}
if (isset($_POST['kansei'])) {
    $_SESSION['kansei']++;
  header("Location: task_status.php");
}

?>

<!-- }elseif($button == "検索"){
  $id=$_POST["search"];
  $db->gettask($id);
  
  
  exit();
} -->