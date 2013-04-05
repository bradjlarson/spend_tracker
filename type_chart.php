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


$sql = "SELECT category, count(id) as num_trxn, sum(amount) as trxn_amount from trxn where left(current_date,7) = left(date_time,7) group by 1";
$Result  = mysql_query($sql);
$month_day=""; $amount_spent=""; $num_trxn="";
while($row = mysql_fetch_array($Result))
 {
  /* Push the results of the query in an array */
  $month_day[]   = $row["category"];
 // $num_trxn[] = $row["num_trxn"];
  $amount_spent[]    = $row["trxn_amount"];
 }
/* Save the data in the pData array */
$myData->addPoints($month_day,"month_day");
// $myData->addPoints($num_trxn,"num_trxn");
$myData->addPoints($amount_spent,"amount_spent");
/* Put the timestamp column on the X axis */
$myData->setAbscissa("month_day");
$myData->setSerieOnAxis("amount_spent", 0);
$myData->setAxisUnit(0,"$");
$myData->setXAxisName("Date");

//$myPicture = new pImage(700,230,$MyData);
//$myData->addPoints(array(VOID,3,4,3,5));

$myPicture = new pImage(700,230,$myData); //width, height, dataset
$myPicture->setGraphArea(60,40,670,190); //x,y,width,height
//Make sure the path to the font is correct
$myPicture->setFontProperties(array("FontName"=>"lib/pChart/fonts/verdana.ttf","FontSize"=>6));
$myPicture->drawText(250,0,"Necessary vs. Discretionary",array("FontSize"=>12,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));
$myPicture->drawScale();
$myPicture->drawBarChart(array("DisplayValues"=>TRUE,"DisplayColor"=>DISPLAY_AUTO,"Rounded"=>TRUE,"Surrounding"=>60));
//$myPicture->drawSplineChart();
$myPicture->autoOutput("type.png");
?>