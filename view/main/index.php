<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Главная - <?php echo $ucp_settings['s_title']?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<? 
		include "module/css.php";
    ?>

	<style>
		body {
			background-image:url("/public/main/img/about.jpg");
		}
	</style>
</head>
<body >
	<?php include "view/common/topmenu.php"; ?>

	<section>
		<div class="container">
			<center style = "margin-top: 30vh;">
				<h1>Выбери свою роль и начни играть уже сейчас!</H1>
				<!-- <button  class = "download">Присоединиться</button> -->
				<a class="download" style = "margin-top: 2rem;display: block;width: 30%;" href="#first-link">Присоединиться</a>
			</center>
		</div>
	</section>


	<section class = "howtostartsection">
	<div><a name="first-link"></a><div>
		<div class="container">
			<h4 class="text-center"><b>Как начать играть?</b></h4>
			<hr>
			<div class="row AHAHASHD">
				<div class="col-sm">
					<div>
						<div class="number-text">
							<div class="number">1</div>
							<p>Скачайте и установите GTA SA</p>
						</div>
						<p>
							Для того что бы играть на нашем проекте Houston RP невозможно обойтись без легендарной игры Grand Theft Auto: San-Andreas. Скачайте игру без каких либо дополнений или модификаций
						</p>
						
					</div>
				</div>
				<div class="col-sm">
					<div class="number-text">
					<div class="number">2</div>
						<p>Скачайте и установите SA-MP</p>
					</div>
					<p>
						Как только инсталляция Grand Theft Auto: San-Andreas завершилась,нужно установить особый лаунчер SA-MP. Скачать подходящую версию вы можете на нашем сайте. После чего понадобится указать папку с GTA
					</p>
				</div>
				<div class="col-sm">
					<div class="number-text">
						<div class="number">3</div>
						<p>Запустите лаунчер SA-MP</p>
					</div>
					<p>
						Запустите лаунчер SA-MP и добавьnt один из наших серверов в избранное для быстрого доступа. Введите свой никнейм в специальное поле в формате Имя_Фамилия (North_Hemingway) и начинайте играть!
					</p>
				</div>
			</div>
		</div>
	</section>
	
	<section class = "social_block">
		<div class="container">
			<h4 class="text-center">Мы в социальных сетях</h4>
			<hr>
			<div class="row">
				<div class="col-sm">
					<div class="row">
						<div class="col-3">
							<img src="http://houston-rp.ru/view/main/img/vk.png">
						</div>
						<div class="col-sm">
							<p>VK Официальное сообщество</p>
							<a href="https://vk.com/houstonsamp" class="vk">Перейти</a>
						</div>
					</div>
				</div>

				<div class="col-sm" style = "margin-left:5rem;">
					<div class="row">
						<div class="col-3">
						<img src="http://houston-rp.ru/view/main/img/ds.png">
						</div>
						<div class="col-sm">
							<p>Наш Discord канал</p>
							<a href="https://discord.gg/fUbkqjsG" class="ds">Перейти</a>
						</div>
					</div>
				</div>

				<div class="col-sm">
					<div class="row">
						<div class="col-3">
							<img src="http://houston-rp.ru/view/main/img/vk.png">
						</div>
						<div class="col-sm">
							<p>VK Мастерская проекта</p>
							<a href="https://vk.com/workshophouston" class="vk">Перейти</a>
						</div>
					</div>
				</div>

				<!-- <div class="col-sm">
					<div class="row">
						<div class="col-sm">
							<div class="imgvk"></div>
						</div>
						<div class="col-sm">
							<p>VK Мастерская проекта</p>
							<a href="https://vk.com/workshophouston" class="vk">Перейти</a>
						</div>
					</div>
				</div> -->
			</div>
		</div>
	</section>
	<footer style = "padding-top:2rem;">
        <?php include "view/common/footer.php"; ?>
    </footer>
	
	
	<?
		include "module/js.php";
	?>
	
</body>
</html>