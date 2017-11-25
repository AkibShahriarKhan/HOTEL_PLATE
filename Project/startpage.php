<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    
</head>
<body>

	<?php 
		echo "Hello ".$_SESSION['fname'];
	?>
	<a href="logout.php">logout</a>
</body>

</html>