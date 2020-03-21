<?php
// Array with names
$a[] = "Anna";


$server="localhost";
$user="root";
$pass="";
$db="accounts";

$sql= mysqli_connect($server,$user,$pass,$db);

if($sql === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


// get the q parameter from URL

$sel= "SELECT id, Username, Password, email FROM tbusers";
$result = $sql->query($sel);
$res = array ($result);

 if ($result->num_rows > 0) {
    // output data of each row
 
    while($row = $result->fetch_assoc()) {
      
        echo "" . $row["Username"]. " " . $row["Password"]. " " . $row["email"]. "<br>";
    }
 
} 

if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

?>