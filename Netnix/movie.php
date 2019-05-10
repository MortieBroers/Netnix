<?php require_once "navbar.php" ?>
<?php require_once "functions.php" ?>

<link rel="stylesheet" type="text/css" href="../Semantic/semantic.min.css">
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous">
</script>
<script src="../Semantic/semantic.min.js"></script>
<script>
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 2000 || document.documentElement.scrollTop > 2000) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
<style>
    #myBtn {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 99;
        border: none;
        outline: none;
        background-color: white;
        color: black;
        cursor: pointer;
        padding: 10px;
        border-radius: 5px;
        font-size: 18px;
    }
    #myBtn:hover{
        background-color: black;
        color: white;
    }
</style>


<div>
    <div class="ui inverted vertical masthead center aligned segment">
        <div class="ui text container">
            <h1 class="ui inverted header">
                Movies
            </h1>
            <h2>Enjoy Our Movies!</h2>
        </div>
    </div>
    <div class="ui container">
        <div id="Movies" class="ui segments">
            <?php
            if (isset($_GET['searchtext'])) {
                $searchText = $_GET['searchtext'];
            } else {
                $searchText = '';
            }
            ShowAllMoviesSearch($searchText);
            ?>
        </div>
    </div>
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
</div>