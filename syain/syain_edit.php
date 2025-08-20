<?php

require_once('common.php');

show_top("社員情報");
$id = $_GET['id'];
$member = $db->getsyain($id);
// var_dump($member);
show_syain($member);
show_operation('',$id);
show_down(true);

?>

