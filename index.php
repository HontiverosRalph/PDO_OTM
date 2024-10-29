<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Barista Management System</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Welcome To Coffee Shop Barista Management System. Add new Baristas!</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="username">Username</label> 
			<input type="text" name="username" required>
		</p>
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" required>
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="lastName" required>
		</p>
		<p>
			<label for="dateOfBirth">Date of Birth</label> 
			<input type="date" name="dateOfBirth" required>
		</p>
		<p>
			<label for="specialty">Specialty</label> 
			<textarea name="specialty" required></textarea>
		</p>
		<p>
			<input type="submit" name="insertBaristaBtn" value="Add Barista">
		</p>
	</form>
	<?php $getAllBaristas = getAllBaristas($pdo); ?>
	<?php foreach ($getAllBaristas as $row) { ?>
	<div class="container" style="border-style: solid; width: 50%; height: 300px; margin-top: 20px;">
		<h3>Username: <?php echo htmlspecialchars($row['username']); ?></h3>
		<h3>First Name: <?php echo htmlspecialchars($row['first_name']); ?></h3>
		<h3>Last Name: <?php echo htmlspecialchars($row['last_name']); ?></h3>
		<h3>Date Of Birth: <?php echo htmlspecialchars($row['date_of_birth']); ?></h3>
		<h3>Specialty: <?php echo htmlspecialchars($row['specialty']); ?></h3>
		<h3>Date Added: <?php echo htmlspecialchars($row['date_added']); ?></h3>

		<div class="editAndDelete" style="float: right; margin-right: 20px;">
			<a href="viewprojects.php?barista_id=<?php echo $row['barista_id']; ?>">View Projects</a>
			<a href="editbarista.php?barista_id=<?php echo $row['barista_id']; ?>">Edit</a>
			<a href="deletebarista.php?barista_id=<?php echo $row['barista_id']; ?>">Delete</a>
		</div>
	</div> 
	<?php } ?>
</body>
</html>
