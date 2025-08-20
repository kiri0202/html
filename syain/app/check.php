<?php

function check_input($id,$name,$age,$work,&$error)
{
  $error = "";
  if ($id === "" or $name ==="") {
    $error = '入力されていない値があります';
    return false;
  }
  if (preg_match("/^[1-3][0-9]{4}$/",$id) != true) {
    $error = 'idには1～3ではじまる5桁の整数を入力してください';
    return false;
  }
  return true;
}