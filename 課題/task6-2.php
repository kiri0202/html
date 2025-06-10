<?php
$a=9;
$b=21;
function max_number($n1,$n2){
  if($n1>=$n2)
    echo '$aと$bのうち最大値は'.$n1.'です。<br>';
  else
    echo '$aと$bのうち最大値は'.$n2.'です。<br>';
}
echo '$a='."$a<br>";
echo '$b='."$b<br>";
max_number($a,$b);











// max($n1,$n2);
// echo '$a='."$a<br>";
// echo '$b='."$b<br>";
// echo '$aと$bのうち最大値は'.max($a,$b).'です。<br>';
?>