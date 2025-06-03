<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <table>
   
  <?php
  for ($a=1;$a<=20;$a++){
    echo " <tr>";
    for ($b=1;$b<=9;$b++){
      echo "<td>"."　$a"."×"."$b=".$a*$b."</td>";
    }
    echo "</tr>";
  }
  ?>
     
    
  </table>
</body>
</html>