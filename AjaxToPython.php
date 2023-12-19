<?php
    //待ち時間無限
    ini_set('max_execution_time',0);
    //ajaxからのPOSTデータ受信
    $UserQ = $_POST['data'];
    $assist = $_POST['order'];
    //Python実行
    $filePath = "./teacherPys/TeacherAnswer.py";
    $command = "python3 ".$filePath ." 2 ".$assist." ".$UserQ;
    exec($command,$output,$retval);

    $answer = "";
    //エンコードしてajaxに返す
    foreach ($output as $o) {
        $answer .= mb_convert_encoding($o, "UTF-8", "auto");
        $answer .= '<br>';
    }
    echo $answer;
