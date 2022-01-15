<?php
    $comment = "Пополнение счёта";
    $billId  = time();
    $payment = 1;
    $sign_2 = 1;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Донат - <?php echo $ucp_settings['s_title']?></title>

	<?
        include "module/css.php";
    ?>

	<style>
		input {
			display: block;
			width: 100%;
			border-radius: 3px;
			padding: 20px;
		}
	</style>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="enot" content="7481628633544kuT45vWh6JsWP8d8K660rO6kTrszrXl9" />
</head>
<body>
	<?php include "view/common/topmenu.php"; ?>

	<div class="container" style = "padding-top: 20vh;">
		<div class="row">
			<div class="col-5">
				<h3>Пополнение счета</h3>
                <form method='get' action='https://houston-rp.ru/view/main/donate/enot.php'>
                    <input type="text" name="user_id">
                    <input type="text" name="sum">
                    <input type="hidden" name="comment" <?= $comment?>>
                    <input type="hidden" name="payment" value="<?= $payment?>">
                    <input type="hidden" name="billId" value="<?= $billId?>">
                    <input type="hidden" name="sign_2" value="<?= $sign_2?>">
                    <input type="submit" value="Оплатить">
				</form>
			</div>
			<div class="col-sm" style = "margin-left:20px">
				<h3>Что можно купить?</h3>
					<div class="whybuy">Игровая валюта</div>
					<div class = "whybuy">Прокачка всех скиллов</div>
					<div class = "whybuy">Снятие предупреждений</div>
					<div class = "whybuy">Смена игрового никнейма</div>
					<div class = "whybuy">И многое другое...</div>
			</div>
		</div>
	</div>
    <!-- <style>
		.test {
			color:white;
		}
	</style> -->
	<?
	// $a = rand(0,100000);
	// echo "<p class = test>suka $a</p>";
	?>
	
	<footer>
		<?php include "view/common/footer.php"; ?>
	</footer>	

	<?
		include "module/css.php";
	?>
</body>
</html>
