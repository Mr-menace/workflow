<?php
	session_start();

	if (isset($_SESSION["email"]) && isset($_SESSION["loggedIn"])) {
		header("Location: index.php");
		exit();
	}

	if (isset($_POST["logIn"])) {
		$connection = new mysqli("localhost", "root", "", "accounts");
		
		$email = $connection->real_escape_string($_POST["email"]);
		$password = $connection->real_escape_string($_POST["password"]);
		$data = $connection->query("SELECT Username, Password FROM tbusers WHERE Username='$email' AND Password='$password'");

		if ($data->num_rows > 0) {
			$_SESSION["email"] = $email;
			$_SESSION["loggedIn"] = 1;
			
			header("Location: index.php");
			exit();

		} else {
			
			echo "Please check your inputs!";
		}
	}	
?>      
<html>
<body>            
	<form action="login.php" method="post"> 			 	                    			
    	<input type="text" name="email" placeholder="Email"/><br />															 <input type="password" name="password" placeholder="Password"/> <br />						                          <input type="submit" value="Log In" name= "logIn" > 				
    </form>    
</body>
</html>