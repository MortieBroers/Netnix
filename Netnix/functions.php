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

function ShowSomeMovies()

{
    require_once "config.1.php";
    $con = connection();
    $select = $con->prepare("SELECT * FROM film AS title LIMIT 6");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    echo '<br>';
    echo '<h2 class="ui center aligned header">';
    echo 'Some Movies For You: ';
    echo '</h2>';
    echo '<br>';
    echo '<div class="ui three column doubling grid container">';
    while ($row = $select->fetch()) {
        echo '<div class="column">';
        echo '<button class="ui segment">';
        echo '<img src=' . $row["Image"] . ' style="max-height: 100px; width: auto;" >';
        echo '<br></br>';
        echo $row["title"];
        echo '<br></br>';
        echo $row["description"];
        echo '</button>';
        echo '</div>';
    }
    echo '</div>';
}

function ShowAllMoviesSearch($searchText)
{
    require_once "config.1.php";
    $con = connection();

    $select = $con->prepare("SELECT * FROM film WHERE title like '%" . $searchText . "%'");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    echo '<br>';
    echo '<h2 class="ui center aligned header">';
    echo "Searching for: $searchText";
    echo '</h2>';
    echo '<br>';
    echo '<div class="ui two column stackable grid container">';
    while ($row = $select->fetch()) {
        echo '<div class="column">';
        echo '<button class="ui segment">';
        echo '<img src=' . $row["Image"] . ' style="max-height: 250px; width: auto;" >';
        echo '<br></br>';
        echo $row["title"];
        echo '<br></br>';
        echo $row["description"];
        echo '</button>';
        echo '</div>';
    }
    echo '</div>';
}
