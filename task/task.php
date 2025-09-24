<?php
require_once('common.php');
if($_POST["button"]=="↓"){
    $gettask=$db->gettask();
}else{
    $gettask=$db->gettaskdown();
}

show_top("タスク一覧");
show_search($gettask);
show_task($gettask);
show_down("create");
?>
