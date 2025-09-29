<?php
define('DSN','mysql:host=localhost;dbname=task;charset=utf8mb4');
define('USER','root');
define('PASS','root');

class Database
{
  private $pdo;

  private function connect(){
    if(!isset($this->pdo)){
    $this->pdo = new PDO(
      DSN,
      USER,
      PASS,
      [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES=> false
      ]
      );
    }
  }

 

  function createtask($task,$end,$naiyou,$start,$zyoutai){
    try {
    $this->connect();
    $stmt = $this->pdo->prepare("INSERT INTO task (task, end, naiyou, start, zyoutai) VALUES(?,?,?,?,?)");
    $stmt ->bindParam(1,$task,PDO::PARAM_STR);
    $stmt ->bindParam(2,$end,PDO::PARAM_STR);
    $stmt ->bindParam(3,$naiyou,PDO::PARAM_STR);
    $stmt ->bindParam(4,$start,PDO::PARAM_STR);
    $stmt ->bindParam(5,$zyoutai,PDO::PARAM_STR);
    $result = $stmt ->execute();
    return true;

    } catch (PDOException $e){
      echo $e->getMessage().'<br>';
      exit;
    }
  }

  function get($where,$orderby){
    try{
      $this->connect();
      $sql="SELECT id, task , end ,  start , zyoutai FROM task";
      if(!empty($where)){
        $sql.=" WHERE $where";
      }
      if(!empty($orderby)){
        $sql.=" ORDER BY $orderby";
      }
      $stmt = $this->pdo->query($sql);
      $task = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $task;
    }catch (PDOException $e){
      echo $e->getMessage().'<br>';
      exit;
    }
  }

  function gettask(){
    $where="";
    $orderby="id";
    
    return $this->get($where, $orderby);
  }

  function gettaskdown(){
    $where="";
    $orderby="id DESC";
    
    return $this->get($where, $orderby);
  }

  function taskkanryou(){
    $where="zyoutai = '完了'";
    $orderby="id;";

    return $this->get($where, $orderby);
  }

  function taskmikanryou(){
    $where="zyoutai = '未完了'";
    $orderby="id;";

    return $this->get($where, $orderby);
  }

  function getend(){
    $where="";
    $orderby="end;";
      
    return $this->get($where, $orderby);
  }

  function getup(){
    $where="";
    $orderby="end DESC;";

    return $this->get($where, $orderby);
  }
  
  
  function taskdata($id){
    try {
      $this->connect();
      $stmt = $this->pdo->prepare("SELECT id , task , end ,  start , zyoutai ,naiyou FROM task WHERE id = ? ;");
      $stmt->bindParam(1,$id,PDO::PARAM_INT);
      $gettask=$stmt->execute();
      $gettask=$stmt->fetchAll();
      
      return $gettask[0];

    }catch (PDOException $e){
    echo $e->getMessage().'<br>';
    exit;
    }
  }

  function searchdata($keyword){
    try {
      $this->connect();
      $stmt = $this->pdo->prepare("SELECT id , task , end , naiyou , start , zyoutai FROM task WHERE task LIKE ? OR naiyou LIKE ?
    ");
      $likeKeyword = '%' . $keyword . '%';
      $stmt->bindParam(1, $likeKeyword, PDO::PARAM_STR);
      $stmt->bindParam(2, $likeKeyword, PDO::PARAM_STR);
      $gettask=$stmt->execute();
      $gettask=$stmt->fetchAll();
      
      return $gettask[0];

    }catch (PDOException $e){
    echo $e->getMessage().'<br>';
    exit;
    }
  }

  function deletetask($id)
  {
    $this->connect();
    try {
      $stmt = $this->pdo->prepare("DELETE FROM task WHERE id = ?");
      $stmt->bindParam(1,$id,PDO::PARAM_INT);
      $result = $stmt->execute();
      return true;
    } catch (PDOException $e){
      echo $e->getMessage().'<br>';
    }
    return false;
  }


  function updatatask($task,$end,$naiyou,$zyoutai,$id)
  {
    $this->connect();
    try {
      $stmt = $this->pdo->prepare("UPDATE task SET task=?, end=?, naiyou=?,  zyoutai=?  WHERE id = ? ");
      $stmt->bindParam(1,$task,PDO::PARAM_STR);
      $stmt->bindParam(2,$end,PDO::PARAM_STR);
      $stmt->bindParam(3,$naiyou,PDO::PARAM_STR);
      $stmt->bindParam(4,$zyoutai,PDO::PARAM_STR);
      $stmt->bindParam(5,$id,PDO::PARAM_INT);
      
      
      $result = $stmt->execute();
      return true;
      
    } catch (PDOException $e){
      echo $e->getMessage().'<br>';
      exit;
    }
    return false;
  }

}
?>