<?php
require_once('common.php');

$members = $db->getallsyain();
show_top();
show_syainlist($members);

show_down();
?>

