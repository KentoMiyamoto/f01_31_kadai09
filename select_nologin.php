<?php
session_start();
include('functions.php');

//1.  DB接続します
// try {
//   $pdo = new PDO('mysql:dbname=gs_f01_db31;charset=utf8;host=localhost','root','');
// } catch (PDOException $e) {
//   exit('dbError:'.$e->getMessage());
// }


$pdo = db_conn();
// chk_ssid();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT*FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("sqlError:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= "<p>";
    $view .='<a href="detail_nologin.php?id='.$result['id'].'">';
    $view .= $result["indate"]."-".$result["name"]."-".$result["url"]."-".$result["comment"]."-".$result["action"]."</p>";
    $view .='</a>';
    // $view .= '　';
    // $view .= '<a href="delete.php?id='.$result['id'].'">';  //削除用aタグを作成
    // $view .= '［削除］';
    // $view .= '</a>';
    $view .= '</p>'; 
  
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>読みたい本リスト</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <!-- <a class="navbar-brand" href="index.php">読んだ本登録</a> -->
      <!-- <a class="navbar-brand" href="logout.php">ログアウト</a> -->
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->

</body>
</html>
