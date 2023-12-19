<?php

if(isset($_POST['your_name']) && isset($_POST['subject'])) {
    $your_name = $_POST['your_name'];
    $subject = $_POST['subject'];
    $tutor_name = $_POST['tutor_name'];
    $tutor_greet = $_POST['tutor_greet'];
    $tutor_icon = $_POST['tutor_icon'];
    $first_contact = $_POST['first_contact'];
    $assist_order = $_POST['assist_order'];
}
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>AI家庭教師</title>
        <link rel="stylesheet" href="./css/style.css">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <link rel="icon" href="./favicon.ico">
    </head>
    <body>
        <div id="fullOverlay">
        </div>
        <div class="chats">
            <div class="chat list">
                <div class="timer" id="timer">
                </div>
                <div class="teacherInfo" id="tutorInfo">
                    <input type="button" id="countControl" value="countStop"><br>
                    <?php
                        echo '<h2>講師情報</h2>';
                        echo '<img src="./avatars/'.$tutor_icon.'.png" width=56 height=56>';
                        echo '<div class="tutorGreet">講師名<br><h3>'.$tutor_name.'</h3><br>自己紹介：<br><br>'.$tutor_greet.'</div>';
                    ?>
                </div>
                <input type="button" id="close" value="終了する." width=80%>
            </div>
            <div class="chat log">
                <div class="chatarea" id="chatarea">
                </div>
            </div>
            <div class="chat status">
                <textarea name="area1" style="width:100%; height:100%;">MEMO</textarea>
            </div>
        </div>
        <div class="chatform">
            <input type="text" size=50 id="question">
            <input type="button" value="質問する" id="send">
            <form name="form">
            <?php
                echo "<input type=\"hidden\" name=\"icon\" value=\"".$tutor_icon."\">";
                echo "<input type=\"hidden\" name=\"name\" value=\"".$your_name."\">";
                echo "<input type=\"hidden\" name=\"subject\" value=\"".$subject."\">";
                echo "<input type=\"hidden\" name=\"first_contact\" value=\"".$first_contact."\">";
                echo "<input type=\"hidden\" name=\"assist_order\" value=\"".$assist_order."\">";
            ?>
            </form>
        </div>
        <script src="./jQuery.js"></script>
        <script src="./timer.js"></script>
    </body>
</html>