<?
	$dfdsfdsf = $_SESSION['NickName'];

	include "plugins/connect.php";
	$select = mysqli_query($connect, "SELECT * FROM `accounts`  WHERE `pName` = '$dfdsfdsf' ");

	$select = mysqli_fetch_all($select);

	$admin = mysqli_query($connect, "SELECT * FROM `admin`  WHERE `Name` = '$dfdsfdsf' ");

	$admin = mysqli_fetch_all($admin);


	$biz1 = mysqli_query($connect, "SELECT * FROM `bizz` WHERE `bOwner` = '$dfdsfdsf'");

	$biz = mysqli_fetch_all($biz1);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Личный кабинет - <?php echo $ucp_settings['s_title']?></title>
	<link rel="shortcut icon" href="<?php echo $ucp_settings['s_favicon']?>" type="image/png">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    
	<?
		include "plugins/css.php";
	?>
	
    <link rel="stylesheet" type="text/css" href="/public/main/css/profile.css">
	
    <style>
		body {
			color:white;
		}
		.user__stats ul li {
			color:black;
			border-bottom:none;
		}
		.user__stats {
			background:none;
		}
		.profile__container {
			background:none;
		}
		.profiles {
			height: 23.6vh;
			background: white;
			padding-top: 1rem;
			border-radius: 1rem;
		}

		@media (min-width:1920px) {
			.profiles {
				height: 19.6vh;
			}
		}

		.user__stats ul {
			padding-left:0;
		}
		.textss{
			font-size: 16px;
    		font-weight: 500;
		}
		.textss span{
			color: rgb(86 114 255);
		}
		footer {
			margin-top: 64.4vh;
		}
		.profile {
			margin-bottom: 0px;
			padding-top: 14vh;
		}
		.user__navblock__list {
			margin-top: 5vh;
		}
		.user__navblock {
			color: white;
			background: rgba(255,255,255,.04);
			padding-top: 1.3rem;
			height: 70px;
			font-size: 17px;	
		}
		.active .user__navblock {
			border-left: 5px solid #8563f8;
			background: rgba(255,255,255,.04);
		}
		.user__navblock:hover {
			border-left: 5px solid #8563f8;
			background: rgba(255,255,255,.04);
		}
		.row {
			display:unsent
		}

		.biz span {
			color:rgb(86 114 255);
			text-align: end;
			font-weight: bold;
		}
		.biz h1 {
			color:rgb(86 114 255);
		}
	</style>

