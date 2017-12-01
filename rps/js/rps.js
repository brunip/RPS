var points = 100;							//total points
var betAmount;							//users bet
var userChoice;							//users choice
var choice;									//choice parameter from html
var computerChoice;					//computers choice
var gamesWon = 0;					//user wins
var computerWins = 0;				//computer wins
var betPlaced = false;					//has a bet been placed
var userChose = false;				//has the user chose
var gamesLost = 0;					//games lost


/*********************************************************
Function: displayPoints
Purpose: Displays user wins, computer wins, and users remaining points. 
	also sets the min and max betting input values
********************************************************/
function displayPoints(seshpoints, seshwins){
	if(seshpoints == ''){
		document.getElementById("points").innerHTML = "You have " + points + " points! ";												//displays current game value messages
		document.getElementById("computerWins").innerHTML = "Computer has won " + computerWins + " games this round! ";
		document.getElementById("userWins").innerHTML = "You have won " + gamesWon + " games! ";
		var setMax = document.getElementById("userBet").max = points;
	}
	else if(seshpoints == '100' && seshwins == '0'){
		document.getElementById("points").innerHTML = "You have " + points + " points! ";												//displays current game value messages
		document.getElementById("computerWins").innerHTML = "Computer has won " + computerWins + " games this round! ";
		document.getElementById("userWins").innerHTML = "You have won " + gamesWon + " games! ";
		var setMax = document.getElementById("userBet").max = points;																	//sets max betting input values
	}
	else{
		document.getElementById("points").innerHTML = "You have " + seshpoints + " points! ";											//displays current game value messages
		document.getElementById("computerWins").innerHTML = "Computer has won " + computerWins + " games this round! ";
		document.getElementById("userWins").innerHTML = "You have won " + seshwins + " games ! ";
		var setMax = document.getElementById("userBet").max = seshpoints;																//sets max betting input values
		points = seshpoints;
		gameswon = seshwins;																			
	}
}
/*********************************************************
Function: bet
Purpose: signifies that the user has placed a bet of
    their remaining points displays message, notifies
	user of how much they are going to bet, prompts them
	to click on an image to choose their object to play rps,
	sets the bet amount variable
********************************************************/
function bet() {	
    betAmount = document.getElementById("userBet").value;
		if(betAmount > points){																																//if user simply types in a number, error handles
			alert("Bet amount too high! Try again");
			document.getElementById("userBet").setAttribute("value", "0")
			return;
		}
	betPlaced = true;
    document.getElementById("bet").innerHTML = "You wish to bet " + betAmount + " of your points.";			//displays bet amount
    document.getElementById("makeYourChoice").innerHTML = "Please click on one of the images to make your choice (rock, paper, scissors)...";    //prompt
}
/*********************************************************
Function: choose
Parameter: users choice passed from html
Purpose: resets computer and user choice images, sets 
	a couple choice variables needed later on, moves to 
	if else statements that sets a border around the image
	that the user chose, resets the border of objects that 
	previously had a border around them. 
	
	sets current choice image to the users play table image
	computes and sets the computers choice, will not display
	image to play table until the user has pressed the play button
********************************************************/
function choose(choice) {
	document.getElementById("computerImage").setAttribute("src", " ");								//these lines reset the user and computers previous choice images
	document.getElementById("userImage").setAttribute("src", " ");
	
	userChose = true;																												//signifies that the user has chosen, sets the users choice
    userChoice = choice;
	
	if (userChoice == 'rock') {																									//for these if-else blocks, it will set the image of the users choice 
    document.getElementById("userImage").setAttribute("src", "images/rock.jpg");				//  to the users choice in the play table
	
	document.getElementById("rockChoice").setAttribute("border", "2");								//when the user clicks an image, removes any previous borders
	document.getElementById("paperChoice").setAttribute("border", "0");								//  and adds a border to the image they selected, signifying
	document.getElementById("scissorsChoice").setAttribute("border", "0");						//  which choice they made
	}
	else if (userChoice == 'paper') {
	document.getElementById("userImage").setAttribute("src", "images/paper.jpg");
	
	document.getElementById("rockChoice").setAttribute("border", "0");
	document.getElementById("paperChoice").setAttribute("border", "2");
	document.getElementById("scissorsChoice").setAttribute("border", "0");
	}   
	else {
    document.getElementById("userImage").setAttribute("src", "images/scissors.jpg");
	
	document.getElementById("rockChoice").setAttribute("border", "0");
	document.getElementById("paperChoice").setAttribute("border", "0");
	document.getElementById("scissorsChoice").setAttribute("border", "2");
	}
	
	document.getElementById("userChoice").innerHTML = "You choose " + userChoice + "!";
	computerChoice = Math.random();
	if (computerChoice < 0.34) {																										//calculation to set the computers choice using random function
    computerChoice = 'rock';
	}
	else if (computerChoice < 0.67) {
    computerChoice = 'paper';
	}   
	else {
    computerChoice = 'scissors';
	}
}

