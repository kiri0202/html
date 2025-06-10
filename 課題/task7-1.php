<?php
class Staff{
  private $name;
  private $age;
  private $sex;
  private $id;
  
  public function __construct($name,$age,$sex){
    $this-> name = $name;
    $this-> age = $age;
    $this-> sex = $sex;
  }
  public function number(){
    $a=0000;
    while($a<10000){
      $id="S.$a";
      $a++;
    }
  }
  public function show(){
    printf("{$id}　{$this->name}　{$this->age}　{$this->sex} <br>");
  }
}
// 社員IDがわからない
$staff=[];
$staff[0]= new Staff("佐藤　一郎","31歳","男性");
$staff[1]= new Staff("山田　花子","25歳","女性");
$staff[2]= new Staff("鈴木　次郎","27歳","男性");
$staff[0] ->show();
$staff[1] ->show();
$staff[2] ->show();
?>