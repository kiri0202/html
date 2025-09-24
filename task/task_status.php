<?php
require_once('common.php');
if($_POST["button"]=="未"){
    $gettask=$db->taskmikanryou();
}elseif($_POST["button"]=="完"){
    $gettask=$db->taskkanryou();
}else{
    $gettask=$db->gettask();
}

show_top("タスク一覧");
show_search($gettask);
show_task($gettask);
show_down("create");
?>
