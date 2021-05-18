<?php
	

	require 'db_config.php';

	$order_list = fetch_all_data_usingPDO($pdo,"select * from orders");
	$product_list=fetch_all_data_usingPDO($pdo,"select * from products");
	$total_orders=fetch_all_data_usingDB($db,"select COUNT(*) from orders");
	$total_products=fetch_all_data_usingDB($db,"select COUNT(*) from products");
	$total_amounts=fetch_all_data_usingDB($db,"SELECT SUM(amount_cost) as 'expense', SUM(amount_paid) as 'selling', SUM(amount_paid - amount_cost) as 'profit' FROM `orders`");

	function fetch_all_data_usingPDO($pdo,$sql)
	{
		
		$statement = $pdo->prepare($sql);
		$statement->execute();
		$row = $statement->fetchAll();

		return $row;
	}



	 function fetch_all_data_usingDB($db,$sql){
			
			$result = mysqli_query($db,$sql);
		    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		    mysqli_free_result($result);
		    return $row;
	}



?>