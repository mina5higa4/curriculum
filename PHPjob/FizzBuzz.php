<!DOCTYPE html>
<body>
<?php
/* ３章 中間テスト（FizzBuzz問題）*/
    for( $i=1; $i<=100; $i++ ){
        if( $i%3==0 ) $i%5==0 ? $msg="FizzBuzz!!" : $msg="Fizz!" ;
        elseif( $i%5 == 0 ) $msg = "Buzz!" ;
        else $msg = $i;
//        echo "$i --> ";
        echo "$msg<br>\n";
    }

?>
</body>
</html>
