<?php 
include "lib/session.php";
session_start();
 ?>
<?php include "config/config.php" ?>
<?php include "lib/database.php" ?>
<?php include "helpers/formate.php" ?>

<?php 
$db = new Database();
$fm = new formate();

 ?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link href="css/font-awesome.min.css" rel="stylesheet">
 <link href="css/animate.min.css" rel="stylesheet"> 
 <link href="css/prettyPhoto.css" rel="stylesheet">
<style>
* {box-sizing: border-box;}

body {margin: 0;font-family: Arial, Helvetica, sans-serif;}

.header {overflow: hidden;background-color: #847b7b;padding: 20px 10px; margin-bottom: 30px;}
.header a {float: left;color: black;text-align: center;padding: 12px;text-decoration: none;font-size: 18px;line-height: 25px;border-radius: 4px;}
.header a.logo {font-size: 25px;font-weight: bold;}
.header a:hover {background-color: black;color: white;}
.header a.active {background-color: dodgerblue;color: white;}
.header-right {float: right;}
@media screen and (max-width: 500px) {
  .header a {float: none;display: block;text-align: left;}
  .header-right {float: none;}
}


table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
}
th {
  text-align: left;
}




</style>

</head>

<body>
    <?php 

        if (Session::get('userlogin')==true) {?>
  
            <div class="header">
                <a href="#" class="logo"><?php echo $_SESSION['usersname']; ?></a>
                <div class="header-right">
                    <a href="index.php">Home</a>
                    <a href="total_orders.php">Orders</a>
                    <a href="rating_item.php">Rate It</a>
                    <a href="user_logout.php?action=true">Logout</a>
                </div>
            </div>

            
       <?php }else{ ?>

       <div class="header">
            <a href="index.php" class="logo">FOOD STAR</a>
            <div class="header-right">
                <a class="" href="index.php">Home</a>
                <a href="index.php">Login</a>
            </div>
        </div>


      <?php }


     ?>



<div class="container">
    <div class="row">
        <div class="col-md-12">

        <table style="width:100%">
          <tr>
            <th>Order Serial</th>
            <th>Item Serial</th> 
            <th>Order Date</th>
            <th>Receiver Name</th>
            <th>Receiver Contact No</th>
            <th>Receiver Address</th>
            <th>Total Bill:</th>
            <th>Total Ordered Item</th>
            <th>Payment Method</th>
            <th>Status</th>
            <th>Rating</th>
            <th>View</th>
            
          </tr>

<?php 
$usersId = Session::get('usersId');
 $select = "SELECT * FROM orders_details WHERE customer_id= $usersId ORDER BY orders_id DESC";

                $select_result = $db->select($select);

                if ($select_result) {


                  while($row = mysqli_fetch_assoc($select_result)){;

                  $orders_id = $row['orders_id'];
                  $orders_item_id = $row['orders_item_id'];
                  $orders_date = $row['orders_date'];
                  $receiver_name = $row['receiver_name'];
                  $receiver_number = $row['receiver_number'];
                  $receiver_address = $row['receiver_address'];
                  $total_orders_item = $row['total_orders_item'];
                  $total_bill = $row['total_bill'];
                  $payment_method = $row['payment_method'];
                  $deliver_status = $row['deliver_status'];

                  ?>

             <tr>
                <td><?php echo $orders_id; ?></td>
                <td><?php echo $orders_item_id; ?></td>
                <td><?php echo $orders_date; ?></td>
                <td><?php echo $receiver_name; ?></td>
                <td><?php echo $receiver_number; ?></td>
                <td><?php echo $receiver_address; ?></td>
                <td><?php echo $total_orders_item; ?></td>
                <td><?php echo $total_bill; ?></td>
                <td><?php echo $payment_method; ?></td>
                <?php if ($deliver_status==0) {?>

                 <td>On THe Way</td>

                <?php }else{ ?>

                    <td>Delivered</td>
                <?php }

                ?>
               
                <td><a href="rating_item.php"><button class="btn btn-danger">Rate Now!</button></a></td>
                <td><a href="single_order_details.php?orderId=<?php echo $orders_id; ?>"><button class="btn btn-danger">View</button></a></td>
            </tr>





                <?php  }

              }





 ?>

        </table>

        </div>
    </div>
</div>

</body>
</html>