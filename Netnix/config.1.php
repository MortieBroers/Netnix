<?php
function connection(){
  $host= "localhost";
  $username = "root";
  $password  = "";
  $dbname = "socialmediadb";
  $options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);

  return new PDO("mysql:host=$host;dbname=$dbname","$username","$password",$options);
}

?>