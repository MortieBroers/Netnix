<?php 
$loginToken = $_SESSION['loginToken'];

$con = connection();

$select = $con->prepare("SELECT * FROM profile WHERE LoginToken='$loginToken'");
$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();
$data = $select->fetch();
$dbidUser = $data['idUser'];
$dbFirstname = $data['Firstname'];
$dbLastname = $data['Lastname'];
$dbEmail = $data['Email'];
$dbDescription = $data['Description'];
 