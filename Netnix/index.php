<?php
require_once "navbar.php";
?>
<h1 class="w3-container w3-blue w3-center w3-allerta TextBar">New message</h1>
<form method="POST">
    <textarea class="indexStuff" name="message" rows="5" cols="40" required>
</textarea><br /><br />
    <input class='w3-btn w3-blue w3-round-xlarge indexStuff' type="submit" name="Post" value="Post">
</form>