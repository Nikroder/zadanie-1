<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Задание 1</title>
	<style>
		table {
			text-align: left;
			border-collapse: collapse;
			width: 100%;
			max-width: 600px;
		}

		td, th {
			padding: 10px;
			border: 1px solid #eee;
		}

		th {
			background: #eee;
			font-weight: bold;
		}
	</style>
</head>
<body>
	<?php

		$db_host = 'localhost';
		$db_name = 'zadanie-1';
		$db_user = 'root';
		$db_pass = '';

		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		
		$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
		$mysqli->set_charset("utf8mb4");

		$cars = [];
		$masters = [];

		$result = $mysqli->query('SELECT * FROM cars');
		while ($row = $result->fetch_assoc()) $cars[] = $row;

		$result = $mysqli->query('SELECT * FROM masters');
		while ($row = $result->fetch_assoc()) $masters[$row['id']] = $row;

		echo '
			<table>
				<tr>
					<th>Автомобиль</th>
					<th>Ответственный мастер</th>
				</tr>
		';
		foreach ($cars as $car) {
			echo "
				<tr>
					<td>{$car['name']}</td>
					<td>{$masters[$car['master_id']]['name']}</td>
				</tr>
			";
		}
		echo '
			</table>
		';
	?>

</body>
</html>