<?php
require_once('common.php');

show_top("社員情報の更新");
$id = $_GET['id'];
// var_dump($id);
$member = $db->getsyain($id);
var_dump($member);

show_update($member);
show_operation('update',"$id");
// $update = $db->updatesyain($id,$name,$age,$work,$old_id);
show_down(true);
?>
