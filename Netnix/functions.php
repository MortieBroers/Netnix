<?php
function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);
    exit();
}

function CheckLoginToken(){    
    if( isset( $_SESSION['loginToken'] ) ) 
    {
          $loginToken = $_SESSION['loginToken'];      
    }
    else 
    { 
        Redirect('login.php', false);
    }
}
?>