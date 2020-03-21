<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        
</head>
<body>

<div class="valign-wrapper row login-box">
  <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">
    <form method="post">
      <div class="card-content">
        <span class="card-title">Authentication Required</span>
        <div class="row">
          <div class="input-field col s12">
            <label for="email">Email address</label>
            <input type="text" class="validate" name="email" id="email" />
          </div>
          <div class="input-field col s12">
            <label for="password">Password </label>
            <input type="password" class="validate" name="password" id="password" />
          </div>
        </div>
      </div>
      <div class="card-action right-align">
        <input type="reset" id="reset" class="btn-flat grey-text waves-effect">
        <input type="submit" class="btn green waves-effect waves-light" value="Login" name="log">
      </div>
    </form>
  </div>
</div>
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

if (isset($_POST['log']))
{
    //search muna sa ID kung may match 
$check="SELECT Username, Password FROM tbusers WHERE Username='$_POST[email]' && Password='$_POST[password]'";
$checker=mysqli_query($sql,$check);


if (mysqli_num_rows($checker) <1)
{
echo"<font color=red><center>***No Such Record Found***</font></center>";

}else{

  $_SESSION['User'] = "$_POST[email]";

    echo "<center><font color=green>***Record Found*** </center></font>";
    $path = $_SERVER['localhost'].'/MYSQLDB/AJAX';
    echo "<br>Welcome! Login Success!";
    header("Location:$path/index.php");  
}

}

// Close connection
mysqli_close($sql);



?> 
