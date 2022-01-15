<?php
	$admin = $_SESSION['A_Nick'];
	require_once "connect.php";
	if(!isset($_SESSION['A_Nick'])) 
		exit("<meta http-equiv='refresh' content='0; url= /admin/login'>");

	else if($bd['transfer'] == 1 ) {
		class transferedit extends hf {
			public function get_content() { 
				
				require_once ("engine/functions.php");
				if(file_exists("view/admin/transferedit.php")) 
				{
					
					include "view/admin/transferedit.php"; 
					
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
