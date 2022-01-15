<?php
	$admin = $_SESSION['A_Nick'];
	require_once "connect.php";
	if(!isset($_SESSION['A_Nick'])) 
		exit("<meta http-equiv='refresh' content='0; url= /admin/login'>");

	else if($bd['admin'] == 1 ) {
		class admin extends hf {
			public function get_content() { 
				
				require_once ("engine/functions.php");
				if(file_exists("view/admin/admin.php")) 
				{
					
					include "view/admin/admin.php"; 
					
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
