<html>
<head>
	<script src="lib/jquery-1.8.3.min.js"></script>
</head>
<body>
<?php
include("db_connect.php");
$sql = "show databases";
$result = mysql_query($sql);
echo '<form action="" id="chartprofile" method="post" onsubmit="get_chart();return false;" >' . PHP_EOL;
echo '<select id="database" name="database" onchange="get_tables(this.value)">' . PHP_EOL;
echo '<option value="DNS Database">Please select a database</option>' . PHP_EOL;
while($row = mysql_fetch_array($result))
{
	echo '<option value="' . $row['Database'] . '">' . $row['Database'] . "</option>" . PHP_EOL;
}
echo "</select>" . PHP_EOL;
echo '<div id="table">' . PHP_EOL;
echo '<select name="table" id="table_select">' . PHP_EOL;
echo '<option value="DNS Database">Please select database first</option>' . PHP_EOL;
echo '</select>' . PHP_EOL;
echo '</div>' . PHP_EOL;
echo '<div id="columns">' . PHP_EOL;
echo '<select name="columns">' . PHP_EOL;
echo '<option value="DNS Table">Please select table first</option>' . PHP_EOL;
echo '</select>' . PHP_EOL;
echo '<input type="hidden" name="xaxis" value="DNS Table">' . PHP_EOL;
echo '<input type="hidden" name="yaxis" value="DNS Table">' . PHP_EOL;
echo '<input type="hidden" name="yaxis_units" value="DNS Table">' . PHP_EOL;
echo '<input type="hidden" name="title" value="DNS Table">' . PHP_EOL;
echo '<input type="hidden" name="chart_type" value="DNS Table">' . PHP_EOL;
echo '<input type="hidden" name="parent_report" value="DNS Table">' . PHP_EOL; 
echo '</div>' . PHP_EOL;
echo '</form>' . PHP_EOL;
?>
<div id="preview">
</div>
	
<script type="text/javascript">
function get_tables(database)
{
	$('#table').load('get_tables.php?database=' + database);
}
</script>
<script type="text/javascript">
function get_columns(table)
{
	var db = document.getElementById("database");
	var database = db.options[db.selectedIndex].value;
	var url = 'get_columns.php?database='+database+'&table='+table;
	$('#columns').load(url);
}
</script>
<script type="text/javascript">
function get_chart() {
	var profile = $("#chartprofile").serialize();
	var title = $("#title").val();
	var report = $("#report").val();
	title.replace(/ /g, "_");	
	if (title != "DNS_Table")
	{
	var title_chart = '<img src="charts/' + report + '/' + title + '.php">';	
	}
	else
	{
	var title_chart ='<p>Please fill out the form correctly...</p>';
	}
	$.ajax(
		{
			type: "POST",
			data: profile,
			url: "chart_connect.php",
			success: function() {
				$('#preview').html(title_chart);
			}
		});
	return false;
};
</script>
</body>
</html>