/*********************************************************
Function: win
Purpose:   processes a user win. displays win message
	applies bet amount to points, increments users wins,
	displays new points and win values, sets new bet max,
	resets bet and choice boolean variables.
********************************************************/
function win(){
	document.getElementById("result").innerHTML = "***You win! Set a new bet and click another image to play again!***";
	points = parseInt(points) + parseInt(betAmount);																		//sets new point amount
	gamesWon = parseInt(gamesWon) + 1;																					//increment user wins
	
	
	document.getElementById("score").setAttribute("value", points);
	document.getElementById("wins").setAttribute("value", gamesWon);
	
	
	document.getElementById("points").innerHTML = "You have " + points + " points! ";
	document.getElementById("userWins").innerHTML = "You have won " + gamesWon + " games! ";
	var setMax = document.getElementById("userBet").max = points;											//sets new max
	betPlaced = false;
	userChose = false;
}
/*********************************************************
Function: lose
Purpose:   processes a user loss. displays loss message
	applies bet amount to points,
	displays new points and win values, sets new bet max,
	if the user has lost all points, displays alert that reloads page
	to play again or redirects them to a gambling help reference
	resets bet and choice boolean variables.
********************************************************/
function lose(){
	document.getElementById("result").innerHTML = "***You lose! Set a new bet and click another image to play again!***";
	points = parseInt(points) - parseInt(betAmount);																		//sets new point amount
	computerWins = parseInt(computerWins) + 1;																			//increment computer wins
	

	document.getElementById("score").setAttribute("value", points);
	document.getElementById("losses").setAttribute("value", computerWins);
	
	
	document.getElementById("points").innerHTML = "You have " + points + " points! ";
	document.getElementById("computerWins").innerHTML = "Computer has won " + computerWins + " games! ";
	var setMax = document.getElementById("userBet").max = points;											//sets new max
	if(points == 0){
		var r = confirm('You lost all your points! Click OK if you wish to play again');
		if(r == true){
			window.location = 'http://web.engr.oregonstate.edu/~brunip/cs290/rps/rockPaperScissors';
		}
		else{
			document.getElementById("bod").innerHTML = "https://www.gamblingtherapy.org/";	
		}
	}
	betPlaced = false;
	userChose = false;
}


/*********************************************************
Function: play
Purpose:   initiates the rock paper scissors game
	using the computer and player choices,
	error handles for no bet placed or if no image was chosen,
	displays computers choice and users choice.
	if else blocks handles comparisons to users choice
	against the computers choice resulting in a tie,
	win, or loss. calls the win or loss functions accordingly
	
********************************************************/
function play(userChoice, computerChoice) {
	 if(betPlaced == false){																													//if no bet was placed
		 alert("You must first press 'Place Bet' button and place a bet!");
		 return;
	 }
	 	 if(userChose== false){																												//if user has not selected a new choice
		 alert("You must first press click an image to make a choice!");
		 return;
	 }
	 document.getElementById("computerChoice").innerHTML = "Computer chose " + computerChoice + "!";
	 document.getElementById("result").innerHTML = userChoice + " " + computerChoice;
	 
     if (userChoice == computerChoice) {																							//if its a tie. because of no tie function, this if block sets the play table computer choice image
		 	if(computerChoice == 'rock'){
				document.getElementById("computerImage").setAttribute("src", "images/rock.jpg");
			}
			else if(computerChoice == 'paper'){
				document.getElementById("computerImage").setAttribute("src", "images/paper.jpg");
			}
			else{
				document.getElementById("computerImage").setAttribute("src", "images/scissors.jpg");
			}
        document.getElementById("result").innerHTML = "***Tie! Set a new bet and click another image to play again!***";
     }
	 else if (userChoice == 'rock') {																										// user chose rock, compare and handle accordingly
		 if(computerChoice == 'paper'){
			 document.getElementById("computerImage").setAttribute("src", "images/paper.jpg");
			lose();
		 }
		else if(computerChoice == 'scissors'){
			document.getElementById("computerImage").setAttribute("src", "images/scissors.jpg");
			win();
		 }
    }
	else if (userChoice == 'paper') {																										// user chose paper, compare and handle accordingly
		 if(computerChoice == 'rock'){
			document.getElementById("computerImage").setAttribute("src", "images/rock.jpg");
			win();
		 }
		else if(computerChoice == 'scissors'){
			document.getElementById("computerImage").setAttribute("src", "images/scissors.jpg");
			lose();
		 }
    }
	else if (userChoice == 'scissors') {																								// user chose scissors, compare and handle accordingly
		 if(computerChoice == 'rock'){	
			document.getElementById("computerImage").setAttribute("src", "images/rock.jpg");
			lose();
		 }
		else if(computerChoice == 'paper'){
			document.getElementById("computerImage").setAttribute("src", "images/paper.jpg");
			win();
		 }
    }
	document.getElementById("rockChoice").setAttribute("border", "0");										//reset the choice borders
	document.getElementById("paperChoice").setAttribute("border", "0");
	document.getElementById("scissorsChoice").setAttribute("border", "0");
}
/*********************************************************
Function: navStyle
Purpose: highlights portion of nav bar depending on the
	current page that the user is on
********************************************************/
function navStyle(){
	if(window.location.href=="http://web.engr.oregonstate.edu/~brunip/cs290/rps/rockPaperScissors"){
		document.getElementById("ahome").setAttribute("style", "color: black; background-color: #cccccc;");
	}
	if(window.location.href=="http://web.engr.oregonstate.edu/~brunip/cs290/rps/about"){
		document.getElementById("aabout").setAttribute("style", "color: black; background-color: #cccccc;");
	}
	if(window.location.href=="http://web.engr.oregonstate.edu/~brunip/cs290/rps/login"){
		document.getElementById("alogin").setAttribute("style", "color: black; background-color: #cccccc;");
	}
	if(window.location.href=="http://web.engr.oregonstate.edu/~brunip/cs290/rps/signUp"){
		document.getElementById("asignup").setAttribute("style", "color: black; background-color: #cccccc;");
	}
	if(window.location.href=="http://web.engr.oregonstate.edu/~brunip/cs290/rps/myaccount"){
		document.getElementById("aaccount").setAttribute("style", "color: black; background-color: #cccccc;");
	}
	if(window.location.href=="http://web.engr.oregonstate.edu/~brunip/cs290/rps/highscores"){
		document.getElementById("ahighscores").setAttribute("style", "color: black; background-color: #cccccc;");
	}
}

