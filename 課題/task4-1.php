<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  $a=mt_rand(1,100);
  if ($a>=95)
    echo "今日の運勢は大吉です";
  elseif ($a>=80)
    echo "今日の運勢は中吉です";
  elseif ($a>=50)
    echo "今日の運勢は吉です";
  elseif ($a>=20)
    echo "今日の運勢は凶です";
  else
    echo "今日の運勢は大凶です";

    echo $a;
  ?>
</body>
</html>