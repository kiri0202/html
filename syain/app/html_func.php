<?php

function show_top($heading = "社員一覧")
{
  echo <<<TOP
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>社員管理</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h1>{$heading}</h1>
TOP;
}

function show_down($return = false)
{
  if ($return == true) {
    echo '<button><a href="index.php">社員一覧に戻る</a></button><br>';
    
  }
  echo <<<BOTTOM
  </body>
</html>
BOTTOM;
}
 
function show_syainlist($members)
{
  echo <<<TABLE1
    <table>
      <tr>
        <th>社員番号</th>
        <th>名前</th>
      </tr>
TABLE1;
  foreach($members as $member){
    echo <<<TABLE2
      <tr>
        <th>{$member["id"]}</th>
        <td><a href="syain_edit.php?id={$member["id"]}">{$member["name"]}</a></td>
      </tr>
TABLE2;
  }
  echo <<<TABLE3
    </table>

    <button><a href="syain_create.php">社員情報の追加</a></button>
TABLE3;
}

function show_form($id,$name,$age,$work,$old_id,$status,$button)
{
  $error = "";
  $error = get_error();
  echo <<<FORM
  <form action="post_data.php" method="post">
    <p>社員番号</p>
    <input type="text" name="id" placeholder="例）10001" value="{$id}">
    <p>名前</p>
    <input type="text" name="name" placeholder="例）中野　孝" value="{$name}">
    <p>年齢</p>
    <input type="text" name="age" placeholder="例）35" value="{$age}">
    <p>業務形態</p>
    <input type="text" name="work" placeholder="例）社員" value="{$work}">
    <p class="red">{$error}</p>
    <input type="hidden" name="old_id"  value="{$old_id}">
    <input type="hidden" name="status"  value="{$status}">
    <input type="submit" name="button"  value="{$button}">
  </form>
FORM;
}

function show_create()
{
  $error = get_error();
  show_form("","","","","","create","登録");
}
function show_delete()
{
  $error = get_error();
  show_form("","","","","","delete","削除");
}

function show_syain($member)
{
  $id = $member['id'];
  $name = $member['name'];
  $age = $member['age'];
  $work = $member['work'];
  echo <<<TABLE4
  <table>
    <tr>
      <th>社員番号</th>
      <th>名前</th>
      <th>年齢</th>
      <th>業務形態</th>
    </tr>
    
    <tr>
      <th>{$id}</th>
      <th>{$name}</th>
      <th>{$age}</th>
      <th>{$work}</th>
    </tr>
  </table>
TABLE4;
  // $age = $syain[$age];
  // $name = $syain[$name];
  // $name = $syain[$name];
  // $name = $syain[$name];
  // $name = $syain[$name];
  // show_form($id,$name,$age,$work,$old_id,$status,$button);
}
// echo <<<FORM
//     <form action="post_data.php" method="post">
//       <button>削除する</button>
//       <input type="hidden" name="status"  value="{$status}">
//     </form>
//     FORM;
function show_operation($operation,$id){
   
  if ($operation === 'delete') {
   
    $status = "delete";
    echo <<<FORM5
  <form action="post_data.php" method="post">
  <input type="hidden" name="id"  value="{$id}">
  <input type="hidden" name="status"  value="{$status}">
  <button>削除する</button>
  </form>
FORM5;
  }
  elseif($operation === 'update') {
    $status = "update";
    echo <<<FORM6
  <form action="post_data.php" method="post">
    <button>更新する</button>
    <input type="hidden" name="status"  value="{$status}">
  </form>
FORM6;
  }
  else {
    echo "<button><a href=syain_update.php?id={$id}>更新</a></button><br>";
    echo "<button><a href=syain_delete.php?id={$id}>削除</a></button><br>";
  }
}

function show_update($member)
{
  $error = "";
  $error = get_error();
  echo <<<FORM
  <form action="post_data.php" method="post">
    <p>社員番号</p>
    <input type="text" name="id" value="{$member["id"]}" >
    <p>名前</p>
    <input type="text" name="name" value="{$member["name"]}" >
    <p>年齢</p>
    <input type="text" name="age" value="{$member["age"]}" >
    <p>業務形態</p>
    <input type="text" name="work" value="{$member["work"]}">
    <p class="red">{$error}</p>

  </form>
FORM;
}

?>