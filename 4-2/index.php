<?php
// セッション開始
require_once('pdo.php');
require_once('getData.php');
//require_once('checktest4.php');
$category_name = array('1'=>'食事', '2'=>'旅行', ''=>'その他');

$data_db = new getData();
$user_data = $data_db->getUserData();
$post_data = $data_db->getPostData()->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>

<body>
<div class="contents">
    <div class="header">
        <div class="h_1">
            <img src="img/1599315827_logo.png">
        </div>
        <div class="h_2">
            ようこそ<?php echo $user_data['last_name'] . $user_data['first_name']?> さん
        </div>
        <div class="h_3">
        最終ログイン日：<?php echo $user_data['last_login']?>
        </div>
    </div>
    <div class="main">
        <table class="tb_list">
            <tr>
                <th>記事ID</th>
                <th>タイトル</th>
                <th>カテゴリ</th>
                <th>本文</th>
                <th>投稿日</th>
            </tr>
            <?php
                $tmpbuf = "";
                for( $i=0; $i<count($post_data); $i++){
                    $tmpbuf .= "<tr>";
                    foreach( $post_data[$i] as $key => $value ){
                        if( $key === 'category_no'){
                            $cidx = "";
                            if( $value == 1 ||  $value == 2 ){
                                $cidx = $value;
                            }
                            $tmpbuf .= sprintf("<td>%s</td>", $category_name[$cidx]);
                        }else{
                            $tmpbuf .= "<td>$value</td>";
                        }
                    }
                    $tmpbuf .= "</tr>\n";
                }
                echo $tmpbuf ;
            ?>
        </table>
    </div>
    <div class="footer">Y&I group,Inc.</div>
</div>
</body>

</html>
