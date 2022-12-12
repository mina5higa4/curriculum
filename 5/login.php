<?php
require_once('db_connect.php');
// セッション開始
session_start();
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
        //ログイン名とパスワードのエスケープ処理
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $pass = htmlspecialchars($_POST['password'], ENT_QUOTES);
        // ログイン処理開始
        $pdo = db_connect();
        try {
            //データベースアクセスの処理文章。ログイン名があるか判定
            $sql = "SELECT * FROM users WHERE name = :name";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            die();
        }

        // 結果が1行取得できたら
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // ハッシュ化されたパスワードを判定する定形関数のpassword_verify
            // 入力された値と引っ張ってきた値が同じか判定しています。
            if (password_verify($pass, $row['password'])) {
                // セッションに値を保存
                $_SESSION["user_id"] = $row['id'];
                $_SESSION["user_name"] = $row['name'];
                // main.phpにリダイレクト
                header("Location: main.php");
                exit;
            } else {
                // パスワードが違ってた時の処理
                $err_msg .= "パスワードに誤りがあります。";
            }
        } else {
            //ログイン名がなかった時の処理
            $err_msg .= "ユーザー名かパスワードに誤りがあります。";
        }
    }
}
?>
<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>ログインページ</title>
</head>

<body>
<div class="contents">
    <div class="header">
        <div class="h_2">
        </div>
        <div class="h_3">
        <p>ログイン画面</p>
        </div>
    </div>
    <div class="main">
        <div class="m_1">
        <p class="err_msg"><?php echo $err_msg;?></p>
        <form method="post" action="login.php">
            ユーザー名：<input type="text" name="name" size="15"><br>
            パスワード：<input type="password" name="password" size="15"><br>
            <input type="submit" value="ログイン"><br>
        </form>
        </div>
    </div><!--main-->
    <div class="footer">
    <p><a href="sineUp.php">新規ユーザ登録</a></p>
    </div>
</div><!--contents-->

</body>
</html>
