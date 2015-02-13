<?php

ini_set('display_errors', 1)

?>

<!DOCTYPE html>
<html>
    <head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
		<title>
			Session Handling, Posts and Gets
		</title>
		<style></style>
	</head>
    <body>
        <h1>Session Handling, Posts and Gets</h1>
		<a href="input.php">Input</a>
		<a href="session.php">Session</a>
		<a href="strings.php">Strings</a>
		<p>Please enter your username and 2 strings in the input fields below</p><br>
        <form method="POST" action="http://web.engr.oregonstate.edu/~woodky/session.php">
            <input id="Username" type="text" name="Username">
            <input id="String1" type="text" name="String1">
            <input id="String2" type="text" name="String2">
            <input id="Play" type="submit" name="add" value="Go Play With Strings!">
        </form><br>
	</body>
</html>



<?php



?>