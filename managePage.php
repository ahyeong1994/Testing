<div class="main_contain">
	<table id="viewOrder" style="width: 100%; text-align: center;">
		<thead>
		<tr>
			<th>ID</th>
			<th>item</th>
			<th>status</th>
			<th>VIP</th>
			<th>Time</th>
			<th></th>
		</tr>
		</thead>
		<tbody>
		<?php
		$countrow=0;
		$ordersql= $con->prepare("SELECT * FROM `orderlist` WHERE soft_delete='' ORDER BY status,isVIP DESC,created_at");
    	$ordersql->execute();
    	while ($viewOrder=$ordersql->fetch(PDO::FETCH_ASSOC)) {
    		if($viewOrder["status"]=='1'){
    			$status='Completed';
    		}else if($viewOrder["status"]=='0'){
    			$status='Pending';
    		}

    		if($viewOrder["isVIP"]=='1'){
    			$checkVIP='YES';
    		}else if($viewOrder["isVIP"]=='0'){
    			$checkVIP='NO';
    		}

    		echo "<tr>";
    			echo "<td>".$viewOrder["orderID"]."</td>";
    			echo "<td>".$viewOrder["ordernumber"]."</td>";
    			echo "<td>".$status."</td>";
    			echo "<td>".$checkVIP."</td>";
    			echo "<td>".$viewOrder["created_at"]."</td>";
    			echo "<td><a href='delete.php?orderID=".$viewOrder["orderID"]."' OnClick=\"return confirm('Are you sure to delete?');\">Del</a></td>";
    		echo "</tr>";
    		$countrow++;
    	}
		?>
		</tbody>
	</table>
</div>