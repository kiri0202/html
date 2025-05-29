<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
  $pen=[
    "商品"=>"鉛筆",
    "価格"=>100];
  $eraser=[
    "商品"=>"消しゴム",
    "価格"=>200];
 
  define("TAX",10);
  define("DZ",12);
  ?>
  <table>
    <tr>
      <th>商品</th>
      <th>価格</th>
      <th>税込価格</th>
      <th>1Dzの価格</th>
    </tr>
    <tr>
      <td><?php echo $pen["商品"]; ?></td>
      <td><?php echo $pen["価格"]; ?></td>
      <td><?php echo $pen["価格"]+$pen["価格"]*TAX/100 ."円"; ?></td>
      <td><?php echo ($pen["価格"]+$pen["価格"]*TAX/100)*DZ ."円"; ?></td>
    </tr>
    <tr>
      <td><?php echo $eraser["商品"]; ?></td>
      <td><?php echo $eraser["価格"]; ?></td>
      <td><?php echo $eraser["価格"]+$eraser["価格"]*TAX/100 ."円"; ?></td>
      <td><?php echo ($eraser["価格"]+$eraser["価格"]*TAX/100)*DZ ."円"; ?></td>
    </tr>
    
  </table>
  <p><?php echo "消費税は".(TAX)."％です。";?></p>
</body>
</html>