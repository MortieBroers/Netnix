<?php
require_once "navbar.php";

?>
<h1 class="w3-container w3-blue w3-center w3-allerta TextBar">New message</h1>
<form method="POST">
    <textarea class="indexStuff" name="message" rows="5" cols="40" required>
</textarea><br /><br />
    <input class='w3-btn w3-blue w3-round-xlarge indexStuff' type="submit" name="Post" value="Post">
</form>

<div>
    <h2 class="w3-container w3-blue w3-center w3-allerta TextBar">Posted Messages</h2>
    <?php

    $loginToken = $_SESSION['loginToken'];

    $select = $con->prepare("SELECT * FROM message WHERE Profile_idUser = :dbidUser OR Profile_idUser IN (SELECT Profile_idUser1 
                             FROM profile_is_friends_with_profile WHERE Profile_idUser = :dbidUser ) ORDER BY DateTime DESC");
    $select->bindParam(':dbidUser',  $dbidUser);
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();

    while ($row = $select->fetch()) {
        $query = "SELECT * FROM profile WHERE idUser = " . $row['Profile_idUser'];
        $select2 = $con->prepare($query);
        $select2->setFetchMode(PDO::FETCH_ASSOC);
        $select2->execute();
        $rowProfile = $select2->fetch();
        echo "<table class='w3-bordered w3-border indexStuff'";
        echo "<tr class='w3-border'>";
        echo "  <th>Name</th>
                <th>Message</th> 
                <th>Date</th>
              </tr>";
        echo "<tr class='w3-border'>";
        echo "<td>" . $rowProfile['Firstname'] . " " . $rowProfile['Lastname'] . "</td>"
            . "<td>" . $row['Message'] . "</td>"
            . "<td>" . $row['DateTime'] . "</td>";
        echo "</tr>";
        echo "<br/>";
        echo "</table>";
    }



    ?>

</div>