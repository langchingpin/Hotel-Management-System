<?php  
 session_start();  
 if(isset($_SESSION["user"]))  
 {  
      header("location:home.php");  
 }  
 
 ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>SUN VIEW ADMIN</title>
  
  
     
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <div id="clouds">
	<div class="cloud x1"></div>
	<div class="cloud x2"></div>
	<div class="cloud x3"></div>
	<div class="cloud x4"></div>
	<div class="cloud x5"></div>
  <div class="cloud x6"></div>
  <div class="cloud x7"></div>
</div>

 <div class="container">


      <div id="login">

        <form method="post">

          <fieldset class="clearfix">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
            <p><span class="fas fa-user"></span><input type="text"  name="user" value="Username" onBlur="if(this.value == '') this.value = 'Username'" onFocus="if(this.value == 'Username') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
            <p><span class="fas fa-lock"></span><input type="password" name="pass"  value="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
            <p><input type="submit" name="sub"  value="Login"></p>

          </fieldset>

        </form>

       

      </div> <!-- end login -->

    </div>
    <div class="bottom">  <h3><a href="../index.php">SUN VIEW HOMEPAGE</a></h3></div>
  
  
</body>
</html>

<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form
    $myusername = mysqli_real_escape_string($con, $_POST['user']);
    $mypassword = mysqli_real_escape_string($con, $_POST['pass']);

    $sql = "SELECT id, pass FROM login WHERE usname = '$myusername'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die('Query failed: ' . mysqli_error($con));
    }

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1 ) {
        $_SESSION['user'] = $myusername;
        header("location: home.php");
    } else {
        echo '<script>alert("Your Login Name or Password is invalid") </script>';
    }
}
?>

