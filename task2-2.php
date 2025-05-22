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
  $b=['鉛筆','100円','110円'];
  $c=['消しゴム','200円','220円'];
  $d=['定規','300円','330円'];
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
        <?php echo $b[1]; ?>
      </td>
      <td>
        <?php echo $b[2]; ?>
      </td>
    </tr>
    <tr>
      <td>
        <?php echo $c[0]; ?>
      </td>
      <td>
        <?php echo $c[1]; ?>
      </td>
      <td>
        <?php echo $c[2]; ?>
      </td>
    </tr>
    <tr>
      <td>
        <?php echo $d[0]; ?>
      </td>
      <td>
        <?php echo $d[1]; ?>
      </td>
      <td>
        <?php echo $d[2]; ?>
      </td>
    </tr>
  </table>
</body>
</html>