</head>
<body class="login-page">
	<?php include "view/common/topmenu.php";
		$data = GetUserData();
    foreach ($select as $selects) {
   ?>
	<section class="profile">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 profile__container d-flex">
					<div class="profile__content">
						<div class="col-lg-4 col-sm-12">
							<div class = "row" style = "display:unset">
								<div class="col-sm profiles" style = "background: rgba(255,255,255,.04);">
									<div class="user__skin__content d-flex" style = "background: rgba(255,255,255,.04);">
										<img style = "background: rgba(255,255,255,.04);" src="/public/main/img/skins/<?= $selects[15]?>.png" class="user__skin__image" >
										<div class="user__name__content" style = "background: rgba(255,255,255,.04);">
											<!-- <h1>Reiner Ghost</h1> -->
											<div style = "background: rgba(255,255,255,.04);" class="block"><?php FixName($data[$ucp_table_settings['name']]) ?></div>
											<div style = "background: rgba(255,255,255,.04);" class="block">#<?php echo $data[$ucp_table_settings['id']] ?></div>
										</div>	
									</div>
								</div>
								<div class="col-sm">
									<div class="user__navblock__list">
										<a class="tablinks" onclick="openTabs(event, 'stats')" id="defaultOpen"><div class="user__navblock">Статистика</div></a>
										<?
											
											foreach($admin as $admins) {
												if($admins[0] == $selects[1]) {
													if($admins[1] >= 0) {
														echo '<a href="https://houston-rp.ru/admin/"><div class="user__navblock">Панель Администратор</div></a>';
													}
												}
											}	
										?>
										<!-- <a href="#"><div class="user__navblock">Достижения</div></a>
										<a href="#"><div class="user__navblock">Защита Аккаунта</div></a>
										<a href="#"><div class="user__navblock">Рулетка</div></a>
										<a href="#"><div class="user__navblock">Машины</div></a> -->
										<a onclick="openTabs(event, 'biz')" class = "tablinks"><div class="user__navblock">Бизнес</div></a>
										<a onclick="openTabs(event, 'house')" class = "tablinks"><div class="user__navblock">Дома</div></a>
										<a href="/profile/exit"><div class="user__navblock">Выйти</div></a>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-8 col-sm-12" style = "margin-left: 1rem;border-radius: 1rem;">
							<div class="user__stats">
								<div class="container">
									<div class="row">
										<div class="col-sm" style = " background: rgba(255,255,255,.04);padding: 2.7rem 1rem;height: 23.6vh;border-radius: 13px;">
											<div class="skills">
												<div class="row text-center">
													<div class="col-sm">
													<?
														$a = $selects[53];
														$pieces = explode(",", $a); 
													?>
														<!-- [0] Slinced Pistol |[1] Desert Eagle |[2] ShotGun |[3] MP5 |[4] AK47 |[5] M4A1 !-->
														<div class="icon"><img src="/public/main/img/pistol.png" alt=""></div>
															<p style = "color: rgb(86 114 255); font-weight:bold"><?php echo $pieces[0] ?>%</p>
														</div>
														<div class="col-sm">
															<div class="icon"><img src="/public/main/img/m4.png" alt=""></div>
															<p style = "color: rgb(86 114 255);font-weight:bold"><?php echo $pieces[5] ?>%</p>
														</div>
														<div class="col-sm">
														<div class="icon"><img src="/public/main/img/ak47.png" alt=""></div>
															<p style = "color: rgb(86 114 255);; font-weight:bold"><?php echo $pieces[4] ?>%</p>
														</div>
														<div class="col-sm">
															<div class="icon"><img src="/public/main/img/deagle.png" alt=""></div>
															<p style = "color: rgb(86 114 255);; font-weight:bold"><?php echo $pieces[1] ?>%</p>
														</div>
														<div class="col-sm">
															<div class="icon"><img src="/public/main/img/mp5.png" alt=""></div>
															<p style = "color: rgb(86 114 255);; font-weight:bold"><?php echo $pieces[3] ?>%</p>
														</div>
														<div class="col-sm">
															<div class="icon"><img src="/public/main/img/shotgun.png" alt=""></div>	
															<p style = "color: rgb(86 114 255);;font-weight:bold"><?php echo $pieces[2] ?>%</p>
														</div>
													</div>
												</div>				
											</div>
										</div>
										<div id = "stats"  class="col-sm tabcontent" style = "display:none;margin-top:9rem;margin-top: 3rem;background: rgba(255,255,255,.04);;border-radius: 15px;padding: 1rem 2rem;margin-left: -1rem;">
											<div class="row">
												<div class="col-sm">
												<p class = "textss">Уровень <br> <span><?php echo $data[$ucp_table_settings['level']] ?></span></p>
												</div>
												<div class="col-4">
												<p class = "textss">Наличные деньги <br> <span><?php echo number_format($data[$ucp_table_settings['cash']]) ?>$</p>
												</div>
												<div class="col-sm">
												<p class = "textss">Донат счет<br> <span><?= number_format($selects[29])?>руб.</span></p>
												</div>
											</div>
											<div class="row">
												<div class="col-4">
												<p class = "textss">Банковский счет <br> <span><?php echo number_format($data[$ucp_table_settings['bank']]) ?>$</p>
												</div>
												<div class="col-sm">
													<p class="textss">Email <br> <span>
														<?  
														if ($selects[5] == "")  
															echo "Отсуствует";
														else 
															echo $selects[5];
														?>
															</span></p>
															
												</div>
												<div class="col-sm">
													<p class="textss">Номер Телефона: <br> 
														<span>
															<?
																if($selects[31] == 0) {
																	echo "Отсуствует";
																}
																else {
																	echo $selects[31];
																}
															?>
														</span>
													</p>
												</div>
											</div>	
											<div class="row">
												<div class="col-4">
													<p class="textss">
														Наркотики <br><span><?= number_format($selects[25])?> </span>
													</p>
												</div>
												<div class="col-4">
													<p class="textss">
														Материалы <br> <span><?= number_format($selects[27])?> </span>
													</p>
												</div>
											</div>
										</div>
                                    <? } ?>
										<div id = "biz"  class="biz col-sm tabcontent" style = "height:61vh;display:none;margin-top:9rem;margin-top: 3rem;background: rgba(255,255,255,.04);;border-radius: 15px;padding: 1rem 2rem;margin-left: -1rem;">
										<?
                                            if(mysqli_num_rows($biz1) > 0) {
                                                foreach ($biz as $biz2) { ?>
                                                    <h1><?= $biz2[3]?></h1>
                                                    <p>Номер бизнеса: <span><?= $biz2[0]?></span></p>
                                                    <p>Госс стоимость: <span><?=$biz2[10]?></span></p>
                                                    <p>Стоимость 1 продукта: <span><?=$biz2[17]?></span></p>
                                                    <p>Бизнес оплачен на: <span><?= $biz2[24]?> дней</span></p>
                                                    <p>Аренда помещение: <span><?= $biz2[26]?> в сутки</span></p>
                                                    <p>Количество продуктов: <span><?= $biz2[16]?>/1000</span></p>
                                                    <p>Заместитель: <span>
                                                        <?
                                                            if($biz2[1] == 1)
                                                                echo "Отсуствует";
                                                            else
                                                                echo $biz2[1];
                                                        ?>
                                                    </span></p>
                                            <?
                                                }
                                            }

                                            else {
                                                echo "<h1>Бизнес отсуствует</h1>";
                                            }
										?>
										</div>

										<div id = "house"  class="biz col-sm tabcontent" style = "height:61vh;display:none;margin-top:9rem;margin-top: 3rem;background: rgba(255,255,255,.04);;border-radius: 15px;padding: 1rem 2rem;margin-left: -1rem;">
											<?php
                                                $houm1 = mysqli_query($connect, "SELECT * FROM `house` WHERE `hOwner` = '$dfdsfdsf'");

                                                $houm = mysqli_fetch_all($houm1);
												if(mysqli_num_rows($houm1) > 0) {
												    foreach($houm as $houm2) { ?>
                                                        <h1>Номер дома: <span><?= $houm2[0]?></span></h1>
                                                        <p>Владелец дома: <span><?= $houm2[8]?></span></p>
                                                        <p>Заместитель дома: <span>
                                                                <?
                                                                if($houm2[13] == 1) {
                                                                    echo "Отсуствует";
                                                                }
                                                                else {
                                                                    echo $houm2[13];
                                                                }
                                                                ?>
                                                            </span></p>
                                                        <p>Квартплата: <span><?= $houm2[39]?></span></p>
                                                        <p>Состояние дома:
                                                            <span>
                                                                <?
                                                                    if($houm2[12] == 1) {
                                                                        echo "Отсусвует";
                                                                    }
                                                                    else {
                                                                        echo $houm2[12];
                                                                    }
                                                                ?>
                                                            </span>
                                                        </p>
                                                        <p>Деньги в шкафу: <span><?= $houm2[29]?></span></p>
                                            <?
												    }
												}
												else {
													echo "<h1>Дом отсуствует</h1>";
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
		</div>	
	</section>
    <pre>
        <?
//            print_r($houm2);
//            print_r($houm);

//
        ?>
    </pre>
	<footer style = "margin-top:0vh;">
        <?php include "view/common/footer.php"; ?>
    </footer>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" ></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="/public/main/js/form.js" ></script>
	<script src="/public/main/js/knob.js" ></script>
    <script src="/public/main/js/main.js" ></script>
    <script src="/public/main/js/profile.js" ></script>

 
</body>
</html>