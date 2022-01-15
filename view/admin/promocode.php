<?
    // session_start();
    $admins = $_SESSION['A_Nick'];

    include "plugins/connect.php";
    
    $transfer = mysqli_query($connect, "SELECT * FROM `server_promocode`");
    $transfer = mysqli_fetch_all($transfer);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <?php include "plugins/css.php" ?>
    </style>
</head>
<body>
    <div class="container-xxl">
        <div class="row">
            <div class="col-2 menu">
                <?php include "plugins/navbar.php" ?>
            </div>
            <div class="col-sm" style = "padding-top:1rem;">
                <div class="container">
                    <div class="row" style = "margin-bottom:1rem;">
                        <div class="col-8">
                            <p style = "color:#8563f8;;font-size:15px;">Список промокодов</p>
                        </div>
                        <div class="col-sm">
                        <!-- button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delete">
                                Удалить промокод
                            </button>
                            
                            <button style = "margin-left:1rem;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
                                Создать промокод
                            </button>
                        </div>
                    </div>
                    <div>
                        <?
                            if(isset($_SESSION['message'])) {
                                if ($_SESSION['message']) {
                                    echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                                }
                            }
                            else
                                $message = 0;
                            unset($_SESSION['message']);
                        ?>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Название промокода</th>
                                <th scope="col">Тип</th>
                                <th scope="col">Кол-во активаций</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <? foreach($transfer as $trans) {?>
                                <th scope="row"><?= $trans[1]?></th>
                                
                                    <td>
                                        <? 
                                            if($trans[3] == 1) 
                                                echo "Семейная";
                                            else 
                                                echo "Ютуберская";
                                        ?>
                                    </td>
                                    <td>
                                        <?=
                                            $trans[4]
                                        ?>
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                            <? } ?>
                            <tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php
        include "plugins/js.php";
    ?>

    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="row g-3" method="POST" action = "https://houston-rp.ru/view/admin/vendor/promocode.php">
                        <label for="validationDefault01" class="form-label">Промокод</label>
                        <input type="text" name = "promo" class="form-control" id="validationDefault01"  required>
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name = "acceptadmin" value="<?= $admins?>">
                        <button class="btn btn-primary" type="submit">Отправить форму</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <center>
                    <form class="row g-3" method="POST" action = "https://houston-rp.ru/view/admin/vendor/promocode.php">
                        <label for="promo" class="form-label">Название промокода:</label>
                        <input type="text" name = "promo" class="form-control" id="promo"  required >

                        <label for="name" class="form-label">Ник владельца:</label>
                        <input type="text" name = "name" class="form-control" id="name"  required >
                        
                        <label for="type" class="form-label">Тип промокода (1 = семейна; 2 = ютуберская):</label>
                        <input type="text" name = "type" class="form-control" id="type"  required >
                        

                        <label for="kolvo" class="form-label">Количевство активаций:</label>
                        <input type="text" name = "kolvo" class="form-control" id="kolvo"  required >

                        <label for="chas" class="form-label">Сколько часов нужно отыграть:</label>
                        <input type="text" name = "chas" class="form-control" id="chas"  required >

                        <label for="money" class="form-label">Сколько виртов выдается:</label>
                        <input type="text" name = "money" class="form-control" id="money"  required >

                        <label for="exp" class="form-label">Сколько экси выдается:</label>
                        <input type="text" name = "exp" class="form-control" id="exp"  required >

                        <label for="cars" class="form-label">Лицензия на машину (1 = да 2 = нет):</label>
                        <input type="text" name = "cars" class="form-control" id="cars"  required >

                        <label for="fly" class="form-label">Лицензия на полёты (1 = да 2 = нет):</label>
                        <input type="text" name = "fly" class="form-control" id="fly"  required >

                        <label for="boat" class="form-label">Лицензия на вводный транспорт (1 = да 2 = нет):</label>
                        <input type="text" name = "boat" class="form-control" id="boat"  required >

                        <label for="guns" class="form-label">Лицензия на оружие (1 = да 2 = нет):</label>
                        <input type="text" name = "guns" class="form-control" id="guns"  required >

                        <label for="Pistol" class="form-label">Скилл на Pistol (писать проценты): </label>
                        <input type="text" name = "Pistol" class="form-control" id="Pistol"  required >

                        <label for="Deagle" class="form-label">Скилл на Deagle (писать проценты): </label>
                        <input type="text" name = "Deagle" class="form-control" id="Deagle"  required >

                        <label for="ShotGun" class="form-label">Скилл на ShotGun (писать проценты): </label>
                        <input type="text" name = "ShotGun" class="form-control" id="ShotGun"  required >

                        <label for="MP5" class="form-label">Скилл на MP5 (писать проценты): </label>
                        <input type="text" name = "MP5" class="form-control" id="MP5"  required >

                        <label for="M4A1" class="form-label">Скилл на M4A1 (писать проценты): </label>
                        <input type="text" name = "M4A1" class="form-control" id="M4A1"  required >

                        <label for="M4A1" class="form-label">Скилл на AK47 (писать проценты): </label>
                        <input type="text" name = "ZAK47" class="form-control" id="M4A1"  required >

                        <input type="hidden" name="action" value="create">
                        <input type="hidden" name = "acceptadmin" value="<?= $admins?>">

                        <button class="btn btn-primary" type="submit">Отправить форму</button>
                    </form>
                    </center>
            </div>
        </div>
    </div>
</body>
</html>