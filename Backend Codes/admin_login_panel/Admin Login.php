<?php require("Connection.php") ?>
<html>
<head>
<title>Admin Login Panel</title>
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  
<div class="container">
  <div class="myform">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
      <h2>ADMIN LOGIN</h2>
      <input type="text" placeholder="Admin Name" name="AdminName">
      <input type="password" placeholder="Password" name="AdminPass">
      <button type="submit" name="Login">LOGIN</button>
    </form>
  </div>
  <div class="image" >
    <img src="image.jpg">
  </div>
</div>

<?php

  function input_filter($data)
  {
    $data=trim($data);
    $data=stripcslashes($data);
    $data=htmlspecialchars($data);
    return $data;
  }

  if(isset($_POST['Login']))
  {
    # filtering user input
    $AdminName=input_filter($_POST['AdminName']);
    $AdminPass=input_filter($_POST['AdminPass']);
  
    # escaping special symbols used in SQL statement
    $AdminName=mysqli_real_escape_string($con,$AdminName);
    $AdminPass=mysqli_real_escape_string($con,$AdminPass);

    # query template
    $query="SELECT * FROM `users` WHERE `username`='$_POST[AdminName]' AND `type`='admin'";
    $result=mysqli_query($con,$query);

    #prepared statement
    if($result)
    {
      $result_fetch=mysqli_fetch_assoc($result);
      if(mysqli_num_rows($result)==1 && password_verify($_POST['AdminPass'],$result_fetch['password']))
      {
        session_start();
        $_SESSION['AdminLoginId']=$AdminName;
        $_SESSION['username']=$AdminName;
        header("location: Admin Panel.php");
      }
      else
      {
        echo"<script>alert('Invalid Admin Name or Password');</script>";
      }
    }
    else
    {
      echo"<script>alert('SQL Query cannot be prepared');</script>";
    }
  }

?>

</body>
</html>