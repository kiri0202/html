<?php
class Staff{
  protected $name;
  protected $age;
  protected $sex;
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
// 子クラス
class PartStaff extends Staff{
  private $part;
  $jikyu=900;
  public function __construct($name,$age,$sex,$part){
    parent::__construct($name,$age,$sex);
    $this->part=$part;
  }
 
  public function showPart(){
    printf("{$id}　{$this->name}　{$this->age}　{$this->sex}　{$this->part} <br>");
  }
  public function show(){
    printf("{$id}　{$this->name}　{$this->age}　{$this->sex}　{$this->part}$jikyu<br>");
  }
  
}

$staff=[];
$staff[0]= new Staff("佐藤　一郎","31歳","男性");
$staff[1]= new Staff("山田　花子","25歳","女性");
$staff[2]= new Staff("鈴木　次郎","27歳","男性");
$staff[3]= new PartStaff("田中　友子","24歳","女性","時給:");
$staff[4]= new Staff("中村　三郎","27歳","男性");


// function ALLStaff(staff $staff){
//   $staff->show();
// }
// foreach($staffs as $staff){
//   AllStaff($staff);
// }

$staff[0] ->show();
$staff[1] ->show();
$staff[2] ->show();
$staff[3] ->showPart();
$staff[4] ->show();

?>