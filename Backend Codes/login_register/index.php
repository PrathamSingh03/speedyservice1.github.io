<?php 
  require('connection.php');
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User - Login and Register</title>
  <link rel="stylesheet" href="index_style.css">

  <style>

  body {
      background-image: url('Welcome.jpg');
      background-size: cover;
      background-repeat: no-repeat;
    }

  div.welcome h1 {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    text-align: center;
    font-family: fantasy;
    font-size: 48px;
    padding: 10px 20px;
    border-radius: 5px;
    color: #63d6d6;
    text-decoration: none;
    animation: highlight 1s ease-in-out infinite;
  }

  .highlight {
    color: #ffbd39;
  }

  @keyframes highlight {
    0% {
    box-shadow: 0 0 0 0 rgba(76, 175, 80, 0.7);
    }
    70% {
    box-shadow: 0 0 0 20px rgba(76, 175, 80, 0);
    }
    100% {
    box-shadow: 0 0 0 0 rgba(76, 175, 80, 0);
    }
  }

  div.orders a {
      position: fixed;
			top: 50%;
			left: 42%;
			transform: translate(-50%, -50%);
      background-color:#87CEFA;
      padding: 20px 30px;
      border:none;
      border-radius: 5px; 
      color: white; 
      font-size: 24px; 
      text-decoration: none;
      text-align:center
}
  div.track a{
      position: fixed;
			top: 50%;
			left: 57%;
			transform: translate(-50%, -50%);
      background-color:#87CEFA;
      padding: 20px 30px;
      border:none;
      border-radius: 5px; 
      color: white; 
      font-size: 24px; 
      text-decoration: none;
      text-align:center
}
  div.track a, div.orders a {
      animation: highlight 1s ease-in-out infinite;
}

  @keyframes highlight {
    0% {
      box-shadow: 0 0 0 0 rgba(255, 255, 0, 0.7);
  }
    70% {
      box-shadow: 0 0 0 20px rgba(255, 255, 0, 0);
  }
    100% {
      box-shadow: 0 0 0 0 rgba(255, 255, 0, 0);
  }
}

  div.track a:hover{
      color: red;
  }
  div.orders a:hover {
      color: red;
  }
  </style>


</head>
<body>
  <header>
    <h2>SPEEDY COURIER SERVICE</h2>
    <nav>
      <a href="http://localhost:63342/courier%20service.html/website/courier%20service.html">HOME</a>
      <a href="http://localhost:63342/courier%20service.html/website/contact%20us.html">CONTACT US</a>
    </nav>

    <?php 
    
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
      {
        echo"
          <div class='user'>
            $_SESSION[username] - <a href='logout.php'>LOGOUT</a>
          </div>
        ";
      }

      else
      {
        echo"
          <div class='sign-in-up'>
            <button type='button' onclick=\"popup('login-popup')\">LOGIN</button>
            <button type='button' onclick=\"popup('register-popup')\">REGISTER</button>
          </div>
        ";

      }
      
    
    ?>

  </header>
  <div class="welcome">
    <?php 
      if(!isset($_SESSION['logged_in'])) {
        echo" <h1> Welcome to Order Create / Login / Regisration </h1>";
      }
    ?>
  </div>


  <div class="popup-container" id="login-popup">
    <div class="popup">
      <form method="POST" action="login_register.php">
        <h2>
          <span>USER LOGIN</span>
          <button type="reset" onclick="popup('login-popup')">X</button>
        </h2>
        <input type="text" placeholder="E-mail or Username" name="email_username">
        <input type="password" placeholder="Password" name="password">
        <button type="submit" class="login-btn" name="login">LOGIN</button>
      </form>
    </div>
  </div>

  <div class="popup-container" id="register-popup">
    <div class="register popup">
      <form method="POST" action="login_register.php">
        <h2>
          <span>USER REGISTER</span>
          <button type="reset" onclick="popup('register-popup')">X</button>
        </h2>
        <input type="text" placeholder="Full Name" name="fullname">
        <input type="text" placeholder="Username" name="username">
        <input type="email" placeholder="E-mail" name="email">
        <input type="password" placeholder="Password" name="password">
        <button type="submit" class="register-btn" name="register">REGISTER</button>
      </form>
    </div>
  </div>


  <?php 
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
    {
      echo"<h1 style='text-align: center; margin-top:200px; color: #87CEFA'> WELCOME -  $_SESSION[username]</h1>";


      echo" 
      <div class ='orders'>
        <a href='display.php'>Order Page</a>
      </div>";


      echo" 
      <div class ='track'>
        <a href='track_index.php'>Track Order</a>
      </div>";
    }
  ?>



  <script>
    function popup(popup_name)
    {
      get_popup=document.getElementById(popup_name);
      if(get_popup.style.display=="flex")
      {
        get_popup.style.display="none";
      }
      else
      {
        get_popup.style.display="flex";
      }
    }
  </script>

</body>
</html>