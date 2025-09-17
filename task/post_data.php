<?php
require_once('common.php');
// var_dump($_POST);
// exit;
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
  
}

if(check_input($task,$naiyou,$end,$error)==false){
  header("Location: index.php?error={$error}");
  exit;
}
if($_POST["status"] == "create"){
  $db->createtask($task,$end,$naiyou,$start,$zyoutai);
  header("Location: index.php");
  exit();
}elseif($button == "更新"){
  $db->updatatask($task,$end,$naiyou,$start,$zyoutai,$id);
  header("Location: task.php");
  exit();
}elseif($button == "削除"){
  // var_dump($_POST);
  // exit;
  $db->deletetask($id,$task);
  
  header("Location: task.php");
  exit();
}

?>
