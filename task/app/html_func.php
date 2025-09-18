<?php

function show_top($heading){
  echo <<<TOP
  <!DOCTYPE html>
  <html lang="ja">
  <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  <h1>{$heading}</h1>
TOP;
}

function show_down($e){
  if($e=="create"){
    echo "<br><button><a href=index.php>タスク登録</a></button>";
    }
    elseif($e=="task"){
      echo "<br><button><a href=task.php>タスク一覧</a></button>";
      
      }
echo <<<BOTTOM
</body>
</html>
BOTTOM;
}

function show_task($gettask){
  echo <<<TABLE
  <table>
    <tr>
    <th>登録日時</th>
    <th>タスク名</th>
    <th>ステータス</th>
    <th>締切日</th>
    </tr>
TABLE;

  foreach ($gettask as $gettasks) {

    $start = date('n月j日 G時i分', strtotime($gettasks["start"]));
    $end = date('n月j日 ', strtotime($gettasks["end"]));
    $id=$gettasks['id'];
    $task=$gettasks['task'];
    $status="";
  if($gettasks["zyoutai"]=="未完了"){
    $zyoutai="未完了";
  }else{
    $zyoutai="完了";
  }
  echo <<<TABLE3
  <tr>
  <td>{$start}</td>
  <td><a href="updata.php?id={$id}">{$task}</a></td>
  <td>{$zyoutai}</td>
  <td>{$end}</td>
  <td>
    <form action="post_data.php" method="post">
      <input type="submit" name="button"  value="削除" class=delete>
      <input type="hidden" name="id"  value="{$id}" >
      <input type="hidden" name="task"  value="{$task}" >
      <input type="hidden" name="status"  value="{$status}" >
    </form>
  </td>
  </tr>
 
TABLE3;
  }
  echo <<<TABLE4
  </table>
TABLE4;
  
}
function show_form($task,$end,$naiyou,$start,$button,$status,$zyoutai,$id){
  
  echo <<<TABLE2
<form action="post_data.php" method="post">
  <p class="red">{$_GET["error"]}</p>
  <p>タスク名</p>
  <input type="text" name="task" value="{$task}">
  <p>締切日</p>
  <input type="date" name="end" value="{$end}">
  <p>内容</p>
  <textarea name="naiyou" rows="5" >{$naiyou}</textarea>
  
  <input type="hidden" name="status"  value="{$status}">
  <input type="hidden" name="zyoutai" value="{$zyoutai}" > 
  <input type="hidden" name="id" value="{$id}" > 

TABLE2;
if($zyoutai=="未完了" && $status=="updata"){
echo <<<TABLE6
<p>ステータス</p>
<input type="radio" name="zyoutai" value="未完了" checked>未完了
<input type="radio" name="zyoutai" value="完了">完了
TABLE6;
}elseif($zyoutai=="完了" && $status=="updata"){
echo <<<TABLE6
  <p>ステータス</p>
  <input type="radio" name="zyoutai" value="未完了">未完了
  <input type="radio" name="zyoutai" value="完了"checked>完了
TABLE6;
}
if($status=="updata" ){
echo <<<TABLE3
  <br><input type="submit" name="button"  value="更新" class=kousinn>
  <input type="submit" name="button"  value="削除" class=sakuzyo>
TABLE3;
}else{
  echo <<<TABLE4
  <input type="submit" name="button"  value="{$button}" >
  <input type="hidden" name="zyoutai" value="{$zyoutai}" > 
TABLE4;
}
 echo<<<TABLE8
</form>
TABLE8;

}

function show_create($task,$end,$naiyou){
  // date_default_timezone_set('Asia/Tokyo');
  // $start=date("n月j日 G時");
  show_form($task,$end,$naiyou,"","登録","create","未完了","");
}

function show_edit($task,$end,$naiyou,$start,$button,$status,$zyoutai,$id){
  $id = $_GET['id'];
  show_form($task,$end,$naiyou,$start,$button,"updata",$zyoutai,$id);
}
?>

