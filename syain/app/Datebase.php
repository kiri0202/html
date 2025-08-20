<?php
define('DSN','mysql:host=localhost;dbname=company;charset=utf8mb4');
define('USER','root');
define('PASS','root');


class Database
{
  private $pdo;

  private function connect()
  {
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

  function getallsyain()
  { 
    try {
      $this->connect();
      $stmt = $this->pdo->query("SELECT id, name FROM syain ORDER BY id;");
      $members = $stmt->fetchAll();
      return $members;
    } catch (PDOException $e){
    echo $e->getMessage().'<br>';
    exit;
    }
  }

  function getsyain($id)
  {
    try {
      $this->connect();
      $stmt = $this->pdo->prepare("SELECT id, name ,work, age FROM syain WHERE id = ? ;");
      $stmt->bindParam(1,$id,PDO::PARAM_INT);
      $member =$stmt->execute();
      if ($member) {
        $member = $stmt->fetchAll();
        if (count($member) == 0) {
          return null;
        }
        return $member[0];
      }
      return null;
    } catch (PDOException $e){
    echo $e->getMessage().'<br>';
    exit;
    }
  }

  function idexist($id)
  {
    if($this->getsyain($id) != null){
      return true;
    }
    return false;
  }

  function createsyain($id,$name,$age,$work)
  {
    try {
      $stmt = $this->pdo->prepare("INSERT INTO syain  VALUES (?,?,?,?);");
      $stmt->bindParam(1,$id,PDO::PARAM_INT);
      $stmt->bindParam(2,$name,PDO::PARAM_STR);
      $stmt->bindParam(3,$age,PDO::PARAM_INT);
      $stmt->bindParam(4,$work,PDO::PARAM_STR);
      $result = $stmt->execute();
      return true;
      exit;
    } catch (PDOException $e){
      echo $e->getMessage().'<br>';
      exit;
    }
    return false;
  }

  function deletesyain($id)
  {
    // echo $id;
    // exit;
    try {
      $stmt = $this->pdo->prepare("DELETE FROM syain WHERE id = ?");
      $stmt->bindParam(1,$id,PDO::PARAM_INT);
      $result = $stmt->execute();
   
      return true;
     
    
    } catch (PDOException $e){
      echo $e->getMessage().'<br>';

    
    }
    return false;
  }
  function updatesyain($id,$name,$age,$work,$old_id)
  {
    $id=$old_id;
    try {
      $stmt = $this->pdo->prepare("UPDATE syain SET id=?, name=?, age=?, work=?WHERE id = ?;");
      $stmt->bindParam(1,$id,PDO::PARAM_INT);
      $stmt->bindParam(2,$name,PDO::PARAM_STR);
      $stmt->bindParam(3,$age,PDO::PARAM_INT);
      $stmt->bindParam(4,$work,PDO::PARAM_STR);
      $stmt->bindParam(5,$old_id,PDO::PARAM_STR);
      $result = $stmt->execute();
      return true;
      exit;
    } catch (PDOException $e){
      echo $e->getMessage().'<br>';
      exit;
    }
    return false;
  }
}