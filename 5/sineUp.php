<?php
require_once('DB_iroiro.php');
$gamen_id = 0 ; // 入力フォーム
// エラーメッセージ用
$err_msg = "";

// $_POSTが空ではない場合
// つまり、ログインボタンが押された場合のみ、下記の処理を実行する
if (!empty($_POST)) {
    // ログイン名が入力されていない場合の処理
    if (empty($_POST["name"])) {
        $gamen_id = -1 ;
        $err_msg .= "名前が未入力です。";
    }
    // パスワードが入力されていない場合の処理
    if (empty($_POST["password"])) {
        $gamen_id = -1 ;
        $err_msg .= "パスワードが未入力です。";
    }

    // 両方共入力されている場合
    if (!empty($_POST["name"]) && !empty($_POST["password"])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $data_db = new DB_iroiro();
        $retval = $data_db->insertUserData($name, $password);
        if( $retval === true ){
            $gamen_id = 1 ; // '成功画面';
        }else{
            $gamen_id = -1 ; // 'エラー画面';
        }
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
    <title>新規ユーザ登録</title>
</head>

<body>
<div class="contents">
    <div class="header">
        <div class="h_2">
        </div>
        <div class="h_3">
        <p>新規ユーザ登録</p>
        </div>
    </div>
    <div class="main">
    <div class="m_1">

<?php
switch($gamen_id){
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
    <form method="POST" action="sineUp.php">
        ユーザー名<br>
        <input type="text" name="name" id="name">
        <br>
        パスワード<br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="新規登録" id="signUp" name="signUp">
    </form>
<?php
        break;
    }
?>                    
</div>
</div><!--main-->
    <div class="footer">
    <p><a href="login.php">ログイン</a></p>
    </div>
</div><!--contents-->

</body>
</html>
