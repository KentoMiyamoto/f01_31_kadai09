<?php
//入力チェック(受信確認処理追加)
if(
  !isset($_POST["name"]) || $_POST["name"]=="" ||
  !isset($_POST["lid"]) || $_POST["lid"]=="" ||
  !isset($_POST["lpw"]) || $_POST["lpw"]=="" ||  
   !isset($_POST["kanri"]) || $_POST["kanri"]==""||
   !isset($_POST["life"]) || $_POST["life"]==""
){
  exit('ParamError');
}

//1. POSTデータ取得
$id     = $_POST["id"];
$name   = $_POST["name"];
$lid   = $_POST["lid"];
$lpw   = $_POST["lpw"];
$kanri   = $_POST["kanri"];
$life   = $_POST["life"];


//2. DB接続します(エラー処理追加)

include('functions.php');
$pdo = userdb_conn();



//3．データ登録SQL作成
$stmt = $pdo->prepare('UPDATE gs_user_table SET name=:a1,lid=:a2,lpw=:a3,kanli_flg=:a4,life_flg=:a5 where id=:id');
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $lid, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $kanri, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a5', $life, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
if($status==false){
  errorMsg($stmt);
}else{
  header('location: user_select.php');
  exit;
}
?>
