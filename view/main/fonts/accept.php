<?php
file_put_contents("logs/webhook.log",date("Y-m-d h:i:s")."\t".json_encode($_SERVER)."\t".json_encode($_POST), FILE_APPEND);
    $transferhost = 'localhost';
    $transferdbname   = 'a0563693_transfer';
    $transferuser = 'a0563693_transfer';
    $transferpass = 'kk7f5QnC';

    $transferconnect = mysqli_connect($transferhost, $transferuser, $transferpass,$transferdbname);


    $merchant = $_REQUEST['merchant']; // id вашего магазина
    //$amount = $_REQUEST['amount'];
    $nick = $_POST['nick'];
    $amount = $_POST['amount'];
    $secret_word2 = '1sC9BBW0XRVOoiGjwjMRJQctZleRT-jR'; // секретный ключ 2

    $sign = md5($merchant.':'.$_REQUEST['amount'].':'.$secret_word2.':'.$_REQUEST['merchant_id']);

//    if ($sign != $_REQUEST['sign_2']) {
//        die('bad sign!');
//    }

    echo "Good";
    mysqli_query($transferconnect, "INSERT INTO `test`(`nick`, `update`, `admin`, `promocode`, `transfer`) VALUES ('$merchant','$amount','$nick','$merchant','$merchant')");
   //mysqli_query($transferconnect, "INSERT INTO `test`(`nick`, `update`, `admin`, `promocode`, `transfer`) VALUES ('$amount','$amount','$amount','$nick','$amount')");

