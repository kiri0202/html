<?php
class Staff{
  protected $name;
  protected $age;
  protected $sex;
  protected static $id=0;
  
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
   
      printf("(S%04d) %s %d歳 %s<br>",self::$id,$this->name,$this->age,$this->sex);
    // printf("{$id}　{$this->name}　{$this->age}　{$this->sex} <br>");
    
  }
}

class PartStaff extends Staff{
  private $jikyu;
  public function __construct($name,$age,$sex,$jikyu){
    parent::__construct($name,$age,$sex);
    $this->jikyu=$jikyu;
  }
  public function show(){ 
    // printf("{$id}　{$this->name}　{$this->age}　{$this->sex} <br>");
         printf("(P%04d) %s %d歳 %s 時給:%d円<br>",self::$id,$this->name,$this->age,$this->sex,$this->jikyu);
  }
}

$staff=[]; 
$staff[0]= new Staff("佐藤　一郎","31","男性");
$staff[1]= new Staff("山田　花子","25","女性");
$staff[2]= new Staff("鈴木　次郎","27","男性");
$staff[3]= new PartStaff("田中　友子","24","女性",900);
$staff[4]= new Staff("中村　三郎","27","男性");

foreach($staff as $staffs){
 $staffs ->number();
 $staffs ->show();
}
// foreach($partstaff as $partstaffs){
//  $partstaffs ->number();
//  $partstaffs ->show();
// }



// $staff[1] ->number();
// $staff[1] ->show();
// $staff[2] ->number();
// $staff[2] ->show();
?>