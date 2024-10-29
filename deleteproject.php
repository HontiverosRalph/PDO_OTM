<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Project</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php 
	// Fetch project information using project ID
	$project_id = $_GET['project_id'];
	$getProjectByID = getProjectByID($pdo, $project_id); 
	?>
	
	<h1>Are you sure you want to delete this project?</h1>
	<div class="container" style="border-style: solid; height: 400px;">
		<?php if ($getProjectByID): ?>
			<h2>Project Name: <?php echo htmlspecialchars($getProjectByID['project_name']); ?></h2>
			<h2>Description: <?php echo htmlspecialchars($getProjectByID['description']); ?></h2>
			<h2>Barista ID: <?php echo htmlspecialchars($getProjectByID['barista_id']); ?></h2>
			<h2>Date Added: <?php echo htmlspecialchars($getProjectByID['date_added']); ?></h2>

			<div class="deleteBtn" style="float: right; margin-right: 10px;">
				<form action="core/handleForms.php?project_id=<?php echo urlencode($project_id); ?>&barista_id=<?php echo urlencode($getProjectByID['barista_id']); ?>" method="POST">
					<input type="submit" name="deleteProjectBtn" value="Delete">
				</form>			
			</div>	
		<?php else: ?>
			<h2>No project found with the provided ID.</h2>
		<?php endif; ?>
	</div>
</body>
</html>
