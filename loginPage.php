<?php

session_start();

require_once 'token.php';

//username and password is hard coded as 'admin'
const username = 'admin';
const password = 'admin';

if (isset($_POST['username']) && isset($_POST['password'])) //when form submitted
{
  if ($_POST['username'] === username && $_POST['password'] === password)
  {
    $_SESSION['username'] = $_POST['username']; //write username to server storage
    setcookie("id", session_id());
    setcookie("username", $_POST['username']);
    Token::generate_token(session_id());
    header('Location: ./transferPage.php'); //redirect to main page
  }
  else
  {
    echo "<script>alert('Invalid Username or Password');</script>";
    echo "<noscript>Invalid Username or Password</noscript>";
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="./form5.css">

    <title>Mobile Credit Transfer</title>
  </head>
  <body>
   
	
	<div id="main">
	  <div id="first">
	    <form action="" method="post">
		  <h1>User Account</h1>
		  <h4>Please fill all entries.</h4> <hr/>
		  <label>Username </label><br/>
		  <input name="username" placeholder="Enter your username"><br/>	

		  <label>Password </label><br/>
		  <input name="password" placeholder="Enter your Password"> <br/>	
		  
		  
		  
		  <input type="submit" value="Login">
	    </form>
	  </div>
	  
	 
    </div>  

    

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>