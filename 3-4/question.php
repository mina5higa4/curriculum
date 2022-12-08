<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php
//POST送信で送られてきた名前を受け取って変数を作成
$name_in = $_POST['name_in'];
//①画像を参考に問題文の選択肢の配列を作成してください。
$list_q1 = array( "80", "22", "20", "21") ;
$list_q2 = array( "PHP", "Python", "JAVA", "HTML" );
$list_q3 = array( "join", "select", "insert", "update" );

//② ①で作成した、配列から正解の選択肢の変数を作成してください
$ans_q1 = 0 ;
$ans_q2 = 0 ;
$ans_q3 = 1 ;

// ラジオボタンのHTML
$buf_radio = "<input type=\"radio\" name=\"q%s\" id=\"radio%s\" value=\"%s\"><label for=\"radio%s\">%s</label>\n";

?>

<!-- 名前の入力がなかったらメッセージを出して終了 -->
<?php if( $name_in == ""){ ?>
    <p>お名前を入力してください</p>

<?php }else{ ?>
<!-- 名前の入力があれば問題を表示 -->
    <p>お疲れ様です<!--POST通信で送られてきた名前を出力--><?php echo $name_in ?>さん</p>
    <!--フォームの作成 通信はPOST通信で-->

    <form action="answer.php" method="POST" class="hoo">
    <input type="hidden" name="name_in" value="<?php echo $name_in?>">
    <input type="hidden" name="ans_q1" value="<?php echo $list_q1[$ans_q1]?>">
    <input type="hidden" name="ans_q2" value="<?php echo $list_q2[$ans_q2]?>">
    <input type="hidden" name="ans_q3" value="<?php echo $list_q3[$ans_q3]?>">

    <h2>①ネットワークのポート番号は何番？</h2>
    <!--③ 問題のradioボタンを「foreach」を使って作成する-->
    <?php foreach ( $list_q1 as $v ){ echo sprintf($buf_radio, 1, 1, $v, 1, $v); }?>

    <h2>②Webページを作成するための言語は？</h2>
    <!--③ 問題のradioボタンを「foreach」を使って作成する-->
    <?php foreach ( $list_q2 as $v ){ echo sprintf($buf_radio, 2, 2, $v, 2, $v); }?>

    <h2>③MySQLで情報を取得するためのコマンドは？</h2>
    <!--③ 問題のradioボタンを「foreach」を使って作成する-->
    <?php foreach ( $list_q3 as $v ){ echo sprintf($buf_radio, 3, 3, $v, 3, $v); }?>

    <!--問題の正解の変数と名前の変数を[answer.php]に送る-->
    <p><input type="submit" value=" 回答する "></p>
    </form>
<?php } ?>

</body>
