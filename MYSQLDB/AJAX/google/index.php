<?php 

    session_start();

    if (!isset($_SESSION['access_token']))
    {
        header('location:login.php');
        exit();
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login with Google Account!</title>

  <!--FONT AWESOME-->  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"> 
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <!--BOOTSTRAP-->  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>body {background-color: white;}</style>
</head>
<body>

    <div class="container-fluid" style="margin-top: 100px">
   
        <div class="row justify-content-center">
            <div class="col-md-6 color-offset-3" align="center">
            <img src="<?php echo $_SESSION['picture'] ?>"class="rounded-circle" ><br><br>   
        </div>
    <div class="col-md-9" align="center">
        <table class="table table-hover table-bordered">
            <tbody>
            <tr>
            <td>ID</td>
            <td><?php echo $_SESSION['id'] ?></td>
            </tr>
            <tr>
            <td>Email</td>
            <td><?php echo $_SESSION['email'] ?></td>
            </tr>
            <tr>
            <td>Gender</td>
            <td><?php echo $_SESSION['gender'] ?></td>
            </tr>
            <tr>
            <td>Family Name</td>
            <td><?php echo $_SESSION['familyName'] ?></td>
            </tr>
            <tr>
            <td>Given Name</td>
            <td><?php echo $_SESSION['givenName'] ?></td>
            </tr>
</tbody>

    </div>    
</div>

</body>
</html>
<?php 

echo "<form method=post>
<input type=Submit value=Logout name=log>
</form>
";

if(isset($_POST['log']))
{
    header('location:logout.php');
}


?>