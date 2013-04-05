<?php
/* Include all the classes */
include("lib/pChart/class/pDraw.class.php");
include("lib/pChart/class/pImage.class.php");
include("lib/pChart/class/pData.class.php");
include("db_connect.php");

/*Create dataset object */
$myData = new pData();
/* Add data in your dataset */
/* Build the query that will returns the data to graph */


$sql = "SELECT left(date_time,7) as vintage, /*count(id) as num_trxn,*/ sum(amount) as amount_spent from trxn group by 1 order by 1";
$Result   = mysql_query($sql);
$vintage=""; $amount_spent=""; $num_trxn="";
while($row = mysql_fetch_array($Result))
 {
  // Push the results of the query in an array 
  $vintage[]   = $row["vintage"];
 // $num_trxn[] = $row["num_trxn"];
  $amount_spent[]    = $row["amount_spent"];
 }
// Save the data in the pData array 
$myData->addPoints($vintage,"vintage");
// $myData->addPoints($num_trxn,"num_trxn");
$myData->addPoints($amount_spent,"amount_spent");
// Put the timestamp column on the X axis 
$myData->setAbscissa("vintage");
$myData->setSerieOnAxis("amount_spent", 0);
$myData->setAxisUnit(0,"$");
$myData->setXAxisName("Month");



//$myPicture = new pImage(700,230,$MyData);
//$myData->addPoints(array(VOID,3,4,3,5));

$myPicture = new pImage(700,230,$myData); //width, height, dataset
$myPicture->setGraphArea(60,40,670,190); //x,y,width,height
//Make sure the path to the font is correct
$myPicture->setFontProperties(array("FontName"=>"lib/pChart/fonts/verdana.ttf","FontSize"=>6));
$myPicture->drawText(250,55,"Spending by Month",array("FontSize"=>12,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));
$myPicture->drawScale();
$myPicture->drawBarChart(array("DisplayValues"=>TRUE,"DisplayColor"=>DISPLAY_AUTO,"Rounded"=>TRUE,"Surrounding"=>60));
//$myPicture->drawSplineChart();
$myPicture->autoOutput("monthly.png");
?>