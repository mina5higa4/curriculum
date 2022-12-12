<?php
// セッション開始
session_start();
// セッション変数のクリア
$_SESSION = array();
// セッションクリア
session_destroy();
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>ログアウト</title>
</head>

<body>
<div class="contents">
    <div class="header">
        <div class="h_2">
        </div>
        <div class="h_3">
        <p>ログアウト</p>
        </div>
    </div>
    <div class="main">
    <div class="m_1">
    <p>ログアウトしました</p>
    </div>
    </div><!--main-->
    <div class="footer">
    <p><a href="login.php">ログイン</a></p>
    </div>
</div><!--contents-->

</body>
</html>
