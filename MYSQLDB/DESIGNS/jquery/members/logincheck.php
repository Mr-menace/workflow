<?php
	session_start();

	if (!isset($_SESSION["email"]) || !isset($_SESSION["loggedIn"])) {
			header("Location: login.php");
			exit();
	}	

	if (isset($_POST['sessEnd']))
	{
		session_destroy();
		
	}
?>   
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<form method="post">
	<input type="Submit" name="sessEnd" value="Log out" >
</form>
</body>
</html>   