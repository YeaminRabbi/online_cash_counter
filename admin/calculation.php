<?php
	

	require 'db_config.php';


	$product_list=fetch_all_data_usingPDO($pdo,"select * from products");



	function fetch_all_data_usingPDO($pdo,$sql)
	{
		
		$statement = $pdo->prepare($sql);
		$statement->execute();
		$row = $statement->fetchAll();

		return $row;
	}

?>