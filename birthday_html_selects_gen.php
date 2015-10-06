<!DOCTYPE html>
<html>
<head>
<title>Birthday select generator</title>
<style>
.message {
	width: 75%;
	border: 1px solid #cccccc;
	background-color: LemonChiffon;
	color: DarkBlue;
	text-align: center;
	margin: 0 auto;
	padding: 6px;
}
.error {
	width: 75%;
	border: 1px solid #cccccc;
	background-color: LemonChiffon;
	color: red;
	text-align: center;
	margin: 0 auto;
	padding: 6px;
}
h1 {
	text-align: center;
}
</style>
</head>
<body>
	
	<h1>Birthday HTML Select Generator</h1>

<?php
/**
 * Creates a <select> for month, day, and year (for birthdays)
 * 
 * Make sure you have *write* permission for the directory that contains this script file
 * (for example, in Ubuntu, the user www-data executes PHP scripts)
 */
 
$fn = "birthday_select.html";

if (file_exists($fn))
	echo "<p class='error'>Warning: The file <em>$fn</em> already exists and is going to be overwritten.</p>";
else
	echo "<p class='message'>Opening file $fn . . .</p>";

if ($fh = fopen($fn, 'w')) {

	/**
	 * The first <select> for the month
	 */
	fwrite($fh, "<select>\n");

	$months = array(1 => "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");

	for ($i = 1; $i <= 12; $i++) {
		$line = '<option value="' . $i . '">' . $months[$i] . "</option>\n";
		fwrite($fh, $line);
	}

	fwrite($fh, "</select>\n");
	
	fwrite($fh, "\n");
	
	/**
	 * The second <select> for the day
	 */
	fwrite($fh, "<select>\n");
	
	for ($i = 1; $i <= 31; $i++) {
		$line = '<option value="' . $i . '">' . $i . "</option>\n";
		fwrite($fh, $line);		
	}
	
	fwrite($fh, "</select>\n");
	
	fwrite($fh, "\n");
	
	/**
	 * The third <select> for the year
	 */
	fwrite($fh, "<select>\n");
	
	/**
	 * Loops through the years up to the present year
	 * (PHP will implicitly convert string to int)
	 */
	for ($i = 1905; $i <= date("Y"); $i++) {
		$line = '<option value="' . $i . '">' . $i . "</option>\n";
		fwrite($fh, $line);		
	}
	
	fwrite($fh, "</select>\n");
	
	fclose($fh);
	
	echo "<p class='message'>File generated succesfully.</p>";
}
else {
	die("<p class='error'>There was a problem opening the file $fn for writing.</p>");
}

?>

</body>
</html>
