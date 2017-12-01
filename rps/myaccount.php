<?php
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

$sql = "SELECT username, score, wins, loses FROM Scores WHERE username='$user' AND game='rps'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "USERNAME: " . $row["username"]. "<br><br>  SCORE: " . $row["score"]. "<br>  WINS: " . $row["wins"]. "<br> LOSSES: " . $row["loses"]. "<br><br><br><br>";
    }
} else {
    echo "0 results";
}

echo "<FORM METHOD='POST' ACTION='logout.php'>
	  <button type='submit'>LOGOUT</button>
	  </FORM>";

$conn->close();

?>






<?php include ("footer.php"); ?>
</body>
</html>