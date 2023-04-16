<?php
    session_start();
    session_regenerate_id(true);
    if(!isset($_SESSION['AdminLoginId'])){
        header("location: Admin Login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body{
            background-image: url('Admin Panel.png');
            background-size: cover;
            background-repeat: no-repeat;
    
            margin: 0;
        }
        div.header{
            color: #f0f0f0;
            font-family: poppins;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            padding: 0 60px;
            background-color: #1c1c1e;
        }
        div.header button{
            background-color: #f0f0f0;
            font-size: 16px;
            font-weight: 550;
            padding: 8px 12px;
            border: 2px solid black;
            border-radius: 5px;
        }
        div.c_orders a {
            position: fixed;
			top: 45%;
			left: 39%;
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
        div.user_db a{
            position: fixed;
            top: 45%;
            left: 63%;
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

        div.contact_db a{
            position: fixed;
            top: 62%;
            left: 39%;
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

        div.db_access a{
            position: fixed;
            top: 62%;
            left: 63.2%;
            transform: translate(-50%, -50%);
            background-color:#87CEFA;
            padding: 20px 20px;
            border:none;
            border-radius: 5px; 
            color: white; 
            font-size: 24px; 
            text-decoration: none;
            text-align:center
        }

        div.user_db a, div.c_orders a, div.contact_db a, div.db_access a {
            animation: highlight 2s ease-in-out infinite;
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

        div.user_db a:hover{
            color: red;
        }
        div.c_orders a:hover {
            color: red;
        }
        div.contact_db a:hover{
            color: red;
        }
        div.db_access a:hover {
            color: red;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>ADMIN PANEL - <?php echo $_SESSION['AdminLoginId'] ?></h1>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <button type="submit" name="Logout">LOG OUT</button>
    </form>
</div>


    <div class ='c_orders'>
        <a href='display.php'>Customer Orders Data</a>
    </div>";

    <div class ='user_db'>
        <a href='http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=testing&table=users'>Registered Users Data</a>
    </div>";

    <div class ='contact_db'>
        <a href='https://docs.google.com/spreadsheets/d/1aI6J4jO4eMbVpuIXLl90qEcJCLRMbUat1rOUM88zz3M/edit?usp=sharing'>Contact Support Data</a>
    </div>";

    <div class ='db_access'>
        <a href='http://localhost/phpmyadmin/index.php?route=/database/structure&db=testing'>Website Database Access</a>
    </div>";

<?php 
    if(isset($_POST['Logout']))
    {
        session_destroy();
    }
?>

</body>
</html>