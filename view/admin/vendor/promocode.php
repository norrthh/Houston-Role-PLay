<?php
    session_start();
    require_once "../plugins/connect.php";
    $promo = $_POST['promo'];
    $acceptadmin = $_POST['acceptadmin'];
    $date = date('Y-m-d');

    if($_POST['action'] == "delete") {
        $base1 = mysqli_query($connect, "SELECT * FROM `server_promocode` WHERE `s_promo` = '$promo' ");

        if(mysqli_num_rows($base1) > 0) {
            $_SESSION['message'] = 'Промокод успешно удалён';
            mysqli_query($connect, "DELETE FROM `server_promocode` WHERE `s_promo` = '$promo'");
            mysqli_query($transferconnect, "INSERT INTO `promo_logs`(`Admin`, `Promocode`, `Date`, `Type`) VALUES ('$acceptadmin','$promo','$date', 'SPromocodeDelete')");
            header('Location: https://houston-rp.ru/admin/promocode');
        }
        else {
            $_SESSION['message'] = 'Нету промокода в базе данных, возможно  ввели без <span class = "north">#</span> <br> <span class = "north"> Пример: #North </span>';
            mysqli_query($transferconnect, "INSERT INTO `promo_logs`(`Admin`, `NickName`, `Date`, `Type`) VALUES ('$acceptadmin','$promo','$date', 'WPromocodeDelete')");
			header('Location: https://houston-rp.ru/admin/promocode');
        }
    } 

    if($_POST['action'] == "create") {
        $pattern = '/^\d+$/';
        $chas = $_POST['chas'];
        $name = $_POST['name'];
        $type = $_POST['type'];
        $kolvo = $_POST['kolvo'];
        $money = $_POST['money'];
        $exp = $_POST['exp'];
        $cars = $_POST['cars'];
        $fly = $_POST['fly'];
        $boat = $_POST['boat'];
        $guns = $_POST['guns'];

        $Deagle = $_POST['Deagle'];
        $ShotGun = $_POST['Shotgun'];
        $MP5 = $_POST['MP5'];
        $M4A1 = $_POST['M4A1'];
        $ZAK47 = $_POST['ZAK47'];
        $Pistol = $_POST['Pistol'];

        $_SESSION['message'] = 'Промокод успешно создан';
        mysqli_query($connect, "INSERT INTO `server_promocode`(`s_id`, `s_promo`, `s_owner`, `s_type`, `s_hour`, `s_activation`, `s_money`, `s_exp`, `s_lic_car`, `s_lic_fly`, `s_lic_boat`, `s_lic_gun`, `s_pistol`, `s_deagle`, `s_shotgun`, `s_mp5`, `s_ak47`, `s_m4`, `s_promo_used`) VALUES (Null,'$promo','$name','$type','$chas','$kolvo','$money','$exp','$cars','$fly','$boat','$guns','$Pistol','$Deagle','$ShotGun','$MP5','$M4A1','$ZAK47','0')");
        mysqli_query($transferconnect, "INSERT INTO `promo_logs`(`Admin`, `NickName`, `Date`, `Type`) VALUES ('$acceptadmin','$promo','$date', 'Create')");
        header('Location: https://houston-rp.ru/admin/promocode');
    }
    


?>

<pre>
    <?
        print_r($_POST);
    ?>
</pre>