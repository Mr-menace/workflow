<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><center><fieldset>
<legend> Simple Record Adding:</legend>
    <form method="post"> 
  
    <br>
        Username:<br><input type="text" name="username"><br>
        Password:<br><input type="text" name="pass"><br>
        Email:<br><input type="text" name="email"><br>

        <button type="Submit" name=sub-go>Add Record </button>
        </form>
        </fieldset>
        
</body>
</html>
<?php
//require "Update.php";
$server="localhost";
$user="root";
$pass="";
$db="accounts";

$constr=mysqli_connect($server, $user,$pass,$db);
//CHECK THE CONNECTIVITY 
if ($constr==false)
{
echo "failed to load Database: ". mysqli_connect_error();
}else
{
    echo "Connection Success";

    if (isset($_POST['sub-go']))
    {
        $usr=$_POST['username'];
        $pwd=$_POST['pass'];
        $eml=$_POST['email'];

        $sql="INSERT INTO tbusers (Username, Password, email) VALUES ('$usr', '$pwd', '$eml')";
        //when this line enabled it will insert 2 records $result=mysqli_query($constr, $sql);

        if(mysqli_query($constr, $sql)){
            echo "Records inserted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($constr);
        }

    }

}
//Close Connection 
mysqli_close($constr);

?>