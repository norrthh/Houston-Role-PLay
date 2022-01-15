<?php
class pk extends hf {
	public function get_content() { 
		include "engine/functions.php"; 
		if(file_exists("view/main/pk.php")) 
		{
			include "view/main/pk.php"; 
			
		} else exit("<meta http-equiv='refresh' content='0; url= /'>");	
	}
}
?>
