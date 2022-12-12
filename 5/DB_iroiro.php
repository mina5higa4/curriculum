<?php
//require_once("pdo.php");
require_once("db_connect.php");

class DB_iroiro{

    public $pdo;
    public $data;

    //コンストラクタ
    function __construct()  {
        $this->pdo = db_connect();
    }

    /**
     * 新規ユーザ情報の登録
     *
     * table: users
     * 入力: $name, $password
     * 戻り値: true/false (成功/失敗)
     */
    public function insertUserData($name, $password){
        try {
            $insertuser_sql = "INSERT into users (name, password) values(:name, :password)";
            $stmt = $this->pdo->prepare($insertuser_sql);
            $stmt->bindParam(':name', $name);
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bindParam(':password', $password_hash);
            $stmt->execute();
        } catch (PDOException $e) {
//            echo 'Error: ' . $e->getMessage();
//            die();
            return false ;
        }
        return true ;
    }
    
    /**
     * 書籍在庫一覧の取得
     *
     * table: books
     * 入力: なし
     * 戻り値: true/false (成功/失敗)
     * @return array $plist 記事情報
     */
    public function getBookList(){
        try {
            $plist_sql = "SELECT * FROM books ORDER BY date desc";
            $plist = $this->pdo->query($plist_sql)->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $plist = array();
//            echo 'Error: ' . $e->getMessage();
//            die();
        }
        return $plist;
    }

    /**
     * 指定書籍の取得
     *
     * table: books
     * 入力: 記事ID
     * 戻り値: true:成功, false:失敗
     * @return array $plist 記事情報
     */
    public function getBookData($book_id){
        try {
            // SQL文の準備
            $sql = "SELECT * FROM books WHERE id = :id";
            // プリペアドステートメントの作成
            $stmt = $this->pdo->prepare($sql);
            // idのバインド
            $stmt->bindParam(':id', $book_id);
            $stmt->execute();
            $pdata = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // エラーメッセージの出力
            $pdata = array();
//            echo 'Error: ' . $e->getMessage();
//            die;
//            return false ;
        }
        return $pdata;
    }

    /**
     * 新規書籍の登録
     * 
     * table: books
     * 入力: $title, $date, $stock
     * 戻り値: true/false (成功/失敗)
     */
    public function insertBookData($title, $date, $stock){
        // タイトルが空のときはエラー
        if( $title === "") return false ;
        try {
            $sql = "INSERT into books (title, date, stock) values(:title, :date, :stock)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':stock', $stock);
            $stmt->execute();
        } catch (PDOException $e) {
//            echo 'Error: ' . $e->getMessage();
//            die();
            return false ;
        }
        return true ;
    }

    /**
     * 既存書籍の更新
     * 
     * table: books
     * 入力: $book_id, $title, $date, $stock    
     * 戻り値: true/false (成功/失敗)
     */
    public function updateBookData($book_id, $title, $date, $stock){
        try {
            $sql = "UPDATE books set title = :title, date = :date, stock = :stock where id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $book_id);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':stock', $stock);
            $stmt->execute();
        } catch (PDOException $e) {
//            echo 'Error: ' . $e->getMessage();
//            die();
            return false ;
        }
        return true ;
    }


    /**
     * 既存書籍の削除
     * 
     * table: books
     * 入力: $book_id
     * 戻り値: true/false (成功/失敗)
     */
    public function deleteBookData($book_id){
        try {
            $sql = "DELETE from books where id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $book_id);
            $stmt->execute();
        } catch (PDOException $e) {
//            echo 'Error: ' . $e->getMessage();
//            die();
            return false ;
        }
        return true ;
    }



}
