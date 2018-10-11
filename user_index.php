<?php
session_start();
include('functions.php');

chk_ssid();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<form method="post" action="user_insert.php">
<!-- <div > -->
<!-- <ul> -->
<legend id="bm">ユーザー登録</legend>
    <div id="aaa">
     <p  id="aa1">name：<input type="text" name="name"></p>
     <p  id="aa2">lid：<input type="text" name="lid"></p>
     <p  id="aa3">lpw：<input type="text" name="lpw"></p>
     <P id="aa4">kanli_flg:　管理者<input type=radio name="kanri" value=1>　一般<input type=radio name="kanri" value=0></P>
     <P id="aa5">life_flg:　通常<input type=radio name="life" value=1>　退会<input type=radio name="life" value=0></P>
     <input type="submit" value="登録" id="bbb">
     </div>

<!-- </ul> -->
  <!-- </div> -->
</form>
 <a href="user_select.php">ユーザー一覧</a>

</body>
</html>