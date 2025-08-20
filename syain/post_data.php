<?php
require_once('common.php');
if(isset($_POST["status"])){
  if(isset($_POST["id"])){
    $id = $_POST["id"];
  }
  if(isset($_POST["name"])){
    $name = $_POST["name"];
  }
  if(isset($_POST["age"])){
    $age = $_POST["age"];
  }
  if(isset($_POST["work"])){
    $work = $_POST["work"];
  }
  if(isset($_POST["old_id"])){
    $old_id = $_POST["old_id"];
  }
  // var_dump($_POST["status"]);
  // exit;
  if ($_POST["status"] == "create") {
    if (check_input($id,$name,$age,$work,$error) == false) {
      header("Location: syain_create.php?error={$error}");
      exit();
    }
    if ($db->idexist($id) == true) {
      $error = "既に使用されているIDです";
      header("Location: syain_create.php?error={$error}");
      exit();
    }
    if ($db->createsyain($id,$name,$age,$work) == false) {
      $error = "DBエラー";
      header("Location: syain_create.php?error={$error}");
      exit();
    }
    
    header("Location: index.php");
    exit();
  }elseif ($_POST["status"] == "delete") {
    if ($db->deletesyain($id) == true) {
      // var_dump($delete);
      exit;
      header("Location: index.php");
      exit;
    }
    exit;
  
  }elseif ($_POST["status"] == "update") {
    // var_dump($_POST);
    
    // header("Location: index.php");
    exit();
  }
}