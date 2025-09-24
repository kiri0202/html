<?php
require_once('common.php');
if($_POST["button"]=="↓"){
    $gettask=$db->getend();
}else{
    $gettask=$db->getup();
}

show_top("タスク一覧");
show_search($gettask);
show_task($gettask);
show_down("create");
?>
