<?php

	$conn = mysqli_connect('localhost','root','','php_todo');

	if (isset($_POST['submit'])) {
		$option_textbox = $_POST['option_textbox'];

		$sql = "INSERT INTO list_todo(title) VALUES('$option_textbox')";

	mysqli_query($conn, $sql);

	}


	if (isset($_GET['delete'])) {
		$id = $_GET['delete'];

		$sql = "DELETE FROM list_todo WHERE id=$id";

	mysqli_query($conn, $sql);
	

	}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP TODO LIST</title>

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>



	<div class="container">

		<h1> PHP TOD LIST</h1>

		<form method="post">
			<div id="option_div">
				<input type="text" id="option_textbox" name="option_textbox">
			</div>


			<div id="addBtniv">
				<button type="submit" name="submit" class="addBtn">Add to List</button>
			</div>


		</form>
		
		<div id="display_div">
			<table>

						<tr>
							<td>SI NO:</td>
							<td>Task</td>
							<td>Action</td>
						</tr>
			
				<?php

					$sql = "SELECT * FROM list_todo ORDER BY id DESC";

					$result = mysqli_query($conn, $sql);

					$count_record = mysqli_num_rows($result);

					// echo  $count_record;

					if ($count_record == 0) {
						
						echo "No Record Found !!!";
					}

					else{

					while ($row = mysqli_fetch_assoc($result)) {
						?>


						<tr>
							<td><?php echo $row['id']?></td>
							<td><?php echo $row['title']?></td>
							<td><a href="index.php?delete=<?php echo $row['id']?>">Delete</a></td>
						</tr>


						
				<?php


					}

				}
				?>
			</table>
		</div>
	</div>

</body>
</html>