<?php 

SESSION_Start();


?>
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
<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getuser.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>

<form>

<select name="users" onchange="showUser(this.value)">
  <option value="">Select a person:</option>
  <option value="1">Peter Griffin</option>
  <option value="6">Lois Griffin</option>
  <option value="7">Joseph Swanson</option>
  <option value="8">Glenn Quagmire</option>
  <option value="0">Show all </option>
  </select>
</form>
<input type="text" name="inpt" onkeyup="showUser(this.value)">
</form>

<br>
<div id="txtHint"><b>Person info will be listed here...</b></div>
</body>
</html>


<?php 


//load all records
$con = mysqli_connect('localhost','root','','my_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
    //session natin ay di naka set
    if (!isset($_SESSION['User'])){
        echo "Please Login :(";
    }
    else
    {
    echo "WELCOME!: ".$_SESSION['User'];

    mysqli_select_db($con,"ajax_demo");
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
}
    echo "</table>"; 

    ECHO "
    <form method=post action=index.php>
    <button type=submit name=log > Logout</button>
    </form>
    ";
if (isset($_POST['log'])) {
    session_destroy();
    echo "Session Destroyed";
    $path = $_SERVER['localhost'].'/MYSQLDB/DESIGNS';
    header("location:$path/Login.php");
}

mysqli_close($con);

?>