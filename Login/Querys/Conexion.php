<?php
	try{
		$base=new PDO('mysql:host=localhost; dbname=pp2018', 'root', '');
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$base->exec('SET CHARACTER SET utf8');
		
	}catch(Exception $e){
		die('Error: '.$e->GetMessage());
	}
 	

?>