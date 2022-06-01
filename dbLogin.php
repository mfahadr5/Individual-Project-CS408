<?php

// connect to DB
$host = "devweb2020.cis.strath.ac.uk";
$user = "pqb17170";
$pass = "gu9iiGhoh3vo";
$dbname = "pqb17170";
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

