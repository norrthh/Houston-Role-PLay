<?
    $admins = $_SESSION['A_Nick'];

    include "plugins/connect.php";

    $selecta = mysqli_query($connect, "SELECT * FROM `admin` WHERE `Name` = '$admins'");
    $selecta = mysqli_fetch_all($selecta);

    $powelnahuinorth = mysqli_query($connect, "SELECT * FROM `admin` WHERE `Name` = '$admins'");
    $powelnahuinorth = mysqli_fetch_assoc($powelnahuinorth);
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Главная - <?php echo $ucp_settings['s_title']?></title>
    <link rel="shortcut icon" href="<?php echo $ucp_settings['s_favicon']?>" type="image/png">
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "plugins/css.php" ?>
    
</head>
<body style = "overflow: hidden;">
    <section class="index">
        <div class="container-xxl">
            <div class="row">
                <div class="col-2 menu">
                    <?php include "plugins/navbar.php" ?>
                </div>
                <div class="col-sm" style = "padding-top:1rem;">
                    <div class="container">
                        <div class="card" style = "margin-top:1.5rem; height:100vh;">
                            <div class="card-body">
                                <h2>Информация администратора <?= $admins ?></h2>
                                <div class="row" style = "margin-top:2rem">
                                    <div class="col-sm">
                                        <div>
                                            <div class="row">
                                                <div class="col-sm">
                                                    <p>Дата назначения:</p>
                                                </div>
                                                <div class="col-sm">
                                                    <span class="text-end"><?= $powelnahuinorth['pDataNaz']?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="row">
                                                <div class="col-sm">
                                                    <p>Уровень администратора:</p>
                                                </div>
                                                <div class="col-sm">
                                                    <span class="text-end"><?= $powelnahuinorth['pAdmin']?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div>
                                            <div class="row">
                                                <div class="col-sm">
                                                    <p>Должность:</p>
                                                </div>
                                                <div class="col-sm">
                                                    <span class="text-end">Технический Администратор</span>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="col-sm">
                                        <div>
                                            <div class="row">
                                                <div class="col-sm">
                                                    <p>Отвечено в репорт:</p>
                                                </div>
                                                <div class="col-sm text-end">
                                                    <span><?= $powelnahuinorth['pAdmRep']?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="row">
                                                <div class="col-sm">
                                                    <p>Отвечено в репорт за сутки:</p>
                                                </div>
                                                <div class="col-sm text-end">
                                                    <span><?= $powelnahuinorth['pAdmRepDay']?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="row">
                                                <div class="col-sm">
                                                    <p>Кикнуто игроков:</p>
                                                </div>
                                                <div class="col-sm text-end">
                                                    <span><?= $powelnahuinorth['pAdmKick']?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="row">
                                                <div class="col-sm">
                                                    <p>Забанено игроков:</p>
                                                </div>
                                                <div class="col-sm text-end">
                                                    <span><?= $powelnahuinorth['pAdmBan']?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="row">
                                                <div class="col-sm">
                                                    <p>Заварнено игроков:</p>
                                                </div>
                                                <div class="col-sm text-end">
                                                    <span><?= $powelnahuinorth['pAdmWarn']?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="row">
                                                <div class="col-sm">
                                                    <p>Присон:</p>
                                                </div>
                                                <div class="col-sm text-end">
                                                    <span><?= $powelnahuinorth['pAdmPrison']?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <div class="row">
                                                <div class="col-sm">
                                                    <p>Замучено:</p>
                                                </div>
                                                <div class="col-sm text-end">
                                                    <span><?= $powelnahuinorth['pAdmMute']?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        include "plugins/js.php"
    ?>
    <pre>
        <?
            // print_r($powelnahuinorth);
        ?>
    </pre>
</body>
</html>