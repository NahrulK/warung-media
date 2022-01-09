<?php
$servername = "localhost";
$username = "root";


// Create connection
$con = new mysqli($servername, $username, "", "warung_media");

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

?>