<?php

include('config.php');



try{

  		$id = $_GET['id'];

		$sql = "delete from new_app where `treatment_id`='".$id."'";

		$result = mysql_query($sql);

		if($result)

		{	

		 header('Location:home.php');

		}

		else

		echo "error deleting data";

		}

		catch(Exception $e)

		{

		 echo "Exception ".$e->getMessage();

		 }

?>

