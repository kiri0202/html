<?php

function check_input($task,$naiyou,$end,&$error)
{
  $error = "";
  if ($task === "" or $naiyou ==="" or $end ==="" ) {
    $error = '入力されていない値があります';
    
    return false;
    
  }
  
  return true;
}
?>