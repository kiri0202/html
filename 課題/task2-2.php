<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="reset.css">
  <title>Document</title>
</head>
<body>
 <?php
  $a = ['商品','価格','税込価格'];
  $b=['鉛筆',100,110];
  $c=['消しゴム',200,220];
  $d=['定規',300,330];
  ?>
  <table>
    <tr>
      <th>
        <?php echo $a[0]; ?>
      </th>
      <th>
        <?php echo $a[1]; ?>
      </th>
      <th>
        <?php echo $a[2]; ?>
      </th>
    </tr>
    <tr>
      <td>
        <?php echo $b[0]; ?>
      </td>
      <td>
        <?php echo $b[1]."円"; ?>
      </td>
      <td>
        <?php echo $b[2]."円"; ?>
      </td>
    </tr>
    <tr>
      <td>
        <?php echo $c[0]; ?>
      </td>
      <td>
        <?php echo $c[1]."円"; ?>
      </td>
      <td>
        <?php echo $c[2]."円"; ?>
      </td>
    </tr>
    <tr>
      <td>
        <?php echo $d[0]; ?>
      </td>
      <td>
        <?php echo $d[1]."円"; ?>
      </td>
      <td>
        <?php echo $d[2]."円"; ?>
      </td>
    </tr>
  </table>
</body>
</html>