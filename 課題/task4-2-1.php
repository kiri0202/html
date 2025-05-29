<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  $a=mt_rand(1,12);
    switch($a){
      case($a>=3 && $a<=5):
        echo $a."月は春の季節";
        break;
      case($a>=6 && $a<=8):
        echo $a."月は夏の季節";
        break;
      case($a>=9 && $a<=11):
        echo $a."月は秋の季節";
        break;
      default:
        echo $a."月は冬の季節";
    }
    echo $a
  ?>
</body>
</html>