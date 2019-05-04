<?php
require_once "navbar.php";

echo <<<END
<h1 class=' w3-blue w3-center w3-allerta TextBar'> Profile</h1>
<form method="POST" class='w3-display-middle w3-container'>
    <label>Email</label>
    <h5>$dbEmail</h5>
    <label>Firstname</label>
    <input class="w3-input w3-border" type="text" name="firstname" placeholder="Firstname" value = $dbFirstname><br/><br/>
    <label>Lastname</label>
    <input class="w3-input w3-border" type="text" name="lastname" placeholder="Lastname" value = $dbLastname><br/><br/>
    <label>Description</label><br/>
    <textarea rows="5" cols="40" name="description">$dbDescription</textarea><br/><br/>    
    <input class='w3-btn w3-blue w3-round-xlarge' type="submit" name="Save" value="Save">
</form>
END;


if (isset($_POST['Save'])) {
    $Firstname = $_POST['firstname'];
    $Lastname = $_POST['lastname'];
    $Description = $_POST['description'];

    $select = $con->prepare("UPDATE profile SET Firstname = '$Firstname', Lastname = '$Lastname', Description = '$Description' WHERE LoginToken = '$loginToken'");
    $select->execute();

    Redirect('index.php', false);
}