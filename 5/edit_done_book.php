<?php

// セッションチェック
require_once('DB_iroiro.php');
require_once('function.php');
$user_name = check_user_logged_in();

// 画面モード
$gamen_mode = 0 ; // 入力フォーム


// 入力チェック
if( isset($_POST['book_id']) && isset($_POST['title']) &&  isset($_POST['date']) &&  isset($_POST['stock']) ){
    $book_id = $_POST['book_id'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $stock = $_POST['stock'];
    $data_db = new DB_iroiro();
    $retval = $data_db->updateBookData($book_id, $title, $date, $stock);
    if( $retval === true ){
        $gamen_mode = 1 ; // '成功画面';
    }else{
        $gamen_mode = -1 ; // 'エラー画面';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>在庫情報更新</title>
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
        <p>書籍情報更新(書籍ID:<?php echo $book_id;?>)</p>
        </div>
    </div>
    <div class="main">

<?php
switch($gamen_mode){
    case 1 : // 成功
?>
書籍情報更新成功しました。
<?php
        break;
    case -1 : // エラー
?>
書籍情報更新失敗しました。
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
