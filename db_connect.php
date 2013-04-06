<?php
// Connects to Database 
$con = mysql_connect("connection","user","password");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
// Select database
mysql_select_db("db", $con);
?>
