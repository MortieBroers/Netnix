<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
    <script src='jquery-3.3.1.min.js'></script>

    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="w3-bar w3-black w3-center navbarWidth">
        <a href="index.php" id="hyvebook">Netnix</a>
        <a href=" index.php" id='homeButton' class=" w3-button w3-mobile navbarButtonWidth">Home</a>
        <a href="movie.php" id='friendsButton' class=" w3-button w3-mobile navbarButtonWidth">Movie</a>
        <a href="logout.php" id='logoutButton' class=" w3-button w3-mobile navbarButtonWidth">Logout</a>
        <a>
            <img class="userimagesmall" src=".\img\unknownperson.png" />
            <?php
            session_start();

            require_once "config.1.php";
            require_once "functions.php";

            CheckLoginToken();

            require_once "getprofile.php";
            echo $Username;
            ?>
        </a>
    </div>