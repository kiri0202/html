<?php
class Staff{
  private $name;
  private $age;
  private $sex;
  private static $id=0;
  
  public function __construct($name,$age,$sex){
    $this-> name = $name;
    $this-> age = $age;
    $this-> sex = $sex;
    // $this->id=$id;
  }

  public function number(){
    self::$id++;
  }

  public function show(){
    // printf("{$id}　{$this->name}　{$this->age}　{$this->sex} <br>");
    printf("(S%04d) %s %d歳 %s<br>",self::$id,$this->name,$this->age,$this->sex);
  }
}

$staff=[];
$staff[0]= new Staff("佐藤　一郎","31","男性");
$staff[1]= new Staff("山田　花子","25","女性");
$staff[2]= new Staff("鈴木　次郎","27","男性");
foreach($staff as $staffs){
 $staffs ->number();
 $staffs ->show();
}




// $staff[1] ->number();
// $staff[1] ->show();
// $staff[2] ->number();
// $staff[2] ->show();
?>