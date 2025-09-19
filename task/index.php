<?php
require_once('common.php');

show_top("タスク登録");
show_create($task,$end,$naiyou,$start,$button,$status);
show_down("task");

//  try{
//     $pdo = new PDO(
//       'mysql:host=localhost;dbname=task;charset=utf8mb4',
//       'root',
//       'root',
//       [
//         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//         PDO::ATTR_EMULATE_PREPARES=> false
//       ]
//     );

//     $pdo->query("DROP TABLE IF EXISTS task");
//     $pdo->query(
//       "CREATE TABLE task(
//         id INT AUTO_INCREMENT PRIMARY KEY,
//         task VARCHAR(128),
//         start TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//         status VARCHAR(128),
//         end DATE,
//         naiyou VARCHAR(1024),
//         zyoutai VARCHAR(128)
//       )"
//     );
//  }catch(PDOException $e){
//     echo $e->getMessage().'<br>';
//     exit;
//   }

?>
