<?php
    include 'connection.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
  <title>Order Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <style>
    table {
        font-family: Arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        position: absloute;
        transform: translate(+0%, +120%);

    }
    
    th, td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    
    th {
        background-color: #f2f2f2;
        color: #333;
    }
    
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    
    tr:hover {
        background-color: #ddd;
    }
    
    .container {
        padding: 20px;
    }

    .btn-back-home {
    position: absolute;
    top: 1%;
    left: 50%;
    transform: translate(-50%, -50%);
    }

</style>

</head>

<body>

    <div class='container2'>
        <button class="btn btn-primary my-5 btn-back-home"> 
            <a href="index.php" class="text-light">Back To Home</a>
        </button>

        <table class="table">
        <thead>
            <tr>
            <th scope="col">Order Id</th>
            <th scope="col">Created By</th>
            <th scope="col">Date</th>
            <th scope="col">Pickup Address</th>
            <th scope="col">Pickup Address Country</th>
            <th scope="col">Delivery Address</th>
            <th scope="col">Delivery Address Country</th>
            <th scope="col">Item Description</th>
            <th scope="col">Item Parceled</th>
            <th scope="col">Item Nature</th>
            <th scope="col">Weight</th>
            <th scope="col">Sevice Selected</th>
            <th scope="col">Delivery Status</th>
            <th scope="col">Total Courier Charge</th>

            </tr>
        </thead>
        <tbody>

        <?php
            $createdBy = $_SESSION['username'];
            $orderId = $_SESSION['order_id'];
            $sql = "select *from `orders` where id='$orderId' and `created_by`= '$createdBy'";
            $result = mysqli_query($con, $sql);
            if($result) {
                while($row = mysqli_fetch_assoc($result)) {
                    $id =substr($row['pickup_address_country'],0,3).$row['id'];
                    $user = $row['created_by'];
                    $date = $row['created_at'];
                    $pickup_address = $row['pickup_address'];
                    $pickup_address_country = $row['pickup_address_country'];
                    $delivery_address = $row['delivery_address'];
                    $delivery_address_country = $row['delivery_address_country'];
                    $item = $row['item'];
                    $item_nature = $row['item_nature'];
                    $weight = $row['weight'];
                    $service_selected = $row['service_selected'];
                    $item_description = $row['item_description'];
                    $status = $row['status'];
                    $totalCost = $row['amount'];

                    echo ' <tr>
                    <td><b>'.$id.'</b></td>
                    <td><b>'.$user.'</b></td>
                    <td>'.$date.'</td>
                    <td>'.$pickup_address.'</td>
                    <td>'.$pickup_address_country.'</td>
                    <td>'.$delivery_address.'</td>
                    <td>'.$delivery_address_country.'</td>
                    <td>'.$item_description.'</td>
                    <td><b>'.$item.'</b></td>
                    <td>'.$item_nature.'</td>
                    <td>'.$weight.'</td>
                    <td>'.$service_selected.'</td>
                    <td><b>'.$status.'</td>
                    <td><b>'.$totalCost.'</td>
                    </tr>';

                }
            }
        ?>
            
            
        </tbody>
        </table>
    </div>

    
</body>

</html>