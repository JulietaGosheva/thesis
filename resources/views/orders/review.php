<?php include_once "/../partials/header.php"; ?>
<?php include_once "/../partials/head.php"; ?>

	<table class="table table-striped">
		<th>
			<td>#</td>
			<td>Име</td>
			<td>Телефонен номер</td>
			<td>Адрес</td>
			<td>Поръчки</td>
		</th>

		<?php 
// 			var_dump($orders);
			foreach ($orders as $order) {
				var_dump($order->dishes());
				
			}
		?>		
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		
	</table>

<?php include_once "/../partials/footer.php"; ?>