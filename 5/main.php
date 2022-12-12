<?php
/*
// セッション開始
session_start();
// セッションにuser_nameの値がなければlogin.phpにリダイレクト
if (empty($_SESSION["user_name"])) {
    header("Location: login.php");
    exit;
}
*/
// セッションチェック
require_once('DB_iroiro.php');
require_once('function.php');
$user_name = check_user_logged_in();

// 画面モード
$gamen_mode = 0 ; // 入力フォーム

// 入力チェック
if( $user_name !== NULL ){
    $data_db = new DB_iroiro();
    $book_list = $data_db->getBookList();
}
?>

<!doctype html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>在庫一覧画面</title>
</head>
<body>

<div class="contents">
    <div class="header">
        <div class="h_2">
        <p>ようこそ<?php echo $user_name; ?>さん</p>
        </div>
        <div class="h_3">
        <p>在庫一覧画面</p>
        </div>
    </div>
    <div class="main">
        <table class="tb_list">
            <tr>
                <th>書籍ID</th>
                <th>タイトル</th>
                <th>発売日</th>
                <th>在庫数</th>
                <th> </th>
            </tr>
            <?php
                $tmpbuf = "";
                for( $i=0; $i<count($book_list); $i++){
                    $tmpbuf .= "<tr>";
                    $tmpbuf .= sprintf("<td class='c1'><a href='edit_book.php?book_id=%s'>%s</a></td>", $book_list[$i]['id'], $book_list[$i]['id']);
                    $tmpbuf .= sprintf("<td>%s</td>", $book_list[$i]['title']);
                    $tmpbuf .= sprintf("<td>%s</td>", $book_list[$i]['date']);
                    $tmpbuf .= sprintf("<td class='c1'>%s</td>", $book_list[$i]['stock']);
                    $tmpbuf .= sprintf("<td><a href='delete_book.php?book_id=%s'><img src='./img/btn_delete.png'></a></td>", $book_list[$i]['id']);
                    $tmpbuf .= "</tr>\n";
                }
                if( $tmpbuf==="" ){
                    $tmpbuf .= "<tr><td colspan='5'>在庫データが登録されていません。</td></tr>";
                }
                echo $tmpbuf ;
            ?>
        </table>
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