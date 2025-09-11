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
//         name VARCHAR(128),
//         start VARCHAR(128),
//         status VARCHAR(128),
//         end VARCHAR(128)
//       )"
//     );
//  }catch(PDOException $e){
//     echo $e->getMessage().'<br>';
//     exit;
//   }

?>
