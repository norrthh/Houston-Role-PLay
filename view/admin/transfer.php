<?
    $admins = $_SESSION['A_Nick'];

    include "plugins/connect.php";
    
    $transfer = mysqli_query($transferconnect, "SELECT * FROM `users`");
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
                    <p style = "color:#8563f8;;font-size:15px;">Transfer Accounts</p>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NicName</th>
                                <th scope="col">ProjectName</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <? foreach($transfer as $trans) {?>
                            <th scope="row"><?= $trans[0]?></th>
                                <td><?= $trans[1]?></td>
                                <td><?= $trans[3]?></td>
                                <td>
                                    <?  
                                        
                                        if($trans[9] == Null) 
                                            echo 'Wait';
                                        
                                        elseif ($trans[9] == 1) 
                                            echo 'Accept';
                                        
                                        else 
                                            'Denied';
                                        
                                        
                                    ?></td>
                                    
                                <td>
                                    <a href="/admin/transferedit/?id=<?= $trans[0]?>">
                                        <i class="text-center fa fa-info" aria-hidden="true"></i>
                                    </a>
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

    <pre>
        <?
            print_r($transfer);
           // print_r($select);
            
        ?>
    </pre>
    
    <div class="modal fade" id="exampleModal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Transfer Windows</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?  
                        $id = $_GET['id'];
                        echo $id;
                    ?>
                    <div class="row">
                        <div class="col-sm">
                            <p>Basic Name:<?= $trans[2]?></p>
                            <p>Portable Name:</p>
                            <p>ScreenShot Stats:</p>
                            <p>ScreenShot Licenses:</p>
                            <p>ScreenShot Weapon:</p>
                            <p>Status:</p>
                            <p>Endorsed:</p>
                        </div>
                        <div class="col-sm">
                            <p>Issue</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <?php
        include "plugins/js.php";
    ?>
</body>
</html>