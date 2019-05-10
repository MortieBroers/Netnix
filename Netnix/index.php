<?php
require_once "navbar.php";

?>
<link rel="stylesheet" type="text/css" href="../Semantic/semantic.min.css">
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous">
</script>
<script src="../Semantic/semantic.min.js"></script>
<div>
    <?php
    require_once "functions.php";

    $loginToken = $_SESSION['loginToken'];

    while ($row = $select->fetch()) {
        $query = "SELECT * FROM film";
        $select = $con->prepare($query);
        $select->setFetchMode(PDO::FETCH_ASSOC);
        $select->execute();
        $rowProfile = $select->fetch();
    }
    ?>
</div>

<div class="ui inverted vertical masthead center aligned segment">
    <div class="ui text container">
        <h1 class="ui inverted header">
            Home
        </h1>
        <h2>Welcome to Netnix.</h2>
    </div>
</div>

<div>
</div>

<div class="ui middle aligned stackable grid container">
    <div class="row">
        <div class="eight wide column">
            <h3 class="ui header">We Have Alot Of Movies On This Site.</h3>
            <p>Enjoy the best movies on our site. We have movies like: African Egg, Academy Dinosaur and Ace Goldfinger!!</p>
            <h3 class="ui header">All The Movies Are Free To Watch!</h3>
            <p>Yes that's right! All our movies are free to watch! You can freely browse our movie-library.</p>
        </div>
        <div class="six wide right floated column">
            <img src="../Netnix/Images/movie.jpg" class="ui large bordered rounded image">
        </div>
    </div>
    <div class="row">
        <div class="center aligned column">
            <a href="movie.php" class="ui huge button">Check Them Out</a>
        </div>
    </div>
</div>

<div class="ui vertical stripe quote segment">
    <div class="ui equal width stackable internally celled grid">
        <div class="center aligned row">
            <div class="column">
                <h3>"Wow This Company Is So Nice!!"</h3>
                <p>That Is What They All Say About Us</p>
            </div>
            <div class="column">
                <h3>"I Can't Believe I Didn't Knew This Site Before!"</h3>
                <p>
                    <img src="../Netnix/Images/person.png" class="ui avatar image"> <b>Nelis Wouters Warnarius</b> Owner of Metflix
                </p>
            </div>
        </div>
    </div>
</div>

<div class="ui vertical stripe segment">
    <div class="ui container">
        <?php ShowSomeMovies(); ?>
    </div>
</div>

<div class="ui inverted vertical footer segment">
    <div class="ui container">
        <div class="ui stackable inverted divided equal height stackable grid">
            <div class="three wide column">
                <h4 class="ui inverted header">Movies</h4>
                <div class="ui inverted link list">
                    <a href="movie.php" class="item">Movies</a>
                    <a href="movie.php" class="item">Movies</a>
                    <a href="movie.php" class="item">Religious Movies</a>
                    <a href="movie.php" class="item">Gazebo Movies</a>
                </div>
            </div>
            <div class="three wide column">
                <h4 class="ui inverted header">Services Movies</h4>
                <div class="ui inverted link list">
                    <a href="movie.php" class="item">Banana Movies</a>
                    <a href="movie.php" class="item">DNA Movies</a>
                    <a href="movie.php" class="item">How To Access Movies</a>
                    <a href="movie.php" class="item">Favorite X-Men Movies</a>
                </div>
            </div>
            <div class="seven wide column">
                <h4 class="ui inverted header">Netnix</h4>
                <p>The place to watch free movies!</p>
            </div>
        </div>
    </div>
</div>