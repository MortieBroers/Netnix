<?php
require_once "navbar.php";

?>
<div>
    <h2 class="w3-container w3-blue w3-center w3-allerta TextBar">Posted Messages</h2>
    <?php

    $loginToken = $_SESSION['loginToken'];

    $select = $con->prepare("SELECT * FROM film ORDER BY film_id DESC");
    $select->bindParam(':dbidUser',  $dbidUser);
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();

    while ($row = $select->fetch()) {
        $query = "SELECT * FROM profile WHERE idUser = " . $row['Profile_idUser'];
        $select2 = $con->prepare($query);
        $select2->setFetchMode(PDO::FETCH_ASSOC);
        $select2->execute();
        $rowProfile = $select2->fetch();
    }



    ?>

</div>