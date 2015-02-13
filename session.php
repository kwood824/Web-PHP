<?php 

	session_start();
	if(empty($_POST['Username']) && empty($_POST['String1']) && empty($_POST['String2'])) {
		if(isset($_SESSION['Username']) && isset($_SESSION['String1']) && isset($_SESSION['String2'])) {
		header('Location: http://web.engr.oregonstate.edu/~woodky/strings.php');
		exit;
		}
		else{
		header('Location: http://web.engr.oregonstate.edu/~woodky/input.php');
		exit;
		}
	}
	else{
		$_SESSION['Username'] = htmlspecialchars($_POST['Username']);
		$_SESSION['String1'] = htmlspecialchars($_POST['String1']);
		$_SESSION['String2'] = htmlspecialchars($_POST['String2']);
		header('Location: http://web.engr.oregonstate.edu/~woodky/strings.php');
		exit;
	}
	
?>