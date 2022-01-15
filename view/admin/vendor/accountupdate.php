<?php
	session_start();
	
	include "../plugins/connect.php";

	$nick = $_POST['nick'];
	$acceptadmin = $_POST['acceptadmin'];
	$update = $_POST['update'];

    $date = date('Y-m-d');

	$base3 = mysqli_query($connect, "SELECT * FROM `accounts` WHERE `pName` = '$nick'");
	$base1 = mysqli_fetch_all($base3);

	 foreach ($base1 as $base2) {
	 	$money = $base2[16];
	 	$lvl = $base2[18];
	 	$skills = $base2[53];
	 	$lic = $base2[52];
	 	$narko = $base2[25];
	 	$mati = $base2[27];
	 }
	//	выдача 2 лвла, 20к матов и нарко, + права и скилл на дигл
	
	function updateacc2($connect,$acceptadmin,$nick,$date,$transferconnect,$base3,$money, $narko, $lvl, $skills, $lic, $mati) {
		if(mysqli_num_rows($base3) > 0) {
			$money = $money + 20000;
			$narko = $narko + 20000;
			$mati = $mati + 20000;
   
			if ($lvl < 2) {
			   $lvl = 2;
		   	}
			else {
			   $lvl = $lvl;
		   	}
   
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
			else {
				   $sksills2 = $sksills2;
				}

			$_SESSION['message'] = 'Аккаунт был прокачен';
			mysqli_query($transferconnect, "INSERT INTO `media_logs`(`Admin`, `NickName`, `Date`, `Type`) VALUES ('$acceptadmin','$nick','$date', 'acceptupdate')");
			mysqli_query($connect, "UPDATE `accounts` SET `pCash`='$money',`pLevel`='$lvl',`pDrugs`='$narko',`pMetall`='$mati',`pLicenses`='$lic3',`pGunSkill`='$sksills3' WHERE `pName` = '$nick'");
			// mysqli_query($transferconnect, "INSERT INTO `media_logs`(`MediaNick`, `NickName`, `Date`) VALUES ('$acceptadmin', '$nick', '$date')");
	
			header('Location: https://houston-rp.ru/admin/account');
		}
		else {
			$_SESSION['message'] = 'Аккаунт не найден в БД';
			mysqli_query($transferconnect, "INSERT INTO `media_logs`(`Admin`, `NickName`, `Date`, `Type`) VALUES ('$acceptadmin','$nick','$date', 'warningupdate')");
			header('Location: https://houston-rp.ru/admin/account');
		}
	}
	

	function dnk($acceptadmin,$date,$connect, $base3,$nick,$transferconnect) {
		$checkndk = mysqli_query($connect,"SELECT * FROM `dnk_users` WHERE `owner` = '$nick' ");
		if(mysqli_num_rows($base3) > 0) {
			if(mysqli_num_rows($checkndk) == 0) {
				$_SESSION['message'] = 'Дом на Колёсах успешно выдалось игроку';
				mysqli_query($connect, "INSERT INTO `dnk_users` (`id`, `owner`, `posX`, `posY`, `posZ`, `posC`, `color1`, `color2`, `vfuel`, `vlock`, `type`, `date`, `undate`, `howSafe`, `howSafeGun`, `howSafeAmmo`, `wheels`) VALUES (NULL, '$nick', '193.369', '-297.654', '1.94816', '180.025', '0', '0', '197.871', '1', '0', '50', '3', '0,0,0,0', '0,0,0,0,0,0', '0,0,0,0,0,0', '0');");
				mysqli_query($transferconnect, "INSERT INTO `dnk_logs`(`Admin`, `NickName`, `Date`, `Type`) VALUES ('$acceptadmin','$nick','$date', 'dnksuccessful')");
				header('Location: https://houston-rp.ru/admin/account');
			}
			if(mysqli_num_rows($checkndk) > 0) {
				$_SESSION['message'] = 'У игрока имеется Дом На Колёсах!';
				mysqli_query($transferconnect, "INSERT INTO `dnk_logs`(`Admin`, `NickName`, `Date`, `Type`) VALUES ('$acceptadmin','$nick','$date', 'dnkwarning')");
				header('Location: https://houston-rp.ru/admin/account');
			}
		}
		else {
			$_SESSION['message'] = 'Нету игрока в базе данных';
			mysqli_query($transferconnect, "INSERT INTO `dnk_logs`(`Admin`, `NickName`, `Date`, `Type`) VALUES ('$acceptadmin','$nick','$date', 'dnkbd')");
			header('Location: https://houston-rp.ru/admin/account');
		}
	}

	function deletednk($connect, $nick, $base3, $acceptadmin, $date, $transferconnect) {
	    $checkndk = mysqli_query($connect,"SELECT * FROM `accounts` WHERE `pName` = '$nick' ");
        if(mysqli_num_rows($base3) > 0) {
            if(mysqli_num_rows($checkndk) == 1) {
                $_SESSION['message'] = 'Дом на Колёсах был удален';
				mysqli_query($transferconnect, "INSERT INTO `dnk_logs`(`Admin`, `NickName`, `Date`, `Type`) VALUES ('$acceptadmin','$nick','$date', 'Delete')");
				mysqli_query($connect, "DELETE FROM `dnk_users` WHERE `owner` = '$nick'");
				header('Location: https://houston-rp.ru/admin/account');
            }
            else {
                $_SESSION['message'] = 'У игрока нету Дома на Колёсах';
				mysqli_query($transferconnect, "INSERT INTO `dnk_logs`(`Admin`, `NickName`, `Date`, `Type`) VALUES ('$acceptadmin','$nick','$date', 'WarningDelete')");
				// mysqli_query($connect, "DELETE FROM `dnk_users` WHERE `owner` = '$nick'");
				header('Location: https://houston-rp.ru/admin/account');
            }
        }
        else {
			$_SESSION['message'] = 'Нету игрока в базе данных';
			mysqli_query($transferconnect, "INSERT INTO `dnk_logs`(`Admin`, `NickName`, `Date`, `Type`) VALUES ('$acceptadmin','$nick','$date', 'BDDelete')");
			mysqli_query($connect, "DELETE FROM `dnk_users` WHERE `owner` = '$nick'");
			header('Location: https://houston-rp.ru/admin/account');
		}
    }

	switch ($update){
		case 1: 
			updateacc2($connect,$acceptadmin,$nick,$date,$transferconnect,$base3,$money, $narko, $lvl, $skills, $lic, $mati);
			break;
		case 2:
			dnk($acceptadmin,$date,$connect, $base3,$nick,$transferconnect);
			break;
		case 3:
			deletednk($connect, $nick, $base3, $acceptadmin, $date, $transferconnect); 
			break;
	}
