<?php

 ?>
 <!DOCTYPE html>
 <html>
 	<head>
 		<meta charset="utf-8">
 		<title>Shipped Orders</title>
 		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
 		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 	</head>
	<body>
        <?php include 'navbar.php' ?>
		<div class="container">
			<h3>Shipped Orders</h3>
			<div class="panel panel-default">
			    <table class="table">
				    <thead>
					    <tr>
						  <th>ID</th>
						  <th>address 1</th>
						  <th>City</th>
						  <th>State</th>
						  <th>Status</th>
						  <th>Action</th>
					    </tr>
				    </thead>
				    <tbody>
				    <?php foreach ($orders as $order)
			  			{
						  echo "<tr>";
							  echo "<td>" . $order['order_id'] . "</td>";
							  echo "<td>" . $order['line_1'] . "</td>";
							  echo "<td>" . $order['city'] . "</td>";
							  echo "<td>" . $order['state'] . "</td>";
							  echo "<td><p class='shipped'>" . $order['status'] . "</p></td>";
							  echo "<td>
							  <a class='btn btn-default btn-xs' href='#'' role='button'>View</a></td>";
						  echo "</tr>";
						}
					?>
				  	</tbody>
			  	</table>
			</div>
		</div>
	</body>
</html>
