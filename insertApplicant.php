<?php 
require_once 'core/handleForms.php'; 
require_once 'core/models.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Law Application</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h1>Edit Applicant</h1>
	<form action="core/handleForms.php" method="POST">
	<p>
			<label for="first_name">First Name</label> 
			<input type="text" name="first_name" required>
		</p>
		<p>
			<label for="last_name">Last Name</label> 
			<input type="text" name="last_name" required>
		</p>
		<p>
			<label for="age">Age</label> 
			<input type="number" name="age" required>
		</p>
		<p>
			<label for="gender">Gender</label>
			<input type="text" name="gender" required>
		</p>
		<p>
			<label for="email">Email Address</label> 
			<input type="text" name="email" required>
		</p>
		<p>
			<label for="contact_info">Contact Number</label>
            <input type="text" name="contact_info"  maxlength="11" required>
		</p>
		<p>
			<input type="submit" name="insertApplicantBtn">
		</p>
		
	</form>
</body>
</html>