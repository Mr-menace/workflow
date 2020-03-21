<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<center>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="text" name="ID" Placeholder="Type the ID">
<br>
<input type="text" name="oldemail" placeholder="Type the email Optional">
<br>
New Changes:<br>
<input type="text" name="newname" Placeholder="Type the new name">
<br>
<input type="text" name="newemail" placeholder="Type the new Email">
<br>
<button type="Submit" name="sub-go">Update</button>
<br><br>

    </form>
</body>
</html>
<?php 
$server="localhost";
$user="root";
$pass="";
$db="accounts";

$sql= mysqli_connect($server,$user,$pass,$db);

if($sql === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_POST['sub-go']))
{
    //search muna sa ID kung may match 
$check="SELECT id FROM tbusers WHERE id='$_POST[ID]'";
$checker=mysqli_query($sql,$check);
if (mysqli_num_rows($checker) <1)
{
echo"<font color=red>*No Such Record Found*</font>";

}else{
    //pag may match Diretso sa baba at update agad
$newmail= "UPDATE tbusers SET Username='$_POST[newname]', email='$_POST[newemail]' WHERE id='$_POST[ID]' or Username='$_POST[oldemail]'";
// Attempt update query execution
if(mysqli_query($sql, $newmail)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
}
}
// Close connection
mysqli_close($sql);



?>
