<?php 

session_start();

?>

<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);
$q2 = strval($_GET['q']);
$con = mysqli_connect('localhost','root','','my_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
if (!isset($_SESSION['User']))
{
    //no action
}
else {
//have action if you're logged in 

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM ajax_demo WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);


try {

    if (is_numeric($q2)){

        if ($q2==0){
        $sql="SELECT * FROM ajax_demo";
        $result = mysqli_query($con,$sql);

    
        echo "<table>
        <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Age</th>
        <th>Hometown</th>
        <th>Job</th>
        </tr>";


        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['FirstName'] . "</td>";
            echo "<td>" . $row['LastName'] . "</td>";
            echo "<td>" . $row['Age'] . "</td>";
            echo "<td>" . $row['Hometown'] . "</td>";
            echo "<td>" . $row['Job'] . "</td>";
            echo "</tr>";
        }
        echo "</table>"; 

    }  
    else{
    
        echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['FirstName'] . "</td>";
        echo "<td>" . $row['LastName'] . "</td>";
        echo "<td>" . $row['Age'] . "</td>";
        echo "<td>" . $row['Hometown'] . "</td>";
        echo "<td>" . $row['Job'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    }
    
}else {
    //echo"not numeric!";

    mysqli_select_db($con,"ajax_demo");
//$sql="SELECT * FROM ajax_demo WHERE FirstName = '".$q2."'";
$sql="SELECT * FROM ajax_demo WHERE FirstName LIKE '".$q2."%'"; //displays all records starting from the string you inputted
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['FirstName'] . "</td>";
        echo "<td>" . $row['LastName'] . "</td>";
        echo "<td>" . $row['Age'] . "</td>";
        echo "<td>" . $row['Hometown'] . "</td>";
        echo "<td>" . $row['Job'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";




}

} catch (Exception $e) {
    echo 'Message: ' .$e->getMessage();
}

}
mysqli_close($con);
?>
</body>
</html>