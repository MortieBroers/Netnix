<form method="POST">
    <input type="text" name="password" />
</form>

<?php


if (isset($_POST['login'])) {
    $Password = $_POST['password'];
    $PasswordHash = password_hash($Password, PASSWORD_DEFAULT);
    password_verify($Password, $db);
    echo $PasswordHash;
}
?>