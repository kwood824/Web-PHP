<?php

ini_set('display_errors', 1)

?>

<!DOCTYPE html>
<html>
    <head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
		<title>
			Database Interaction
		</title>
		<style>
			table, tr, td
			{
				border: 1px solid black;
				padding: 10px;
			}
		</style>
	</head>
    <body>
        <h1>Database Interaction</h1>
		<p>Please enter your first name, last name and age in the 3 boxes below then hit Add.</p><br>
        <form method="POST" action="http://web.engr.oregonstate.edu/~woodky/database.php">
            <input id="Firstname" type="text" onfocus="if(this.value!='NULL'){this.value=''}" value="Enter your first name..." name="Firstname">
            <input id="Lastname" type="text" onfocus="if(this.value!='NULL'){this.value=''}" value="Enter your last name..." name="Lastname">
            <input id="Age" type="text" onfocus="if(this.value!='NULL'){this.value=''}" value="Enter your age..." name="Age">
            <input id="add" type="submit" name="add" value="Add">
        </form><br>
		<h2>Table Output</h2>
	</body>
</html>

<?php

if (isset($_REQUEST['add'])) {
    insert();
}

function insert()
{
	$Fname = htmlspecialchars($_POST['Firstname']);
	if(($_POST['Firstname'] === "Enter your first name...") || ($_POST['Firstname'] === "")){
		$Fname = NULL;
	}
	$Lname = htmlspecialchars($_POST['Lastname']);
	if(($_POST['Lastname'] === "Enter your last name...") || ($_POST['Lastname'] === "")){
		$Lname = NULL;
	}
	$Age = htmlspecialchars($_POST['Age']);
	if(($_POST['Age'] === "Enter your age...") || ($_POST['Age'] === "")){
		$Age = '0';
	}
	if(!is_numeric($Age)){
		echo 'ERROR. Please make sure to enter a number into the age field!';
		exit();
	}

	$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "woodky-db", "nHMDCOsl9r8VOesA", "woodky-db");

	/* check connection */
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	
	if(!$mysqli->query("INSERT INTO Project3(Firstname, Lastname, Age) VALUES ('$Fname', '$Lname', '$Age')")){
		echo "Insert failed: (" . $mysqli->errno . ") " . $mysqli->error; 
	}
	
	$data = $mysqli->query("SELECT Firstname, Lastname, Age FROM Project3 ORDER by ID DESC LIMIT 10"); 
	$sum = 0;
	if (mysqli_num_rows($data) == 0) // table is empty 
	{
		echo 'There are no members to view'; 
	}
	else 
	{ 
		echo "<table>\n";
		while(list($Firstname, $Lastname, $Age) = mysqli_fetch_row($data)) 
		{ 
			$sum = ($sum + $Age);
			echo "<tr>\n"
			."<td> {$Firstname} </td>\n"
			."<td> {$Lastname} </td>\n"
			."<td> {$Age} </td>\n"
			."</tr>\n";
		} 
		echo '</table>';
		printf("\nThe sum of the integers is %d\n", $sum);
		$data->close();
	} 
}

?>