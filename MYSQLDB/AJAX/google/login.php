<?php 

require_once "config.php";
 
    if (isset($_SESSION['access_token']))
    {
        

        header('location:index.php');
        exit();
    }

    $loginURL = $gClient->createAuthURL();

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

            <img src="images/tbp.png" width="30%" ><br><br>

            <form>
           
            <div class="input-group">
            <div class="input-group-addon">
            <i class='far fa-edit'></i>
            </div>
            <input placeholder="Email.." name="email" class="form-control" ><br><br></div>
        
        <div class="input-group">
        <div class="input-group-addon">
        <i class='far fa-edit'></i>
        </div>
            <input type="password" placeholder="Password.." name="email" class="form-control"><br>
        </div>
        <br>
            <input type="Submit" value="Log in" class="btn btn-primary">
            <input type="button" value="Use Google" class="btn btn-success" onclick="window.location= '<?php echo $loginURL ?>';">
            <input type="button" value="Sign up" class="btn btn-danger">

            </form>    
           
        </div>
    </div>    
</div>

</body>
</html>