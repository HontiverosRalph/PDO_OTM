<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Barista Project Management</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<a href="index.php">Return to home</a>
	<?php 
	// Get the barista ID from the URL parameter
	$barista_id = $_GET['barista_id']; 
	$getAllInfoByBaristaID = getAllInfoByBaristaID($pdo, $barista_id); 
	?>
	
	<?php if ($getAllInfoByBaristaID): ?>
		<h1>Username: <?php echo htmlspecialchars($getAllInfoByBaristaID['username']); ?></h1>
		<h1>Add New Project</h1>
		<form action="core/handleForms.php?barista_id=<?php echo $barista_id; ?>" method="POST">
			<p>
				<label for="projectName">Project Name</label> 
				<input type="text" name="projectName" required>
			</p>
			<p>
				<label for="description">Project Description</label> 
				<textarea name="description" required></textarea>
			</p>
			<p>
				<input type="submit" name="insertNewProjectBtn" value="Add Project">
			</p>
		</form>

		<table style="width:100%; margin-top: 50px;">
		  <tr>
		    <th>Project ID</th>
		    <th>Project Name</th>
		    <th>Description</th>
		    <th>Date Added</th>
		    <th>Action</th>
		  </tr>
		  <?php $getProjectsByBarista = getProjectsByBarista($pdo, $barista_id); ?>
		  <?php foreach ($getProjectsByBarista as $row): ?>
		  <tr>
		  	<td><?php echo htmlspecialchars($row['project_id']); ?></td>	  	
		  	<td><?php echo htmlspecialchars($row['project_name']); ?></td>	  	
		  	<td><?php echo htmlspecialchars($row['description']); ?></td>	  	
		  	<td><?php echo htmlspecialchars($row['date_added']); ?></td>
		  	<td>
		  		<a href="editproject.php?project_id=<?php echo $row['project_id']; ?>&barista_id=<?php echo $barista_id; ?>">Edit</a>
		  		<a href="deleteproject.php?project_id=<?php echo $row['project_id']; ?>&barista_id=<?php echo $barista_id; ?>">Delete</a>
		  	</td>	  	
		  </tr>
		  <?php endforeach; ?>
		</table>
	<?php else: ?>
		<h1>No barista found with the provided ID.</h1>
	<?php endif; ?>
</body>
</html>
