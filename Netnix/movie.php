<?php require_once "navbar.php" ?>
<div>
    <h2 class="w3-container w3-blue w3-center w3-allerta TextBar">Movies</h2>

    <?php
    $select = $con->prepare("SELECT * FROM film");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    echo "<table border='1'>";
    while ($row = $select->fetch()) {
        echo"<tr>";
        echo"<th>";
        echo"Title";
        echo"</th>";
        echo"Description";
        echo"<th>";
        echo"</th>";
        echo"</tr>";
        echo "  <tr>";
        echo "    <td>";
        echo $row['title'];
        echo "    </td>";
        echo "    <td>";
        echo $row['description'];
        echo "    </td>";
        echo "    </td>";
        echo "  </tr>";
    }
    echo "</table>";
    ?>


</div>