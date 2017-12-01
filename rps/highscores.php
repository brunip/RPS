<?php
session_start();
?>
<?php include ("header.php"); ?> 
<!--Parker Bruni CS290-->


<body id="bod" onload="displayPoints();">

<?php include ("nav.php");?>

<h1>High Scores</h1>
	<script>
   	isUserSet();
	</script>
	<script>
	navStyle();	<!-- changes nav bar css when on certain page -->	
	</script>
	

<?php			// rock paper scissors scores
		
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



$sql = "SELECT username,score,game FROM Scores WHERE game='rps' ORDER BY score DESC LIMIT 5";
$result = $conn->query($sql);
echo "<h2>Rock Paper Scissors</h2>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "USERNAME: " . $row["username"]. "<br>  SCORE: " . $row["score"].  "<br>  GAME: " . $row["game"]. "<br><br>";
    }
} else {
    echo "0 results";
}


$conn->close();

?>


<?php			//Tic tac toe scores
		
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



$sql = "SELECT username,score,game FROM Scores WHERE game='tictactoe' ORDER BY score DESC LIMIT 5";
$result = $conn->query($sql);
echo "<h2>Tic Tac Toe</h2>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "USERNAME: " . $row["username"]. "<br>  SCORE: " . $row["score"].  "<br>  GAME: " . $row["game"]. "<br><br>";
    }
} else {
    echo "0 results";
}


$conn->close();

?>

<?php			//Hilo scores
		
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



$sql = "SELECT username,score,game FROM Scores WHERE game='hilo' ORDER BY score DESC LIMIT 5";
$result = $conn->query($sql);
echo "<h2>Hilo</h2>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "USERNAME: " . $row["username"]. "<br>  SCORE: " . $row["score"].  "<br>  GAME: " . $row["game"]. "<br><br>";
    }
} else {
    echo "0 results";
}


$conn->close();

?>


</body>
</html>