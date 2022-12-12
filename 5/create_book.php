<?php

// セッションチェック
require_once('DB_iroiro.php');
require_once('function.php');
$user_name = check_user_logged_in();

// 画面モード
$gamen_mode = 0 ; // 入力フォーム
// エラーメッセージ用
$err_msg = "";

// 入力チェック
if( isset($_POST['title']) &&  isset($_POST['date']) &&  isset($_POST['stock']) ){
    $title = $_POST['title'];
    $date = $_POST['date'];
    $stock = $_POST['stock'];
    $data_db = new DB_iroiro();
    $retval = $data_db->insertBookData($title, $date, $stock);
    if( $retval === true ){
        $gamen_mode = 1 ; // '成功画面';
    }else{
        $gamen_mode = -1 ; // 'エラー画面';
        $err_msg .= "DBエラーです。";
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
    <title>本 登録画面</title>
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
        <p>本 登録画面</p>
        </div>
    </div>
    <div class="main">

<?php
switch($gamen_mode){
    case 1 : // 成功
?>
<p>登録成功しました。</p>
<?php
        break;
    case -1 : // エラー
?>
<p>登録失敗しました。</p>
<p class='err_msg'><?php echo $err_msg;?></p>
<?php
        break;
    default : // 入力フォーム
?>
    <form method="POST" action="create_book.php">
        タイトル:<br>
        <input type="text" name="title" id="title" style="width:200px">
        <br>
        発売日:<br>
        <input type="date" name="date" value="2020-01-01">
        <br>
        在庫数:<br>
        <select name="stock">
            <?php for( $i=0; $i<=100; $i++ ){ ?>
            <option value="<?php echo $i;?>"><?php echo $i;?></option>
            <?php } ?>
        </select><br>
        <input type="submit" value="登録" id="post" name="post">
    </form>
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
