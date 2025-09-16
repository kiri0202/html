<?php

function check_input($task,$naiyou,&$error)
{
  $error = "";
  if ($task === "" or $naiyou ==="") {
    $error = '入力されていない値があります';
    return false;
  }
  
  return true;
}