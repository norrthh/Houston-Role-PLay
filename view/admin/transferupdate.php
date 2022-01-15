<?

	include "plugins/connect.php";
	
	$id = $_POST['id'];
	$id2 = $_POST['id2'];
	$acceptadmin = $_POST['acceptadmin'];
	$LVL = $_POST['LVL'];
	$Money = $_POST['Money'];
	// $Skills = $_POST['Skills'];

	$base1 = mysqli_query($connect, "SELECT * FROM `accounts` WHERE `pName` = '$id2' ");
	$base1 = mysqli_fetch_all($base1);

	foreach ($base1 as $base2) {
		$money = $base2[16];
		$lvl = $base2[18];
		$skills = $base2[53];
	}
	$transfermoney = $money + $Money;
	$transferLVL = $LVL + $lvl;
	$transferSkills = "100,100,100,100,100,100";
	$lic = "1,1,1,1";

	mysqli_query($connect, "UPDATE `accounts` SET `pCash`='$transfermoney',`pLevel`='$transferLVL',`pLicenses`='$lic',`pGunSkill`='$transferSkills' WHERE `pName` = '$id2'");
	mysqli_query($transferconnect, "UPDATE `users` SET `ktosuka`= '$acceptadmin',`Accept`= 1 WHERE `Name` = '$id2'");
	mysqli_query($transferconnect, "INSERT INTO `tranfer_log` (`Admin`, `NickName`, `Money`, `LVL`) VALUES ('$acceptadmin', '$id2', '$transfermoney', '$transferLVL');");

	header("Location: https://houston-rp.ru/admin/transfer");
?> 

<pre>
	<?
		print_r($_POST);
	?>
</pre>
<p><?=$acceptadmin?></p>
<p><?=$id2?></p>
<p><?= $transfermoney?></p>
<p><?=$transferLVL?></p>

<p>
	 bd
	<?=$money?>
</p>

<p>
	tran
	<?=$Money ?>
</p>
<p>
	<?=
		$id
	?>	
</p>

<p>
	<?=
		$id2
	?>
</p>