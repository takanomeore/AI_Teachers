<?php
    //DBから講師情報を抽出して返す
    //header情報
    header("Content-Type: application/json; charset=UTF-8");
    if(isset($_POST['tutor'])) $tName = $_POST['tutor'];
    else $tName = "old_man";
    //.env読み込み
    require __DIR__ . '/config/vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/config');
    $dotenv->load();
    //DB接続
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

    //講師名で検索
    $stmt = $pdo->prepare('SELECT * FROM tutor WHERE name = ?;');
    $stmt->bindValue(1,$tName);
    $stmt->execute();
    unset($pdo);

    $row = $stmt->fetchObject();
    $returnArray = [
        "name"=>$row->name,
        "greet"=>$row->greet,
        "icon"=>$row->icon_dir,
        "first_contact"=>$row->first_contact,
        "assist_order"=>$row->assist_order,
    ];

    //JSON形式にエンコードして返す
    echo json_encode($returnArray);
    exit;