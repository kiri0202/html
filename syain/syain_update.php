<?php
require_once('common.php');

show_top("社員情報の更新");
$id = $_GET['id'];
// var_dump($id);
$member = $db->getsyain($id);
// var_dump($name);

$name=$member['name'];
$age=$member['age'];
$work=$member['work'];
$old_id=$id;
// show_update($member);
// var_dump($_POST);
// exit;

show_updete($id,$name,$age,$work,$old_id,$status,$button);
// show_operation('update',$id);

// $update = $db->updatesyain($id,$name,$age,$work,$old_id);
show_down(true);
?>
