<?
    $admins = $_SESSION['A_Nick'];

    $id = $_GET['id'];

    include "plugins/connect.php";
	
    $transfer = mysqli_query($transferconnect, "SELECT * FROM `users` WHERE `id`= '$id'");
    $transfer = mysqli_fetch_all($transfer);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?php include "plugins/css.php" ?>
    <title>Главная - <?php echo $ucp_settings['s_title']?></title>
    <link rel="shortcut icon" href="<?php echo $ucp_settings['s_favicon']?>" type="image/png">
</head>
<body>
    <? foreach($transfer as $profile) {?>
    <div class="container-xxl">
        <div class="row">
            <div class="col-2 menu">
                <?php include "plugins/navbar.php" ?>
            </div>
            
            <div class="col-sm" style = "padding-top:1rem;">
                <div class="container">
                    <p style = "color:#8563f8;;font-size:15px;">Action Profile <?= $profile[1]?></p>
                    <a href="#">Венуться назад</a>
                    <div class="card" style="width: 100%; margin-top:3rem; background: #151932;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                                    <h5>Ник на переносе: <span><?= $profile[2]?></span></h5>
                                    <h5>Пароль: <span><?= $profile[3]?></span></h5>
                                    <h5>Название проекта:<span><?= $profile[4]?></span></h5>
                                    <h5>Скриншот статы:<span><a href="<?= $profile[5]?>"><?= $profile[5]?></a></span></h5>
                                    <h5>Скриншот лиц:<span><a href="<?= $profile[5]?>"><?= $profile[5]?></a></span></h5>
                                    <h5>Скриншот ганов:<span><a href="<?= $profile[7]?>"><?= $profile[7]?></a></span></h5>
                                </div>
                                <div class="col-sm">
                                    <h5>Основной ник:<span><?= $profile[1]?></span></h5>
                                    <?
                                        if($profile[9] == 1) {
                                            echo 'Данная заявка была одобрена проверяющим: '.$profile[8].'';
                                        }
                                        elseif($profile[9] == 2 ) {
                                            echo 'Данная заявка была отказана проверяющим:'.$profile[8].'';
                                        }
                                        else {
                                            echo ' 
                                                <form action="https://houston-rp.ru/admin/transferupdate" method = "POST">
                                                    <input type="hidden" value= '.$profile[2].' name = "id">
                                                    <input type="hidden" value= '.$profile[1].' name = "id2">
                                                    <input type="hidden" value='.$admins.' name = acceptadmin>
                                                    <div class="col-md-4">
                                                        <label for="validationDefault01" class="form-label">LVL</label>
                                                        <input name = "LVL" type="text" class="form-control" id="validationDefault01" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="validationDefault02" class="form-label">Money</label>
                                                        <input name = "Money" type="text" class="form-control" id="validationDefault02" required>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-check">
                                                            <label class="form-check-label" for="invalidCheck2">
                                                                Full Skills
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button class="btn btn-primary" type="submit">Отправить форму</button>
                                                    </div>
                                                </form>
                                            ';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <pre>
        <?
            print_r($transfer);
           // print_r($select);
            echo $_GET['id'];
            echo $id;
        ?>
    </pre>

    <?php
        include "plugins/js.php";
    ?>
    <? } ?>
</body>
</html>