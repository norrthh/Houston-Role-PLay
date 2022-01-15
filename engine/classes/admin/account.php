<?php
	$admin = $_SESSION['A_Nick'];
	require_once "connect.php";
	if(!isset($_SESSION['A_Nick'])) 
		exit("<meta http-equiv='refresh' content='0; url= /admin/login'>");

	else if($bd['update'] == 1 ) {
		class account extends hf {
			public function get_content() { 
				
				require_once ("engine/functions.php");
				//if(!checkAdmin()) exit("<meta http-equiv='refresh' content='0; url= /profile/'>");	
				if(file_exists("view/admin/account.php")) 
				{
					
					include "view/admin/account.php"; 
					
				} else header("Location: http://houston-rp.ru/admin/");	
			}
		}
		// echo 1;
	}
	else {
		header("Location: http://houston-rp.ru/admin/");
		// echo 2;
	}
?>
