<?
    // session_start();
    $admins = $_SESSION['A_Nick'];
    include "plugins/connect.php";
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <?php include "plugins/css.php" ?>
</head>
<body>
    <div class="container-xxl">
        <div class="row">
            <div class="col-2 menu">
                <?php include "plugins/navbar.php" ?>
            </div>
            <div class="col-sm" style = "padding-top:1rem;">
                <div class="container">
                    <p style = "color:#8563f8;;font-size:15px;">Прокачка аккаунтов</p>
                    <div class="card">
                        <div class="card-body">
                            <form class="row g-3" method  = "POST" action = "https://houston-rp.ru/view/admin/vendor/accountupdate.php">
                                <input type="hidden" value= "<?= $admins ?>" name = acceptadmin>
                                <select name = "update" class="form-select" aria-label="Default select example">
                                    <option value="1">Прокачать аккаунт</option>
                                    <option value="2">Выдать Дом на Колёсах</option>
                                    <option value="3">Забрать Дом на Колёсах</option>
                                </select>
                                <input name = "nick" type="text" class="form-control uodate" id="validationDefault01" required>
                                <button class="btn btn-primary" type="submit">Выдать</button>
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        include "plugins/js.php";
    ?>
</body>
</html>