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
//[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
$q1 = $q2 = $q3 = "";
if (isset($_POST['q1']))  $q1 = $_POST['q1'] ;
if (isset($_POST['q2']))  $q2 = $_POST['q2'] ;
if (isset($_POST['q3']))  $q3 = $_POST['q3'] ;
$ans_q1 = $_POST['ans_q1'];
$ans_q2 = $_POST['ans_q2'];
$ans_q3 = $_POST['ans_q3'];
$name_in = $_POST['name_in'];

//選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する
function maru_batu( $ans_in, $ans_seikai ){
    if( $ans_in == $ans_seikai ) echo "正解！";
    else echo "残念・・・";
    return ;
}
?>

<!-- 回答の入力がなかったらメッセージを出して終了 -->
<?php if( $q1 == "" || $q2 == "" || $q3 == ""  ){ ?>
    <p><?php echo $name_in?>さん、回答を選んでください</p>

<?php }else{ ?>
<!-- 回答の入力があれば、正誤を表示 -->

<p><!--POST通信で送られてきた名前を表示--><?php echo $name_in?>さんの結果は・・・？</p>
<p>①の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php maru_batu($ans_q1, $q1); ?>

<p>②の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php maru_batu($ans_q2, $q2); ?>

<p>③の答え</p>
<!--作成した関数を呼び出して結果を表示-->
<?php maru_batu($ans_q3, $q3); ?>



<?php } ?>

</body>
