<?php
session_start();

if (!isset($_SESSION['loggedIn'])){
    
    echo "Please Log in" ;
}

else {
    
    $today= date("F/j/Y"); 
    $tomorrow = mktime(0, 0, 0, date("m"), date("d")+1, date("y"));
    echo "Today is: $today";
    
    echo " Tomorrow is ".date("F/j/Y", $tomorrow); 
}
if (isset($_POST['rest'])){
    
    session_destroy();
    header('location:login.php');

}
?>
<html>

<body>
<form method="post" action="server_time.php">
    
<input type="Submit" name="rest" value="End Sessions">

</body>

</html>