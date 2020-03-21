<?php 
session_start();
if (isset($_SESSION['loggedIn'])){
    header('location:server_time.php');
}



if(isset($_POST['login'])){

    $server="localhost";
    $user="root";
    $pass="";
    $db="accounts";
    $connection = new mysqli($server,$user,$pass,$db);

    $email = $connection->real_escape_string($_POST['emailPHP']);
    $password=$connection->real_escape_string($_POST['passwordPHP']);

    $data = $connection->query("SELECT id FROM tbusers WHERE Username='$email' AND Password='$password'" );

    if ($data->num_rows>0){
        $_SESSION['loggedIn'] = 'email';
       // header('location:server_time.php');
        exit('Success');
       
    }else
    exit('Failed');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jquery with AJAX and PHP!</title>
</head>
<body>
    
    <form method="post" action="login.php">

        <input type="text" id="email" placeholder="Email Here"><br>
        <input type="password" id="password" placeholder="Password Here" ><br>
        <input type="button" value="Log in" id="login">
</form>
<p id="response"> </p>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
</script>
<script type="text/javascript">

    $(document).ready(function()
    {
      // console.log("ready");
      $("#login").on('click', function (){
        
        var email = $("#email").val();
        var password = $("#password").val();

        if (email=="" || password=="")
        alert('Please Fill Fields');

else {

    $.ajax(
{
    url: 'login.php',
    method: 'POST',
    data: {
        login: 1,
        emailPHP: email,
        passwordPHP: password,    
    },
       success: function(response){
        //console.log(response);
        $("#response").html(response);

        if (response=='Success')

            window.location = 'server_time.php';
       
    },
    datatype:'text'

      });
}
      });
    });

 </script>

</body>
</html>