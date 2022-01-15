<?php
	$admin = $_SESSION['A_Nick'];
	require_once "connect.php";
	if(!isset($_SESSION['A_Nick'])) 
		exit("<meta http-equiv='refresh' content='0; url= /admin/login'>");

	else if($bd['transfer'] == 1 ) {
		class transfer extends hf {
			public function get_content() { 
				
				require_once ("engine/functions.php");
				if(file_exists("view/admin/transfer.php")) 
				{
					
					include "view/admin/transfer.php"; 
					
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
