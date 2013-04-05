<html>
<head>
	<title>shopsimply.me/spend.php</title>
	<style type="text/css">
	.Results{position:relative; top:-330px; left:300px;}
	.left{float:left;}
	.right{float:left; padding-left:10px;}
	#submit{margin-top:10px; margin-left:10px;}
	.center{text-align:center;}
	.form{height:8000px}
	</style>
</head>
<body>

<div class="Form" id="Form">

<form action="spend_connect.php" method="post">
<h3>What did you buy?</h3>
I bought: <input type="text" name="item" /><br />
<h3>How much did you spend?</h3>
Amount: <input type="text" name="amount" /><br />
<h3>Where did you purchase this from?</h3>
I bought this from: <input type="text" name="spend_locale" /><br />
<h3>Is this necessary or discretionary?</h3>
<select name="category">
<option value="Necessity">Necessity</option>
<option value="Discretionary">Discretionary</option>
</select>
<h3>What type of purchase was this?</h3>
<select name="spend_type">
<option value="Amazon">Amazon</option>
<option value="Books">Books</option>
<option value="Drinks">Drinks</option>
<option value="Eating Out">Eating Out</option>
<option value="Gas">Gas</option>
<option value="Groceries">Groceries</option>
<option value="Jeb">Jeb</option>
<option value="Lunch">Lunch</option>
<option value="Online Other">Online Other</option>
<option value="Misc. Other">Misc. Other</option>
<option value="Recurring">Recurring</option>
</select>
<h3>Which group of people was this for?</h3>
<select name="group">
<option value="0">Other (including myself)</option>
<option value="1">Sarah and I</option>
<option value="2">Kastle</option>
</select>
<input id="Submit" type="submit"/>
</form>

<div>
<div class="Results" id="Results">
<div class="left" id="left">
<img src='daily_chart.php'><br />
<img src='monthly_chart.php'><br />
<img src='amounts_chart.php'><br />
<img src='locale_chart.php'><br />
<img src='categ_chart.php'><br />
<img src='type_chart.php'><br />
<img src='joint_chart.php'><br />
</div>
</div>


</body>
</html>