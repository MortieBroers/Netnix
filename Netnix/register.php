<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
<script src='jquery-3.3.1.min.js'></script>

<link rel="stylesheet" type="text/css" href="style.css">
<?php
require_once "functions.php";
require_once "config.1.php";
session_start();


echo <<<END
<h1 class='w3-blue w3-center w3-allerta TextBar'>Register</h1>
<form method="POST" class='w3-display-middle w3-container'>   
    <label>Username</label>
    <input class="w3-input w3-border" type="text" name="username" placeholder="Username" required><br/><br/>    
    <label>Password</label>
    <input class="w3-input w3-border" type="password" name="password" placeholder="Password" required><br/><br/>
    <label>Email</label>
    <input class="w3-input w3-border" type="email" name="email" placeholder="Email" required><br/><br/>
    <input class='w3-btn w3-blue w3-round-xlarge' type="submit" name="Register" value="Register">  
    <div name="Back">
    <a>Already Signed Up?  </a><a class='w3-center' href="login.php">Login Here!</a>
  </div>   
    
</form>

END;


if (isset($_POST['Register'])) {
    $con = connection();

    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $Username = $_POST['username'];


    $selectCheck = $con->prepare("SELECT * FROM account WHERE Email = '$Email'");
    $selectCheck->execute();
    $row = $selectCheck->fetch();
    if ($row) {
        echo "<div class='w3-panel w3-red w3-center'>
              <h3>$Email already exist!, Try to Login!</h3>
              </div> ";
    } else {
        $PassAndEmail = $Email . $Password;
        $PasswordHash = hash('sha256', $PassAndEmail);

        $select = $con->prepare("INSERT INTO account(Username,Password,Email,LoginToken) VALUES ('$Username','$PasswordHash','$Email','') ");
        $select->execute();
        Redirect('login.php', false);
    }
}