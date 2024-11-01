<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Workspace Booking</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php 
	$getBaristaByID = getBaristaByID($pdo, $_GET['barista_id']); 
	?>
	<h1>Are you sure you want to delete this booking?</h1>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Booking ID: <?php echo $getBaristaByID['barista_id']; ?></h2>
		<h2>Username: <?php echo $getBaristaByID['username']; ?></h2>
		<h2>First Name: <?php echo $getBaristaByID['first_name']; ?></h2>
		<h2>Last Name: <?php echo $getBaristaByID['last_name']; ?></h2>
		<h2>Date Of Birth: <?php echo $getBaristaByID['date_of_birth']; ?></h2>
		<h2>Specialty: <?php echo $getBaristaByID['specialty']; ?></h2>
		<h2>Date Added: $<?php echo $getBaristaByID['date_added']; ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="core/handleForms.php?barista_id=<?php echo $_GET['barista_id']; ?>" method="POST">
				<input type="submit" name="deleteBaristaBtn" value="Delete">
			</form>			
		</div>	
	</div>
</body>
</html>
