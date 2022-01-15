<?php
class transfer extends hf {
	public function get_content() { 
		include "engine/functions.php"; 
		if(file_exists("view/main/transfer.php")) 
		{
			include "view/main/transfer.php"; 
			
		} else exit("<meta http-equiv='refresh' content='0; url= /'>");	
	}
}
?>
