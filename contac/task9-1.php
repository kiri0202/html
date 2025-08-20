<?php
  $name=$_POST["name"];
  $furigana=$_POST["furigana"];
  $email=$_POST["email"];
  $tel=$_POST["tel"];
  $subject=$_POST["subject"];
  $message=$_POST["message"];
  $currentDateTime = date('m-d H:i:s');
 

  try{
    $pdo = new PDO(
      'mysql:host=localhost;dbname=consumer;charset=utf8mb4',
      'root',
      'root'
    );

    // $pdo->query("DROP TABLE IF EXISTS consumer");
    // $pdo->query(
    //   "CREATE TABLE consumer(
    //   id  INT PRIMARY KEY,
    //   name  VARCHAR(128),
    //   furigana VARCHAR(128),
    //   email TEXT,
    //   tel CHAR(64),
    //   subject VARCHAR(10),
    //   message TEXT,
    //   day VARCHAR(32)
    //   )"
    // );

    $stmt = $pdo->prepare("INSERT INTO consumer(name,furigana,email,tel,subject,message,day) VALUES(?,?,?,?,?,?,?);");
    $stmt->bindParam(1,$name,PDO::PARAM_STR);
    $stmt->bindParam(2,$furigana,PDO::PARAM_STR);
    $stmt->bindParam(3,$email,PDO::PARAM_STR);
    $stmt->bindParam(4,$tel,PDO::PARAM_STR);
    $stmt->bindParam(5,$subject,PDO::PARAM_STR);
    $stmt->bindParam(6,$message,PDO::PARAM_STR);
    $stmt->bindParam(7,$currentDateTime,PDO::PARAM_STR);
    $result=$stmt->execute();
    
  }catch(PDOException $e){
    echo $e->getMessage().'<br>';
    exit;
  }

  echo "送信完了しました";
?>