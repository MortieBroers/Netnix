<?php
function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}

function CheckLoginToken()
{
    if (isset($_SESSION['loginToken'])) {
        $loginToken = $_SESSION['loginToken'];
    } else {
        Redirect('login.php', false);
    }
}

function ShowAllMovies()
{
    require_once "config.1.php";
    require_once "getprofile.php";

    $select = $con->prepare("SELECT * FROM film");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>";
    echo "Title";
    echo "</th>";
    echo "<th>";
    echo "Description";
    echo "</th>";
    while ($row = $select->fetch()) {
        echo "</tr>";
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
}