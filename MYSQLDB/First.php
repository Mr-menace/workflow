<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method ="post" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="text" name="del" placeholder="Type the record"><br>
<button type="Submit" name ="delete">Delete Records with this texts</button>
<br><br>
</form>
</body>
</html>
<!-- i Created this for myself to refresh my knowledge on this topic whenever i forgot it -Dens :) -->
<!-- test mysql connection -->
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$server = "localhost";
$username = "root"; //or leave it empty :)
$pass = "";
$database = "accounts";

$link = mysqli_connect($server, $username, $pass,$database);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Print host information
echo "<font color=red>MYSQL is Installed and active in your machine. Host info: " . mysqli_get_host_info($link);
echo "</font><br> <br>";

//Inserting records
// Attempt insert query execution with multiple insertion

 $sql = "INSERT INTO tbusers (Username, Password, email) VALUES ('Peter', 'Parker', 'peterparker@mail.com'),
 ('Peter', 'Parker', 'peterparker@mail.com'),
 ('Peter', 'Parker', 'peterparker@mail.com')";


if(mysqli_query($link, $sql)){
    echo "<font color=green>Records inserted successfully. </font><br><br>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
} 
 $sel= "SELECT id, Username, Password, email FROM tbusers";
 $result = $link->query($sel);

 if ($result->num_rows > 0) {
    // output data of each row
 
    while($row = $result->fetch_assoc()) {
      
        echo "" . $row["Username"]. " " . $row["Password"]. " " . $row["email"]. "<br>";
    }
    
 
} else {
    echo "0 results";
    
}
//PANG DELETE NATEN
if (isset($_POST['delete']))
{
    $name=$_POST['del'];
    $sel = "DELETE FROM tbusers WHERE Username='Peter'";
    $result = $link->query($sel);

    if(mysqli_query($link, $sel)){
        echo "Records were deleted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

}


// Close connection
mysqli_close($link);

?>
