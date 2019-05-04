<?php
$loginToken = $_SESSION['loginToken'];

$con = connection();

$select = $con->prepare("SELECT * FROM account WHERE LoginToken='$loginToken'");
$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();
$data = $select->fetch();
$dbidUser = $data['ID'];
$dbUsername = $data['Firstname'];
$dbEmail = $data['Email'];