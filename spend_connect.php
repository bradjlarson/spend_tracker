
<?php
include("db_connect.php");
mysql_select_db("spend");
/*
// Create table


$sql = "CREATE TABLE House2
(rowID int NOT NULL AUTO_INCREMENT,
PRIMARY KEY(rowID),
Name varchar(15),
Type varchar(15),
Item char(100)
)";

// Execute query
mysql_query($sql,$con);
*/

// Insert values
$sql="INSERT INTO trxn (date_time, amount, spend_locale, spend_type, category, item, joint)
VALUES
(curdate(),'$_POST[amount]','$_POST[spend_locale]','$_POST[spend_type]','$_POST[category]','$_POST[item]','$_POST[group]')";

if (!mysql_query($sql))
  {
  die('Error: ' . mysql_error());
  }
$redirectURL = 'http://shopsimply.me/spend/';
header("Location: ".$redirectURL);
?>
