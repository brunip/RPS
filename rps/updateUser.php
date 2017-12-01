<?php
// Start the session
session_start();
?>
<?php include ("header.php"); ?> 
<!--Parker Bruni CS290-->

<body id="bod" onload="displayPoints();">

<?php include ("nav.php");?>	

<?php																														//update user wins and score

echo '<script language="javascript">';
echo 'alert("message successfully sent")';
echo '</script>';
  
$q = intval($_GET['q']);

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


$result = $conn->query($sql);

$user = $q;
$wins = $_SESSION["wins"];
$loss = $_SESSION["losses"];
$score = $_SESSION["score"];

$sql = "UPDATE Scores SET score='$score', wins='$wins', loses='$loss' WHERE username='$user' AND game='rps'";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>








<?php
		
$servername = "oniddb.cws.oregonstate.edu";														//displays users wins and score from database
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
		echo "	<p id='points' style='position: absolute; top: 100px; margin-right: 700px; right: 0px;'>" . $_SESSION["score"] . "</p>	
				<p id='userWins' style='position: absolute; top: 120px; margin-right: 700px; right: 0px;'>" . $_SESSION["wins"] . "</p>
				<p id='computerWins' style='position: absolute; top: 140px; margin-right: 700px; right: 0px;'></p>";
    }

}
else{ 
	echo "	<p id='points' style='position: absolute; top: 100px; margin-right: 700px; right: 0px;'>" . $_SESSION["score"] . "</p>	
			<p id='userWins' style='position: absolute; top: 120px; margin-right: 700px; right: 0px;'>" . $_SESSION["wins"] . "</p>
			<p id='computerWins' style='position: absolute; top: 140px; margin-right: 700px; right: 0px;'></p>";
}
echo "<script>accountActive();</script>";

$conn->close();
?>

</body>
</html>

<?php include ("footer.php"); ?>
</body>
</html>
