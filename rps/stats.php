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
	



<h1>Uploaded Stats</h1>
<?php echo $_SESSION["username"]; ?>'s Stats<br><br><br>
Game: <?php echo $_POST["game"]; ?> <br><br>
Score: <?php echo $_POST["score"]; ?> <br><br>
Wins: <?php echo $_POST["wins"]; ?> <br><br>
Losses: <?php echo $_POST["losses"]; ?> <br><br>



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
$user = $_SESSION["username"];
$wins = $_POST["wins"];
$loss = $_POST["losses"];
$score = $_POST["score"];

$sql = "UPDATE Scores SET score='$score', wins='$wins', loses='$loss' WHERE username='$user' AND game='rps'";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
		






<?php include ("footer.php"); ?>
</body>
</html>