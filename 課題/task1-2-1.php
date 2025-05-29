<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    $pen="100";
    $eraser="200";
    define("TAX","10");
    echo "現在、消費税は".TAX."%です。<br>";
    echo "鉛筆が $pen 円で税込み110円です。<br>";
    echo '鉛筆が'.$pen.'円で税込み110円です。<br>';
    echo "消しゴムが".$eraser."円で税込み220円です。<br>";
  ?>
</body>
</html>