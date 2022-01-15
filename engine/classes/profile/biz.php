<?php
if(!isset($_SESSION['NickName'])) exit("<meta http-equiv='refresh' content='0; url= /profile/login'>");
else
{
class biz extends hf {
	public function get_content() { 
		
		require_once ("engine/functions.php");
		checkPassword();
		if(file_exists("view/profile/biz.php")) 
		{
				
			include "view/profile/biz.php"; 
			
		} else exit("<meta http-equiv='refresh' content='0; url= /'>");	
	}
}
}
?>
