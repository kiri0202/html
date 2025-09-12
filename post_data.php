<?php
require_once('common.php');

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
}
// var_dump($_POST);
// exit;
if($status == "create"){
  $db->createtask($task,$end,$naiyou,$start,$zyoutai);
  header("Location: index.php");
  exit();
}elseif($_POST["button"] == "更新"){
  
  $db->updatatask($task,$end,$naiyou,$start,$zyoutai);
  header("Location: task.php");
  exit();
}elseif($_POST["button"] == "削除"){
  $db->deletetask($task,$end,$naiyou,$start,$zyoutai);
  header("Location: task.php");
  exit();
}
?>
