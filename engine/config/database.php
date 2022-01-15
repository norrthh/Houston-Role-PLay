<?php
    include "table.php";
    $host = '217.106.107.72';
    $dbname   = 'EVE45016';
    $user = 'H45016';
    $pass = 'houstonrptop';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
    $opt = [
        //PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    try {
        $db = new PDO($dsn, $user, $pass, $opt);
    } catch (PDOException $e) {
        die('Подключение не удалось: ' . $e->getMessage());
    }

    $sql = "SELECT * FROM ucp_settings";
    $statement = $db->prepare($sql);
    $statement->execute ();
    $ucp_settings = $statement->fetch();


    $transferhost = 'localhost';
    $transferdbname   = 'a0563693_transfer';
    $transferuser = 'a0563693_transfer';
    $transferpass = 'kk7f5QnC';

    $transferconnect = mysqli_connect($transferhost, $transferuser, $transferpass,$transferdbname);

    $connect = mysqli_connect($host, $user, $pass,$dbname);