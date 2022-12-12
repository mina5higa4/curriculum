<?php

// セッションチェック
require_once('DB_iroiro.php');
require_once('function.php');
$user_name = check_user_logged_in();

// 画面モード
$gamen_mode = 0 ; // 入力フォーム

// 入力チェック
// もし、$book_idが空であったらmain.phpにリダイレクト
$book_id = $_GET['book_id'];
redirect_main_unless_parameter($book_id);

$data_db = new DB_iroiro();
$pdata = $data_db->getBookData($book_id);
if( count($pdata) > 0  ){
    $gamen_mode = 1 ; // '成功画面';
}else{
    $gamen_mode = -1 ; // 'エラー画面';
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>在庫情報編集</title>
</head>

<body>
<div class="contents">
    <div class="header">
        <div class="h_1">
        </div>
        <div class="h_2">
        <p>ようこそ<?php echo $user_name; ?>さん</p>
        </div>
        <div class="h_3">
        <p>在庫情報編集(書籍ID:<?php echo $book_id;?>)</p>
        </div>
    </div>
    <div class="main">

<?php
switch($gamen_mode){
    case 1 : // 成功
?>
<form method="POST" action="edit_done_book.php">
    <input type="hidden" name="book_id" value="<?php echo $book_id;?>">
        タイトル<br>
        <input type="text" name="title" id="title" style="width:200px;height:50px;" value="<?php echo $pdata['title'];?>">
        <br>
        発売日:<br>
        <input type="date" name="date" id="date" style="width:200px;height:100px;" value="<?php echo $pdata['date'];?>"><br>
        <br>
        在庫数:<br>
        <select name="stock">
        <?php
            for( $i=0; $i<=100; $i++ ){
              if( $i == $pdata['stock'] ){ ?>
                <option value="<?php echo $i;?>" selected><?php echo $i;?></option>
        <?php }else{ ?>
                <option value="<?php echo $i;?>"><?php echo $i;?></option>
        <?php }}?>
        </select>
        <input type="submit" value="submit" id="post" name="post">
    </form>

<?php
        break;
    case -1 : // エラー
?>
読み込み失敗しました。
<?php
        break;
    default : // 入力フォーム
?>
<?php
        break;
    }
?>


</div><!--main-->
    <div class="footer">
    <p>
    <a href="main.php">メイン</a> | 
    <a href="create_book.php">新規書籍登録</a> | 
    <a href="logout.php">ログアウト</a>
    </p>
    </div>
</div><!--contents-->

</body>
</html>
