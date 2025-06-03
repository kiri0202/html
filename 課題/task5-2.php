<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  
  $week=["日曜日","月曜日","火曜日","水曜日","木曜日","金曜日","土曜日",];
  $a=0;
while($a<=6){
  echo "<li>$week[$a]</li>";
  $a++;
}
  foreach($week as $day){
  echo "<li>$day</li>";
  echo $week;
  }
  ?>
</body>
</html>