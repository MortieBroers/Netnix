<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
<script src='jquery-3.3.1.min.js'></script>

<link rel="stylesheet" type="text/css" href="style.css">
<h1 class='w3-container w3-blue w3-center w3-allerta TextBar'> Login here</h1>

<form method="POST" class='w3-display-middle w3-container'>
    <label>Email</label>
    <input type="email" name="email" placeholder="Email" class="w3-input w3-border" required><br /><br />
    <label>Password</label>
    <input type="password" name="password" placeholder="*******" class="w3-input w3-border" required><br /><br />
    <input class='w3-btn w3-blue w3-round-xlarge' type="submit" name="login" value="Login">
    <div name="Regist">
        No Account? <a href="register.php">Signup Here!</a>
    </div>
</form>

<?php
session_start();
require_once "config.1.php";
try {
    $con = connection();

    if (isset($_POST['register'])) {
        header("location:register.php");
    }

    if (isset($_POST['login'])) {
        $Email = $_POST['email'];
        $Password = $_POST['password'];
        $PassAndEmail = $Email . $Password;
        $PasswordHash = hash('sha256', $PassAndEmail);
        $select = $con->prepare("SELECT * FROM account WHERE Email=:Email");
        $select->bindParam(':Email', $Email);
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();
        $data = $select->fetch();
        $dbEmail = $data['Email'];
        $dbPassword = $data['Password'];
        if ($dbEmail == $Email && $PasswordHash == $dbPassword) {
            $loginToken = uniqid();
            $_SESSION['loginToken'] = $loginToken;
            echo $_SESSION['loginToken'];

            $select = $con->prepare("UPDATE account SET LoginToken=:loginToken WHERE Email=:Email");
            $select->bindParam(':loginToken', $loginToken);
            $select->bindParam(':Email', $Email);
            $select->execute();
            header("location:index.php");
        } else {
            echo "Invalid Email or Password";
        }
    }
} catch (PDOException $error) {
    echo "error" . $error->getMessage();
}

?>