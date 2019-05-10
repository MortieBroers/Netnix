<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
<script src='jquery-3.3.1.min.js'></script>

<link rel="stylesheet" type="text/css" href="../Semantic/semantic.min.css">
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous">
</script>
<style>
    body>.grid {
        height: 80%;
    }
    .column {
        max-width: 450px;
    }
</style>
<script>

</script>
<script src="../Semantic/semantic.min.js"></script>

<body>
    <div class="ui inverted vertical masthead center aligned segment">
        <div class="ui text container">
            <h1 class="ui inverted header">
                Welcome to Netnix
            </h1>
            <h2>Log-In To Your Account.</h2>
        </div>
    </div>
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <form method="POST" class="ui large form">
                <div class="ui stacked secondary  segment">
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="user icon"></i>
                            <input type="email" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui left icon input">
                            <i class="lock icon"></i>
                            <input type="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <button name="login" value="Login" class="ui button" type="submit">Login</button>
                </div>
            </form>
            <div class="ui message">
                New to us? <a href="register.php">Register</a>
            </div>
        </div>
    </div>
</body>

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
            echo
                "<p class='ui error message'>
                Invalid Email or Password
            </p>";
        }
    }
} catch (PDOException $error) {
    echo "error" . $error->getMessage();
}

?>