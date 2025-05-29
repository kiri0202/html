<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $pen=100;
    $pentax=110;
    $eraser=200;
    $erasertax=220;
    define(TAX,10);
    echo "現在、消費税は".TAX."%です。<br>";
    echo "鉛筆が" .$PEN. "円で税込み".$pentax."円です。<br>";
    echo "消しゴムが".$ERASER."円で税込み".$erasertax."円です。<br>";

  ?>
</body>
</html>