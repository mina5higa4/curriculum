<!DOCTYPE html>
<body>

<form>
<?php
/* 3-2 （３章練習問題１） */

/* フルーツの単価と個数はランダムに決める */
$price_apple = mt_rand(1, 10) * 50 ;
$price_orange = mt_rand(1, 10) * 50 ;
$price_peach = mt_rand(1, 10) * 50 ;

$cnt_apple = mt_rand(1, 10) ;
$cnt_orange = mt_rand(1, 10) ;
$cnt_peach = mt_rand(1, 10) ;

/* 連想配列に格納 */
$fruits = [
    "apple"  => ["りんご", $price_apple, $cnt_apple],  // フルーツ名, 単価, 個数
    "orange" => ["みかん", $price_orange, $cnt_orange], 
    "peach"  => ["もも", $price_peach, $cnt_peach]
];

/* フルーツごとに計算して出力 */
$price_all = 0 ;
foreach ($fruits as $key => $value) {
    $price = price_keisan( $fruits[$key][1],  $fruits[$key][2] );
    echo $fruits[$key][0] . "：単価" . $fruits[$key][1] . "円×個数" . $fruits[$key][2] . "個 → 合計" . $price . "円<br>\n";
    $price_all += $price ;
}
echo "★★★すべての合計：$price_all 円★★★<br>\n";

/* 価格を計算する関数 */
function price_keisan( $price, $cnt ){
    return $price * $cnt ;
}

?>
</body>
</html>
