<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js">

    </script>
    <link rel="stylesheet" type="text/css" href="../Semantic/semantic.min.css" />

    <script>
        function searchMovies() {
            searchText = document.getElementById("searchText");
            window.open("movie.php?searchtext=" + searchText.value, "_self")
        }

        $(document).ready(function() {
            $('#searchText').keypress(function(event) {
                var keycode = (event.keyCode);
                if (keycode == '13') {
                    searchMovies();
                }
            });
        });
    </script>
    <script src="../Semantic/semantic.min.js"></script>
</head>

<body>
    <?php
    session_start();

    require_once "config.1.php";
    require_once "functions.php";

    CheckLoginToken();

    require_once "getprofile.php";
    ?>
    <div class="ui secondary menu">
        <div class="item">
            <h4><a href="index.php">Netnix</a></h4>
        </div>
        <a href="index.php" class="item">
            Home
        </a>
        <a href="movie.php" class="item">
            Movies
        </a>
        <div class="right menu">
            <div class="item">
                <?php
                echo "<p> Welcome, " . $dbUsername . "</p>"
                ?>
            </div>
            <div class="item">
                <div class="ui search">
                    <div class="ui icon input">
                        <input class="" id="searchText" type="text" placeholder="Search movie titles...">
                        <i id="searchButton" onclick="searchMovies()" class="search link icon"></i>
                    </div>
                </div>
            </div>
            <a href="logout.php" class="ui item">
                Logout
            </a>
        </div>
    </div>
</body>

</html>