<?php

include('config.php');



try{

  		$id = $_GET['id'];

		$sql = "delete from finding where `id`='".$id."'";

		$result = mysql_query($sql);

		if($result)

		{	

		 header('Location:viewfinding.php');

		}

		else

		echo "error deleting data";

		}

		catch(Exception $e)

		{

		 echo "Exception ".$e->getMessage();

		 }

?>

