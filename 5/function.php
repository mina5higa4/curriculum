<?php
// function.php
/**
 * $_SESSION["user_name"]が空だった場合、ログインページにリダイレクトする
 * @return void
 */
function check_user_logged_in() {
    // セッション開始
    session_start();
    // セッションにuser_nameの値がなければlogin.phpにリダイレクト
    if (empty($_SESSION["user_name"])) {
        header("Location: login.php");
        exit;
    }
    return $_SESSION["user_name"];
}

/**
 * 引数の値が空だった場合、main.phpにリダイレクトする
 * @param integer $param
 * @return void
 */
function redirect_main_unless_parameter($param) {
    if (empty($param)) {
        header("Location: main.php");
        exit;
    }
}
function redirect_main(){
    header("Location: main.php");
    exit;
}
?>
