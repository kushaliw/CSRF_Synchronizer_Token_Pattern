<?php 
  session_start();

  require_once 'token.php';

  $display_msg = "";
  $msg="";

  if(isset($_POST['sender'], $_POST['receiver'], $_POST['amount'], $_POST['csrf-token'])){

      $sender = $_POST['sender'];
      $receiver = $_POST['receiver'];
      $amount = $_POST['amount'];
      $csrf_token = $_POST['csrf-token'];

      if(!empty($sender) && !empty($receiver) && !empty($amount) && !empty($csrf_token)){
        if(Token::check_token($csrf_token)){		  
		  
		  echo '<script type="text/javascript">';
		  echo 'setTimeout(function () { swal("SUCCESS","You have successfully transfered Rs. '.$amount.' to '.$receiver.'","success");';
		  echo '}, 500);</script>';

        }
        else{
  
		  echo '<script type="text/javascript">';
		  echo 'setTimeout(function () { swal("ERROR","Please Re-login","warning");';
		  echo '}, 500);</script>';
        }
      }
      else{
        echo '<script type="text/javascript">';
		  echo 'setTimeout(function () { swal("ERROR","Please check your details again","error");';
		  echo '}, 500);</script>';
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
	<script src="./sweetalert.min.js"></script>

    <title>Mobile Credit Transfer</title>
  </head>
  <body>

    <div id="main">
      <?php
        if (session_id() == '' || !isset($_SESSION['username'])) { 
          header('Location: ./header.php');
      ?>
      <?php
        } 
        else {
          echo "Greetings, " . "<strong>".$_SESSION['username']."</strong>";
      ?>
      <!--<a class="red" href="./logout.php">Logout</a>-->
      <hr>
	  <?php
        echo $display_msg;
        }
      ?>
      <br>
      <div id = "first">
      <form action="" method="POST">

        <h1>Mobile Credit Transfer</h1> 
        
      
        <label>Sender's Pin</label>
        <input name="sender">
      
        <label>Receiver's Mobile Number</label>
        <input name="receiver">
      
        <label>Amount(LKR)</label>
        <input name="amount">
      
        <input type="hidden" name="csrf-token" id="csrf-token" value="">
        <input type="submit" value="Transfer">
      
      </form>
	</div>
      <br>
      
      
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./script.js"></script>
  </body>
</html>