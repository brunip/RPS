<?php
// Start the session
session_start();
?>
<?php include ("header.php"); ?> 


<body id="bod" onload="displayPoints();">

<?php include ("nav.php");?>

	<script>
   	isUserSet();
	</script>
	<script>
	navStyle();	<!-- changes nav bar css when on certain page -->	
	</script>

Welcome <?php echo $_SESSION["username"]; ?>!				

<p style="text-align: center; font-weight: bold; margin: 50px 300px 0px 300px;">
This is a site for users to play Rock, Paper, Scissors. <br>
It utilizes Javascript to play the game.<br>
Code written by Parker Bruni for CS290 at Oregon State University!<br>
<br>
<br>
Languages used to write this website: HTML, PHP, Javascript, MySQL, AJAX.
<br>
<br>
Cited From Wikipedia (https://en.wikipedia.org/wiki/Rock-paper-scissors):
<br>
"Rock-paper-scissors is a zero-sum hand game usually played between two people, in which each player simultaneously forms one of three shapes with
 an outstretched hand. These shapes are "rock" (a simple fist), "paper" (a flat hand), and "scissors" (a fist with the index and middle fingers together forming a V).
 The game has only three possible outcomes other than a tie: a player who decides to play rock will beat another player who has chosen scissors
 ("rock crushes scissors") but will lose to one who has played paper ("paper covers rock"); a play of paper will lose to a play of scissors ("scissors cut paper").
 If both players choose the same shape, the game is tied and is usually immediately replayed to break the tie. Other names for the game in the
 English-speaking world include roshambo and other orderings of the three items, sometimes with "rock" being called "stone".[1][2][3]
<br>
The game is often used as a choosing method in a way similar to coin flipping, drawing straws, or throwing dice. Unlike truly random selection methods, 
however, rock-paper-scissors can be played with a degree of skill by recognizing and exploiting non-random behavior in opponents.[4][5]"
<br>
</p>
<?php include ("footer.php"); ?>
</body>
</html>
