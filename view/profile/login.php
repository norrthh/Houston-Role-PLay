<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Авторизация - <?php echo $ucp_settings['s_title']?></title>
	<link rel="shortcut icon" href="<?php echo $ucp_settings['s_favicon']?>" type="image/png">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?
		include "view/profile/plugins/css.php";
	?>
    <style>
		.form {
			margin-top:5rem;
		}
		.form-control {
			width:50%
		}
		.btn.btn-primary {
			width:50%
		}
	</style>
</head>
<body>
	<?php include "view/common/topmenu.php"; ?>

	<section class = "login">
		<div class="container">
			<center style = "margin-top:10rem">
				<h1 class = "text-center">Авторизация</h1>
				<form  method="POST" action="/engine/obr/profile.php" class = "form">
						<input name="user_name" style = "color: white;" type="text" class="form-control" placeholder = "NickName" id="validationDefault01" required>
						<input name="user_password" style = "color: white;margin-top: 2rem;" type="text" class="form-control" placeholder = "Password" id="validationDefault02"  required>
						<input type="hidden" name="action" value="login">
						<button style = "margin-top: 2rem;" class="btn btn-primary" type="submit">Авторизоваться</button>
				</form>		
			</center>
		</div>
	</section>
		
	<footer style = "margin-top:10rem">
		<?php include "view/common/footer.php"; ?>
	</footer>
   
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" ></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="/public/main/js/form.js" ></script>
    <script src="/public/main/js/main.js" ></script>

 
</body>
</html>