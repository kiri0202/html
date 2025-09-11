<?php
require_once('common.php');

show_top("社員情報の削除");
$id = $_GET['id'];
// var_dump($id);
$member = $db->getsyain($id);
show_syain($member);
// echo $id;
show_operation('delete',$id);

// $delete = $db->deletesyain($id);
show_down(true);

?>
