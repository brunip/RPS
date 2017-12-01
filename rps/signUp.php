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

<FORM METHOD="POST" ACTION="accountProcess.php" onSubmit="return formValidation()">
	<p style="font-weight: 900;">Sign Up</p> 
<TABLE class="table2">	
 
    <TR>
    <TD>Username</TD>
    <TD style="width:50px;">
      <INPUT TYPE="TEXT" NAME="username" id="username" SIZE="20">
   <TR>
    <TD>First Name</TD>
    <TD style="width:50px;">
      <INPUT TYPE="TEXT" NAME="first" id="firstname" SIZE="20">
    </TD>
    <TD>Last Name</TD>
    <TD>
      <INPUT TYPE="TEXT" NAME="last" id="lastname" SIZE="20">
    </TD>
  </TR>
  <TR>
    <TD>Email</TD>
    <TD><INPUT TYPE="email" placeholder="Format for email is xxx@yyy.zzz" NAME="email" id="email" SIZE="60"></TD>
    <TD></TD>
    <TD></TD>
  </TR>
  <TR>
    <TD>Password</TD>
    <TD>
      <INPUT TYPE="password" placeholder="at least 8 characters" NAME="pass1" id="firstpass" SIZE="20">
    </TD>
    <TD>Password Repeat</TD>
    <TD>
      <INPUT TYPE="password" placeholder="at least 8 characters" NAME="pass2" id="secondpass" SIZE="20">
    </TD>
  </TR>
</TABLE>

I agree to terms of the site
<input type="checkbox" name="accept"/><br/>

<button type="submit" style="color: black;"> <img src="images/button_ok.png" alt="Sign me Up!"/>
</button>
</FORM>
<br><br><br>

<?php include ("footer.php"); ?>
</body>
</html>
