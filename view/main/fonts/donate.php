<?php
    $MERCHANT_ID   = 25604;                 // ID магазина
$nick = $_POST['nick'];
    $SECRET_WORD   = '1gUn84wfrtyjl_FPxXEHP4_9XZRJZneY';   // Секретный ключ
    $ORDER_AMOUNT  =  $_POST['oa'];                 // Сумма заказа
    $PAYMENT_ID    = time();             // ID заказа (мы используем time(), чтобы был всегда уникальный ID)
    $sign = md5($MERCHANT_ID.':'.$ORDER_AMOUNT.':'.$SECRET_WORD.':'.$PAYMENT_ID);  //Генерация ключа
    $test = "https://enot.io/pay?m=$MERCHANT_ID&oa=$ORDER_AMOUNT&o=$PAYMENT_ID&s=$sign";
    header("Location: $test");
?>

<pre>
    <?
        print_r($_POST);
    ?>
</pre>
<a href="<?= $test?>"><?= $test?></a>