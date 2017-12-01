<?php
session_start();
?>
<?php include ("header.php"); ?> 
<!--Parker Bruni CS290-->

<body id="bod" onload="displayPoints('<?php echo $_SESSION["score"]; ?>','<?php echo $_SESSION["wins"]; ?>')">

<?php include ("nav.php");?>
	
	<script>
   	isUserSet();
	</script>
	<script>
	navStyle();	<!-- changes nav bar css when on certain page -->	
	</script>

	
	
	
Welcome <?php echo $_SESSION["username"]; ?> 			


    <h1>Rock, Paper, Scissors with Javascript</h1>
	<h2>by Parker Bruni</h2>

	<?php
		
$servername = "oniddb.cws.oregonstate.edu";														//displays users wins from database
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
		
	

	
<button onclick="updateUser('<?php echo $_SESSION['username']; ?>')" style="position: absolute; top: 220px; margin-right: 700px; right: 0px;" value="<?php echo $_SESSION["username"]; ?>">submit score to server via AJAX</button>							<!-- AJAX -->

	
	
	
	
	
<FORM METHOD="POST" ACTION="stats.php" style="position: absolute; top: 190px; margin-right: 700px; right: 0px;">
	
<TABLE class="table2">	

<INPUT TYPE="hidden" NAME="username" id="username" value="<?php echo $_SESSION["username"]; ?>">						<!--Hidden form to send new data to users account-->
<INPUT TYPE="hidden" NAME="score" id="score" value="<?php echo $_SESSION["score"]; ?>">
<INPUT TYPE="hidden" NAME="wins" id="wins" value="<?php echo $_SESSION["wins"]; ?>">
<INPUT TYPE="hidden" NAME="losses" id="losses" value="0">
<INPUT TYPE="hidden" NAME="game" id="game" value="rps">
	
  
</TABLE>

<button type="submit" style="color: black;">submit score to server using form and php</button>
</FORM>
	
	
	
	
	<img src="#" id="userImage" alt=" " style="height: 200px; width: 200px; position: absolute; top: 100px; margin-right: 300px; right: 0px; border-style: solid; border-width: 1px;"  />    <!--play board images, user and computer choices -->
	<div id="userImageCap" style="height: 200px; width: 200px; position: absolute; top: 80px; margin-right: 300px; right: 0px;">Your Choice</div>
	<img src="#" id="computerImage" alt=" " style="height: 200px; width: 200px; position: absolute; top: 400px; margin-right: 300px; right: 0px; border-style: solid; border-width: 1px;"  />
	<div id="computerImageCap" style="height: 200px; width: 200px; position: absolute; top: 380px; margin-right: 300px; right: 0px;"  >Computer Choice</div>
	
	
	
	<p>How much would you like to bet?</p>
	<input type="number" id="userBet" value="0" min="0" max="100">																				<!--betting input -->
    <button onclick="bet()">Place Bet</button>
	<p id="bet"></p>
	<p id="makeYourChoice"></p>
	
	<div style="position: absolute; top: 350px; ">																														<!--rock paper and scissors choice images -->
	<img src="images/rock.jpg" alt="rock" id="rockChoice" border="0" style="height: 200px; width: 200px;" onclick="choose('rock')" />
	<img src="images/paper.jpg" alt="paper" id="paperChoice" border="0" style="height: 200px; width: 200px;"  onclick="choose('paper')" />
	<img src="images/scissors.jpg" alt="scissors" id="scissorsChoice" border="0" style="height: 200px; width: 200px;"  onclick="choose('scissors')" />
	</div>
	
	<button onclick="play(userChoice, computerChoice)" style="width: 200px; position: absolute; top: 330px; margin-right: 300px; right: 0px;"  >Play</button>			<!--game board play button -->
	<p id="result" style="width: 500px; position: absolute; top: 345px; margin-right: 300px; right: 0px;"></p>				<!--result text message -->
		
	
	
	<div style="position: absolute; top: 550px; ">															<!--user and computer choice text message -->
	<p id="userChoice"></p>
	<p id="computerChoice"></p>

	</div>



<?php include ("footer.php"); ?>
</body>
</html>
