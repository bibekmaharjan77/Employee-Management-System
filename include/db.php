<?php 
// creating data source network first because we are doing it in PDO style
$DSN='mysql:host=localhost;dbname=ems';
$connecting_db= new PDO($DSN,'root','');
?>