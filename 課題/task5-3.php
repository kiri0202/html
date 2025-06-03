<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<table>
<body>
  <table>
    <tr>
      <th>商品</th>
      <th>価格</th>
      <th>税込価格</th>
    </tr>
  
  <?php
  
  $prodacts=[
    ["item"=>"鉛筆","price"=>100],
    ["item"=>"消しゴム","price"=>200],
    ["item"=>"定規", "price"=>300 ]
  ];
    define("TAX",10);
    foreach($prodacts as $prodact){
       $item = $prodact["item"];
       $price = $prodact["price"];
       $tax_price = $price * (1 + TAX / 100);
        echo "<tr>";
        echo "<td>$item</td>";
        echo "<td>{$price}円</td>";
        echo "<td>{$tax_price}円</td>";
        echo "</tr>";
    }       
  ?>
   
  </table>
</body>
</html>