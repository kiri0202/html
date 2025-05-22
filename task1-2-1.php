<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    define('PEN',100);
    define("ERASER",200);
    $tax=10;
    echo "現在、消費税は{$tax}%です。<br>";
    echo "鉛筆が" .PEN. "円で税込み" .(PEN+(PEN*$tax/100)) ."円です。<br>";
    echo "消しゴムが".ERASER."円で税込み".(ERASER+(ERASER*$tax/100))."円です。<br>";
  ?>
</body>
</html>