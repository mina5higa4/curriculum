<?php
    // index.php
    $testFile_w = "test.txt";
    $contents = "こんにちは！\n";
    

    if (is_writable($testFile_w)) {
        // 書き込み可能なときの処理
        // 対象のファイルを開く
        $fp = fopen($testFile_w, "a");
        // 対象のファイルに書き込む
        fwrite($fp, $contents);
        // ファイルを閉じる
        fclose($fp);
        // 書き込みした旨の表示
        echo "finish writing!!";
    } else {
        // 書き込み不可のときの処理
        echo "not writable!";
        exit;
    }

    echo "<br>\n";

    $testfile_r = "test2.txt";
    
    if (is_readable($testfile_r)) {
        // 読み込み可能なときの処理
        // 対象のファイルを開く
        $fp = fopen($testfile_r, "r");
        // 開いたファイルから1行ずつ読み込む
        while ($line = fgets($fp)) {
            // 改行コード込みで1行ずつ出力
            echo $line.'<br>';
        }
        // ファイルを閉じる
        fclose($fp);
    } else {
        // 読み込み不可のときの処理
        echo "not readable!";
        exit;
    }


    ?>