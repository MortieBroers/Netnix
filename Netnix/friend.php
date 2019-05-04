<?php require_once "navbar.php" ?>


<div>
    <h2 class="w3-container w3-blue w3-center w3-allerta TextBar">Friends</h2>
    <?php

    $loginToken = $_SESSION['loginToken'];

    $con = connection();

    $select = $con->prepare("SELECT * FROM profile WHERE idUser IN (SELECT Profile_idUser1 FROM profile_is_friends_with_profile WHERE Profile_idUser = :dbidUser )");
    $select->bindParam(':dbidUser', $dbidUser);
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    echo "<table class='w3-border'>";
    while ($row = $select->fetch()) {
        echo "  <tr class='w3-border'>";

        echo "    <td class='w3-border' width = '30%'>";
        echo "    <img class='imageinfriend' src='.\\img\\", $row['idUser'], ".jpg'>";
        echo "<form method='POST'>";
        echo "    <input class='hide' type='text' name='Profile_idUser1' value =", $row['idUser'], "><br/><br/>";
        echo $row['Firstname'], " ", $row['Lastname'];

        echo "</form>";
        echo "    </td>";
        echo "    <td class='w3-border' width = '70%'>";
        echo $row['Description'];
        echo "    </td>";
        echo "    </td>";
        echo "  </tr>";
    }
    echo "</table>";


    ?>

</div>

<div>
    <h2 class="w3-container w3-blue w3-center w3-allerta TextBar">Add new friends</h2>

    <?php
    $select = $con->prepare("SELECT * FROM profile WHERE idUser <> :dbidUser AND idUser NOT IN (SELECT Profile_idUser1 FROM profile_is_friends_with_profile WHERE Profile_idUser = :dbidUser )");
    $select->bindParam(':dbidUser', $dbidUser);
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    echo "<table border='1'>";
    while ($row = $select->fetch()) {
        echo "  <tr>";

        echo "    <td>";
        echo "    <img class='imageinfriend' src='.\\img\\", $row['idUser'], ".jpg'>";
        echo "<form method='POST'>";
        echo "    <input class='hide' type='text' name='Profile_idUser1' value =", $row['idUser'], "><br/><br/>";
        echo $row['Firstname'], " ", $row['Lastname'];
        echo "    <input class='w3-btn w3-black w3-round-xlarge' type='submit' name='Add' value='Add'>";
        echo "</form>";


        if (isset($_POST['Add'])) {
            $Profile_idUser1 = $_POST['Profile_idUser1'];

            $select = $con->prepare("INSERT INTO profile_is_friends_with_profile VALUES (:dbidUser,:Profile_idUser1) ");
            $select->bindParam(':dbidUser', $dbidUser);
            $select->bindParam(':Profile_idUser1', $Profile_idUser1);
            $select->execute();

            $select = $con->prepare("INSERT INTO profile_is_friends_with_profile VALUES (:Profile_idUser1,:dbidUser) ");
            $select->bindParam(':Profile_idUser1', $Profile_idUser1);
            $select->bindParam(':dbidUser', $dbidUser);
            $select->execute();

            Redirect('friend.php', false);
        }
        echo "    </td>";
        echo "    <td>";
        echo $row['Description'];
        echo "    </td>";
        echo "    </td>";
        echo "  </tr>";
    }
    echo "</table>";
    ?>


</div>