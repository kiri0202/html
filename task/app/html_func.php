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
    echo "<button><a href=index.php>タスク登録</a></button>";
    }
    elseif($e=="task"){
      echo "<button><a href=task.php>タスク一覧</a></button>";
      
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
  if($gettasks["zyoutai"]=="未完了"){
    $naiyou="未完了";
  }else{
    $naiyou="完了";
  }
  echo <<<TABLE3
  <form action="post_data.php" method="post">
  <tr>
  <td>{$gettasks["start"]}</td>
  <td><a href="updata.php?task={$gettasks['task']}">{$gettasks['task']}</td>
  <td>{$naiyou}</td>
  <td>{$gettasks["end"]}</td>
  <td>
  <input type="submit" name="button"  value="削除" class=delete></td>
  </tr>
  </form>
 
 
TABLE3;
  }
  echo <<<TABLE4
  </table>
TABLE4;
  
}
function show_form($task,$end,$naiyou,$start,$button,$status,$zyoutai){
  echo <<<TABLE2
<form action="post_data.php" method="post">
  <p>タスク名</p>
  <input type="text" name="task" value="{$task}">
  <p>登録日時</p>
  <input type="text" name="start" value="{$start}">
  <p>締切日</p>
  <input type="text" name="end" value="{$end}">
  <p>内容</p>
  <textarea name="naiyou" rows="5" >{$naiyou}</textarea>
  
TABLE2;
if($zyoutai=="未完了"){
echo <<<TABLE6
<p>ステータス</p>
<input type="radio" name="zyoutai" value="未完了" checked>未完了
<input type="radio" name="zyoutai" value="完了">完了
TABLE6;
}elseif($zyoutai=="完了"){
echo <<<TABLE6
  <p>ステータス</p>
  <input type="radio" name="zyoutai" value="未完了">未完了
  <input type="radio" name="zyoutai" value="完了"checked>完了
TABLE6;
}

if($status=="updata"){
echo <<<TABLE3
  <br><input type="submit" name="button"  value="更新" class=kousinn>
  <input type="submit" name="button"  value="削除" class=sakuzyo>
TABLE3;
}else{
  echo <<<TABLE4
  <input type="submit" name="button"  value="{$button}" class=left>
  <input type="hidden" name="zyoutai" value="{$zyoutai}" > 
  
TABLE4;
}
echo <<<TABLE5
  <input type="hidden" name="status"  value="{$status}">
</form>
TABLE5;

}

function show_create(){
  date_default_timezone_set('Asia/Tokyo');
  $start=date("n月j日 G時i分");
  show_form("","","",$start,"登録","create","未完了");
  
}

function show_edit($task,$end,$naiyou,$start,$button,$status,$zyoutai){
  show_form($task,$end,$naiyou,$start,$button,"updata",$zyoutai);
}
?>