/*********************************************************
Function: formValidation
Purpose: validates the sign up form data input
	will make sure password has one uppercase, one lower,
	and be at least 8 characters long but no longet than 20
	. also checks if all feilds have been filled and if
	passwords match
********************************************************/
function formValidation(){
    var a = document.getElementById("username").value;
    var b = document.getElementById("firstname").value;
    var c = document.getElementById("lastname").value;
    var d = document.getElementById("email").value;
    var e = document.getElementById("firstpass").value;
    var f = document.getElementById("secondpass").value;
	var validChars = /^[A-Za-z0-9]\w{7,20}$/; 
	
    if (a==null || a=="",b==null || b=="",c==null || c=="",d==null || d=="",e==null || e=="",f==null || f==""){
		alert("Please Fill All Required Field");
		return false;
    }
	else if(e != f){
		alert("Passwords Do Not Match");
		return false;
	}
	else if(!e.match(validChars)){   
		alert('Password Must Contain an Upper-case Letter and a Number and be at Least 8 Characters Long');
		return false;		
	}

	return true;
  
}
/*********************************************************
Function: loginValidation
Purpose: validates the login up form data input
	will make sure password has one uppercase, one lower,
	and be at least 8 characters long but no longer than 20
	. also checks if all fields have been filled
********************************************************/
function loginValidation(){
    var a = document.getElementById("username").value;
    var b = document.getElementById("firstpass").value;
	var validChars = /^[A-Za-z0-9]\w{7,20}$/; 
	
    if (a==null || a=="" || b==null || b==""){
		alert("Please Fill All Required Field");
		return false;
    }
	else if(!b.match(validChars)){   
		alert('Password Must Contain an Upper-case Letter and a Number and be at Least 8 Characters Long');
		return false;		
	}

		return true;
}

/*********************************************************
Function: accountActive
Purpose: sets the points and wins of the user on the main
	page based on their account record.
********************************************************/
function accountActive(){
var seshpoints = sessionStorage.getItem("username");
		document.getElementById("points").setAttribute("value", "<?php $_SESSION['points'] ?>");
		document.getElementById("userWins").setAttribute("value", "<?php $_SESSION['wins'] ?>");
        var username = '<php? echo $_SESSION["username"] ?>';
	
}
/*********************************************************
Function: updateUser
Purpose: udates user data with ajax
********************************************************/
function updateUser(str) {

    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ajaxScores").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET","updateUser.php?q="+str);
    xmlhttp.send();
    alert("data sent");
}


/*********************************************************
Function: testval
Purpose: testing purposes
********************************************************/
function testval(){
	window.alert("test");
}
