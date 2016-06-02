<?php

//アプリ側から
// http://localhost/api_sample/get_data.php?user_id=1&when=a&where=u&who=oo&detail=9uy&open_flag=0
//　という形でデータが送られてきた際に受け取るプログラム（API）

//データベースに接続
  $dsn = 'mysql:dbname=api_sample;host=localhost';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn,$user,$password);
  $dbh->query('SET NAMES utf8');


//各項目を取得(URLデコードを行う)

  $user_id = $_GET['user_id'];
  $when = urldecode($_GET['when']);
  $where = urldecode($_GET['where']);
  $who = urldecode($_GET['who']);
  $detail = urldecode($_GET['detail']);
  $open_flag = $_GET['open_flag'];


  $sql = "INSERT INTO `posts`(`id`, `user_id`, `item_when`, `item_where`, `item_who`, `detail`, `open_flag`) ";
  $sql .= "VALUES (null,".$user_id.",'".$when."','".$where."','".$who."','".$detail."',".$open_flag.")";

  $stmt = $dbh->prepare($sql);
  $stmt->execute();

  //データベースから切断
  $dbh = null;
?>