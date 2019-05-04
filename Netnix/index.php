<?php
require_once "navbar.php";

?>
<div>
    <h2 class="w3-container w3-blue w3-center w3-allerta TextBar">Posted Messages</h2>
    <?php

    $loginToken = $_SESSION['loginToken'];

    while ($row = $select->fetch()) {
        $query = "SELECT title FROM film ORDER BY film_id DESC";
        $select2 = $con->prepare($query);
        $select2->setFetchMode(PDO::FETCH_ASSOC);
        $select2->execute();
        $rowProfile = $select2->fetch();
        echo "<table class='w3-bordered w3-border indexStuff'";
        echo "<tr class='w3-border'>";
        echo "  <th>Title</th>
              </tr>";
        echo "<tr class='w3-border'>";
        echo "<td>" . $rowProfile['title'] . "</td>";
        echo "</tr>";
        echo "<br/>";
        echo "</table>";
    }


    ?>

</div>