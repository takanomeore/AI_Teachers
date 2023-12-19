<?php
    require __DIR__ . '/config/vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/config');
    $dotenv->load();
    try {
        $pdo = new PDO(
            'mysql:dbname='.$_ENV['DB_NAME'].';host='.$_ENV['DB_HOST'].';charset=utf8;',
            $_ENV['DB_USER'],
            $_ENV['DB_PASSWORD'],
            [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
        );
    } catch(PDOException $e) {
        echo '<script> console.log(\''.$e->getMessage().'\')</script>';
    }
    $stmt = $pdo->prepare('SELECT name FROM tutor;');
    $stmt->execute();
    //$stmt->fetch();
    unset($pdo);
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>AI家庭教師</title>
        <link rel="icon" href="./favicon.ico">
        <link rel="stylesheet" href="./css/index_style.css">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    </head>
    <body>
        <div class="settings">
            <div class="parameter">
                <form method="POST" action="./class_room.php" name="form">
                    <duv class="who_student">
                        <h2>What your name.</h2>
                        <input type="text" name="your_name">
                    </div>
                    <div class="what_subject">
                        <h2>What subject.</h2>
                            <input type="text" name="subject"><br>
                    </div>
                    <div class="who_tutor" id="who_tutor">
                        <h2>Who your favorite tutor.</h2>
                        <select id="tutor">
                            <option hidden>select tutor</option>
                            <?php
                                //echo "<script>console.log('".count($stmt)."')</script>";
                                while($row = $stmt->fetchObject()) {
                                    $name = $row->name;
                                    echo '<option value="'.$name.'">'.$name.'</option>';
                                    //echo "<script>console.log('".$name."')</script>";
                                }
                            ?>
                            <input type="hidden" name="tutor_name" value="">
                            <input type="hidden" name="tutor_greet" value="">
                            <input type="hidden" name="tutor_icon" value="">
                            <input type="hidden" name="first_contact" value="">
                            <input type="hidden" name="assist_order" value="">
                        </select><br>
                    </div>
                    <input type="submit" value="submit">
                </form>
            </div>
        </div>
        <script src="./tutorCrawl.js"></script>
    </body>
</html>
