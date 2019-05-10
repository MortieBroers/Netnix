<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
<script src='jquery-3.3.1.min.js'></script>
<link rel="stylesheet" type="text/css" href="../Semantic/semantic.min.css">
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous">
</script>
<script src="../Semantic/semantic.min.js"></script>
<style>
    body>.grid {
        height: 80%;
    }

    .column {
        max-width: 450px;
    }
</style>
<?php
require_once "functions.php";
require_once "config.1.php";
session_start();

echo <<<END
<div class="ui inverted vertical masthead center aligned segment">
        <div class="ui text container">
            <h1 class="ui inverted header">
                Netnix
            </h1>
            <h2>Create Your Account.</h2>
        </div>
    </div>
<div class="ui middle aligned center aligned grid">
    <div class="column">
        <form method="POST" class="ui large form">
        <div class="ui stacked secondary  segment">
            <div class="field">
            <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="text" name="username" placeholder="Username" required>
            </div>
            </div>
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
            <input class="ui button" type="submit" name="Register" value="Register">
        </div>
        </form>

        <div class="ui message">
            Already have an account? <a href="login.php">Log in</a>
        </div>
    </div>
</div>

END;


if (isset($_POST['Register'])) {
    $con = connection();

    $Username = $_POST['username'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];

    $selectCheck = $con->prepare("SELECT * FROM account WHERE Email = '$Email'");
    $selectCheck->execute();
    $row = $selectCheck->fetch();
    if ($row) {
        echo "<div>
        <p class='ui error message'>
        $Email is already in use.
        </p>";
    } else {
        $PassAndEmail = $Email . $Password;
        $PasswordHash = hash('sha256', $PassAndEmail);

        $select = $con->prepare("INSERT INTO account(Username,Email,Password,LoginToken) VALUES ('$Username','$Email','$PasswordHash','') ");
        $select->execute();
        Redirect('login.php', false);
    }
}
