<!DOCTYPE html>
<body>
<!-- 3-3-out （３章練習問題２）占い結果出力 -->

<?php
$uranai_in = $_GET['uranai_in'];
list($kekka, $pos, $idx) = uranai($uranai_in);

function uranai($uranai_in){
    $pos = rand(1, strlen($uranai_in));
    $idx = substr($uranai_in, $pos-1, 1);
    switch( $idx ){
        case '0': 
            $kekka = "凶";
            break ;
        case '1': case '2': case '3': 
            $kekka = "小吉";
            break ;
        case '4': case '5': case '6': 
            $kekka = "中吉";
            break ;
        case '7': case '8': 
            $kekka = "吉";
            break ;
        case '9': 
            $kekka = "大吉";
            break ;
    }
    return array($kekka, $pos, $idx) ;
}
?>

<p>★★★占い結果★★★</p>
<?php echo date("Y/m/d", time()); ?>の運勢は・・・<br>
入力された数字：<?php echo $uranai_in ?><br>
先頭からの位置（ランダム）：<?php echo $pos ?><br>
マッチした数字：<?php echo $idx ?><br><br>
↓↓↓↓↓↓↓↓↓↓<br><br>
占い結果：<?php echo $kekka ?><br>
</body>
</html>
