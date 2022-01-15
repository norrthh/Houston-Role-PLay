<?php
class lk extends hf {
	public function get_content() { 
		include "engine/functions.php"; 
		if(file_exists("view/main/lk.php")) 
		{
			include "view/main/lk.php"; 
			
		} else exit("<meta http-equiv='refresh' content='0; url= /'>");	
	}
}
?>
