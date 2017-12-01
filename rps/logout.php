<?php
// Start the session
session_start();
?>
<?php include ("header.php"); ?> 

<!--Parker Bruni CS290-->

<body id="bod" onload="displayPoints();">
<?php include ("nav.php");?>

<h1>Logged Out!</h1>

<?php
    session_unset();
?>
	
	
	<script>
	navStyle();	<!-- changes nav bar css when on certain page -->
	</script>
	



<?php include ("footer.php"); ?>

</body>
</html>