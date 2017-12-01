<?php
// Start the session
session_start();
?>
<?php include ("header.php"); ?> 

<!--Parker Bruni CS290-->

<body id="bod" onload="displayPoints();">
<?php include ("nav.php");?>
	
<?php
$_SESSION["username"] = $_POST["username"];

?>
	
	
	<script>
	navStyle();	<!-- changes nav bar css when on certain page -->
	</script>
	

<h1>Logged In!</h1>
Welcome <?php echo $_POST["username"]; ?>!<br><br><br>


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

$sql = "SELECT score, wins FROM Scores WHERE username='$user' AND game='rps'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // sets session variables
    while($row = $result->fetch_assoc()) {
        $_SESSION["score"] = $row["score"]; 
		$_SESSION["wins"] = $row["wins"];
    }
}
$conn->close();
?>

<?php include ("footer.php"); ?>

</body>
</html>