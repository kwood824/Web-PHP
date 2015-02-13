<?php
	
	session_start();
	
	if ($_GET['op'] == 'newsession'){
			session_destroy();
		}
		
	if(empty($_SESSION['Username']) && empty($_SESSION['String1']) && empty($_SESSION['String2'])) {
	header('Location: http://web.engr.oregonstate.edu/~woodky/input.php');
	exit;
	}
	
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
        <h1>Strings!</h1>
		<a href="input.php">Input</a>
		<a href="session.php">Session</a>
		<a href="strings.php">Strings</a><br><br>
	<?php

		echo "Welcome ".$_SESSION['Username'].", Let's string your strings: [".$_SESSION['String1']."] and: [".$_SESSION['String2']."]!\n";
	
	?>
		<br><br>
        <form method="GET" action="http://web.engr.oregonstate.edu/~woodky/strings.php">
            <input type="submit" name="op" value="conxy">
			<input type="submit" name="op" value="conyx">
			<input type="submit" name="op" value="substr">
			<input type="submit" name="op" value="newsession">
        </form><br>
	</body>
</html>

<?php
	
	if (isset($_GET['op'])) {
	
		if ($_GET['op'] == 'conxy'){
			echo "Your strings have been concatenated: ".$_SESSION['String1'] . $_SESSION['String2'];
		}
		
		if ($_GET['op'] == 'conyx'){
			echo "Your strings have been concatenated: ".$_SESSION['String2'] . $_SESSION['String1'];
		}
		
		if ($_GET['op'] == 'substr'){
			if (strpos($_SESSION['String1'], $_SESSION['String2']) !== FALSE){
				echo "[".$_SESSION['String2']."] IS a substring of [".$_SESSION['String1']."] & ";
			}
			else {
				echo "[".$_SESSION['String2']."] IS NOT a substring of [".$_SESSION['String1']."] & ";
			}
			if (strpos($_SESSION['String2'], $_SESSION['String1']) !== FALSE){
				echo "[".$_SESSION['String1']."] IS a substring of [".$_SESSION['String2']."]	\n";
			}
			else {
				echo "[".$_SESSION['String1']."] IS NOT a substring of [".$_SESSION['String2']."]	\n";
			}
		}
		
		if ($_GET['op'] == 'newsession'){
			session_destroy();
		}
	}

?>