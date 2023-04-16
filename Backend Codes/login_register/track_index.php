<!DOCTYPE html>
<html>
<head>
	<title>Courier Tracking</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        
        body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        }

        .container {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        }

        .container2 {
        position: absolute;
        top: 8%;
        left: 44%;
        }

        h1 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 36px;
        color: #4CAF50;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }

        form {
        display: flex;
        flex-direction: column;
        align-items: center;
        }

        label {
        margin-bottom: 10px;
        font-size: 18px;
        color: #333;
        }

        input {
        padding: 10px;
        border: none;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        font-size: 16px;
        width: 100%;
        margin-bottom: 20px;
        }

        button {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        button:hover {
        background-color: #3e8e41;
        }

        p {
        margin-top: 20px;
        text-align: center;
        font-size: 18px;
        font-weight: bold;
        color: #333;
        }

        @media screen and (max-width: 600px) {
        .container {
            max-width: 90%;
            border-radius: 0;
            box-shadow: none;
            padding: 10px;
        }
        
        h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }
        
        input {
            font-size: 14px;
        }
        
        button {
            font-size: 14px;
        }
        
        p {
            font-size: 16px;
        }
        }


    </style>
</head>
<body>

    <div class="container2">
        <a href = index.php>
            <button> Back to Home Page </button>
    </a>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br>
	<div class="container">
		<h1>Courier Tracking</h1>
		<form id="order-form" method="post">
			<label for="order-id">Enter Order ID:</label>
			<input type="text" id="order-id" placeholder="Order ID" name='order_id'>
			<button type="submit" id="submit-btn" name='submit'>
                Track Status
            </button>
		</form>
		<p id="result"></p>
	</div>
            
            <?php
                include 'connection.php';
                session_start();
                if(isset($_POST['submit'])) {
                    $orderId = substr($_POST['order_id'],3);
                    $createdBy = $_SESSION['username'];
                    $sql = "select *from `orders` where id='$orderId' and `created_by`= '$createdBy'";
                    $result = mysqli_query($con, $sql);
                    $row =  mysqli_fetch_assoc($result);
                    $_SESSION['order_id']=$orderId;
                    if(!$row) {
                        echo"
                        <script>
                          alert('Order Not Found');
                        </script>
                      ";
                    }
                    
                    else{
                        header('Location: track_index_panel.php');
                    }
                    
                    }

                 else {
                    die(mysqli_error($con));
                }
            ?>
        
        </tbody>
        </table>
    </div>

</body>

</html>