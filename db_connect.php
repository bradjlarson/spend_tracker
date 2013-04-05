<?php
// Connects to Database 
$con = mysql_connect("localhost","root","Shop!1856");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
// Select "spend" database
mysql_select_db("spend", $con);
?>
