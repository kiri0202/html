<?php
  try{
    $pdo = new PDO(
      'mysql:host=localhost;dbname=company;charset=utf8mb4',
      'root',
      'root',
      [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES=> false
      ]
    );

    // $pdo->query("DROP TABLE IF EXISTS syain");
    // $pdo->query(
    //   "CREATE TABLE syain(
    //     id  INT PRIMARY KEY,
    //     name VARCHAR(128),
    //     age INT,
    //     work VARCHAR(64)
    //   )"
    // );

    $pdo->query(
      "INSERT INTO syain (id,name,age,work) VALUES
      (10001,'佐藤 一郎',31,'社員'),
      (10002,'山田 花子',25,'社員'),
      (10003,'鈴木 次郎',27,'社員'),
      (20001,'田中 友子',24,'パート')
      "
    );
  
    $id =10004;
    $name = "川島 三郎";
    $age = 35;
    $work ="社員";

    $stmt = $pdo->prepare("INSERT INTO syain (id, name, age, work) VALUES (?, ?, ?, ?);");
    $stmt->bindParam(1,$id,PDO::PARAM_INT);
    $stmt->bindParam(2,$name,PDO::PARAM_STR);
    $stmt->bindParam(3,$age,PDO::PARAM_INT);
    $stmt->bindParam(4,$work,PDO::PARAM_STR);
    $result = $stmt->execute();

    $stmt = $pdo->query("SELECT * FROM syain");
    $results = $stmt->fetchALL();
    // print_r($result);
    // var_dump($results);
    foreach($results as $result){
      printf(
        '(%d) %s %d歳 %s <br>',
        $result['id'],     
        $result['name'],     
        $result['age'],     
        $result['work']  
      );
    }

  }catch(PDOException $e){
    echo $e->getMessage().'<br>';
    exit;
  }

?>