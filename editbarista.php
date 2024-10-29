<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Barista</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php $getBaristaByID = getBaristaByID($pdo, $_GET['barista_id']); ?>
	<h1>Edit the Barista!</h1>
	<form action="core/handleForms.php?barista_id=<?php echo urlencode($_GET['barista_id']); ?>" method="POST">
		<p>
			<label for="username">Username</label> 
			<input type="text" name="username" value="<?php echo htmlspecialchars($getBaristaByID['username']); ?>">
		</p>
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" value="<?php echo htmlspecialchars($getBaristaByID['first_name']); ?>">
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="lastName" value="<?php echo htmlspecialchars($getBaristaByID['last_name']); ?>">
		</p>
		<p>
			<label for="dateOfBirth">Date of Birth</label> 
			<input type="date" name="dateOfBirth" value="<?php echo htmlspecialchars($getBaristaByID['date_of_birth']); ?>">
		</p>
		<p>
			<label for="specialty">Specialty</label> 
			<textarea name="specialty"><?php echo htmlspecialchars($getBaristaByID['specialty']); ?></textarea>
		</p>
		<p>
			<input type="submit" name="editBaristaBtn" value="Update Barista">
		</p>
	</form>
</body>
</html>
