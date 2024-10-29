<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Project</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="viewprojects.php?barista_id=<?php echo urlencode($_GET['barista_id']); ?>">
		View The Projects
	</a>
	<h1>Edit the project!</h1>
	<?php $getProjectByID = getProjectByID($pdo, $_GET['project_id']); ?>
	<form action="core/handleForms.php?project_id=<?php echo urlencode($_GET['project_id']); ?>&barista_id=<?php echo urlencode($_GET['barista_id']); ?>" method="POST">
		<p>
			<label for="projectName">Project Name</label> 
			<input type="text" name="projectName" 
			value="<?php echo htmlspecialchars($getProjectByID['project_name']); ?>">
		</p>
		<p>
			<label for="description">Description</label> 
			<textarea name="description"><?php echo htmlspecialchars($getProjectByID['description']); ?></textarea>
		</p>
		<p>
			<input type="submit" name="editProjectBtn" value="Update Project">
		</p>
	</form>
</body>
</html>
