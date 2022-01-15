<?
	include "plugins/connect.php";

	$nick = $_POST['nick'];
	$acceptadmin = $_POST['acceptadmin'];
	
	$base1 = mysqli_query($connect, "SELECT * FROM `accounts` WHERE `pName` = '$nick' ");
	$base1 = mysqli_fetch_all($base1);


	//$transferSkills = '100,100,100,100,100,100';

	foreach ($base1 as $base2) {
		$money = $base2[16];
		$lvl = $base2[18];
		$skills = $base2[53];
		$lic = $base2[52];
		$narko = $base2[25];
		$mati = $base2[27];
	}

	
	$mati = $mati + 20000;
	$narko = $narko + 20000;
	$money = $money + 20000;
	
	$lic2 =  explode(",", $lic);
	if ($lic[0] < 1 ) {
		$lic2 = $lic2[0]  + 1;
		$lic3 = "$lic2,0,0,0";
	}
	else 
		$lic2 = $lic2;

	$sksills2 = explode(",", $skills);
	if($sksills2[2] < 100) {
		$sksills2 = $sksills2[2] + 100;
		$sksills3 = "0,$sksills2,0,0,0,0";
	}
	else 
		$sksills2 = $sksills2;

	if($lvl < 2)
		$lvl = 2;
	else 
		$lvl = $lvl;
	
	$date = date('Y-m-d');
	

	mysqli_query($connect, "UPDATE `accounts` SET `pCash`='$money',`pLevel`='$lvl',`pDrugs`='$narko',`pMetall`='$mati',`pLicenses`='$lic3',`pGunSkill`='$sksills3' WHERE `pName` = '$nick'");
	mysqli_query($transferconnect, "INSERT INTO `media_logs`(`MediaNick`, `NickName`, `Date`) VALUES ('$acceptadmin', '$nick', '$date')");
	/*
	mysqli_query($connect, "UPDATE `accounts` SET `pCash`='$transfermoney',`pLevel`='$transferLVL',`pGunSkill`='$transferSkills' WHERE `pName` = '$id'");
	mysqli_query($transferconnect, "UPDATE `users` SET `ktosuka`= '$acceptadmin',`Accept`= 1 WHERE `Name` = '$id2'")
	*/
	header("Location: https://houston-rp.ru/admin/account");
	
?> 

<pre>
	<?
		print_r($_POST);
	?>
</pre>
<p><?
	
?></p>