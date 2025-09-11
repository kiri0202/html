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
if($_POST["status"] == "create"){
  $db->createtask($task,$end,$naiyou,$start,$zyoutai);
  header("Location: index.php");
  exit();
}elseif($_POST["status"] == "updata"){
  
  $db->updatatask($task,$end,$naiyou,$start,$zyoutai);
  header("Location: index.php");
  exit();
}

?>
