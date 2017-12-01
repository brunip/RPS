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

	Welcome <?php echo $_SESSION["username"]; ?> 

<FORM METHOD="POST" ACTION="loginProcess.php" onSubmit="return loginValidation()">
	<p style="font-weight: 900;">Login</p> 
<TABLE class="table2">	
 
    <TR>
    <TD>Username</TD>
    <TD style="width:50px;">
      <INPUT TYPE="TEXT" NAME="username" id="username" SIZE="20">
	</TD>
	</TR>
  <TR>
    <TD>Password</TD>
    <TD>
      <INPUT TYPE="password" placeholder="at least 8 characters" NAME="pass1" id="firstpass" SIZE="20">
    </TD>
  </TR>
</TABLE>

<button type="submit" style="color: black;"> <img src="images/button_ok.png" alt="Login"/>
</button>
</FORM>
<?php include ("footer.php"); ?>
</body>
</html>
