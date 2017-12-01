<?php
// Start the session
session_start();
?>
<?php include ("header.php"); ?> 
<!--Parker Bruni CS290-->


<body id="bod" onload="displayPoints();">

<?php include ("nav.php");?>

	<script>
   	isUserSet();
	</script>
	<script>
	navStyle();	<!-- changes nav bar css when on certain page -->	
	</script>
	



<h1>My New Account</h1>


<?php
		
$servername = "oniddb.cws.oregonstate.edu";
$username = "brunip-db";
$password = "fl83BSmLYDLyy9gL";
$dbname = "brunip-db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = mysqli_real_escape_string($conn, $_POST['username']);
$firstname = mysqli_real_escape_string($conn, $_POST['first']);
$lastname = mysqli_real_escape_string($conn, $_POST['last']);
$pass1 = mysqli_real_escape_string($conn, $_POST['pass1']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$hashed_password = hash( 'sha512', $pass1 );

$sql = 'INSERT INTO Users (username, password, firstName, lastName, email)'
        . ' VALUES ("'.$username.'", "'.$hashed_password.'", "'.$firstname.'", "'.$lastname.'", "'.$email.'")'; 

if ($conn->query($sql) === TRUE) {

	echo "Users record created successfully <br><br>" ;
	echo "Username: " . $_POST["username"] . "<br><br>"; 
	echo "First Name: " . $_POST["first"] . "<br><br>"; 
	echo "Last Name: " . $_POST["last"] . "<br><br>"; 
	echo "Email: " . $_POST["email"] . "<br><br>"; 
	echo "Accepted Privacy Policy:  " . $_POST["accept"] . "<br><br>"; 
}
else{
    echo "Error: " . $sql . "<br>" . $conn->error;
	echo "<form action='http://web.engr.oregonstate.edu/~brunip/cs290/rps/signUp'><input type='submit' value='Retry Entry' /></form>";
}



$conn->close();

$_SESSION["username"] = $_POST["username"];
?>






<?php
		
$servername = "oniddb.cws.oregonstate.edu";
$username = "brunip-db";
$password = "fl83BSmLYDLyy9gL";
$dbname = "brunip-db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$username = mysqli_real_escape_string($conn, $_POST['username']);
$game = "rps";
$score = 100;
$wins = 0;
$loses = 0;

$sql = 'INSERT INTO Scores (username, game, score, wins, loses)'
        . ' VALUES ("'.$username.'", "'.$game.'", "'.$score.'", "'.$wins.'", "'.$loses.'")'; 

if ($conn->query($sql) === TRUE) {

	echo "Scores record created successfully <br><br>" ;

}
else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();

$_SESSION["username"] = $_POST["username"];
?>





<?php include ("footer.php"); ?>
</body>
</html>