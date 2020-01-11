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
</style>

</head>

<body>
    <?php 

        if (Session::get('userlogin')==true) {?>
  
            <div class="header">
                <a href="#" class="logo">CompanyLogo</a>
                <div class="header-right">
                    <a href="index.php">Home</a>
                    <a href="total_orders.php">Orders</a>
                    <a href="rating_item.php">Rate It</a>
                    <a href="user_logout.php?action=true">Logout</a>
                </div>
            </div>

            
       <?php }else{ ?>

        <div class="header">
            <a href="#default" class="logo">CompanyLogo</a>
            <div class="header-right">
                <a class="" href="index.php">Home</a>
                <a href="user_login.php">Login</a>
                <a href="user_reg.php">Registration</a>
            </div>
        </div>


      <?php }


     ?>



<div class="container">
    <div class="row">
        <div class="col-md-12">
          
          <?php 

          if (isset($_POST['submit_info'])) {

            $usersId = Session::get('usersId');

            $select_balns_qry = "SELECT user_card_balance FROM users WHERE users_id= $usersId";
            $selectselect_balns_qry=$db->select($select_balns_qry);
            $arr = mysqli_fetch_array($selectselect_balns_qry);
            $card_balance=$arr['user_card_balance'];


            $customer_name = $_POST['customer_name'];
            $customer_number = $_POST['customer_number'];
            $customer_adrss = $_POST['customer_adrss'];
            $item_total = $_POST['item_total'];
            $p_method = $_POST['p_method'];
            $itemid = $_POST['itemid'];
            $itemprice = $_POST['itemprice'];

            $total_bill = $item_total*$itemprice;

            if ($p_method=="card") {


               if ($card_balance>=$total_bill) {

              $query = "INSERT INTO orders_details(customer_id,orders_item_id,receiver_name,receiver_number,receiver_address,total_orders_item,total_bill,payment_method) VALUES({$usersId},{$itemid},'{$customer_name}','{$customer_number}','{$customer_adrss}',{$item_total},{$total_bill},'{$p_method}')";

              $result = $db->insert($query);

              if ($result) {

                $updt_balnce=$card_balance-$total_bill;

                $balnce_updt_qry = "UPDATE users SET user_card_balance = $updt_balnce WHERE users_id = $usersId ";
                $balnce_updt_qry_rslt = $db->update($balnce_updt_qry);

                $select = "SELECT * FROM orders_details WHERE customer_id= $usersId AND orders_item_id = $itemid AND total_bill = $total_bill ORDER BY orders_id DESC";

                $select_result = $db->select($select);

                if ($select_result) {

                  $row = mysqli_fetch_array($select_result);

                  $orders_id = $row['orders_id'];
                  $orders_item_id = $row['orders_item_id'];
                  $orders_date = $row['orders_date'];
                  $receiver_name = $row['receiver_name'];
                  $receiver_number = $row['receiver_number'];
                  $receiver_address = $row['receiver_address'];
                  $total_orders_item = $row['total_orders_item'];
                  $total_bill = $row['total_bill'];
                  $payment_method = $row['payment_method'];

                  ?>


                  <div class="row">
                    <div class="col-md-6 offset-md-3">
                      <h1>Thanks.Your Order is successfully confirmed.</h1>
                      <div id="printableArea">

                         <table class="table">
                          <h2>Order Details</h2>
                          <thead>
                            <tr>
                              <th>Order Serial No:</th>
                              <td><?php echo $orders_id; ?></td>
                            </tr>

                            <tr>
                              <th>Item Serial No:</th>
                              <td><?php echo $orders_item_id; ?></td>
                            </tr>

                            <tr>
                              <th>Order Date:</th>
                              <td><?php echo $orders_date; ?></td>
                            </tr>

                            <tr>
                              <th>Receiver Name:</th>
                              <td><?php echo $receiver_name; ?></td>
                            </tr>

                            <tr>
                              <th>Receiver Contact No:</th>
                              <td><?php echo $receiver_number; ?></td>
                            </tr>

                            <tr>
                              <th>Receiver Address:</th>
                              <td><?php echo $receiver_address; ?></td>
                            </tr>

                            <tr>
                              <th>Total Bill:</th>
                              <td><?php echo $total_bill." Tk"; ?></td>
                            </tr>

                             <tr>
                              <th>Total Ordered Item:</th>
                              <td><?php echo $total_orders_item; ?></td>
                            </tr>

                             <tr>
                              <th>Payment Method:</th>
                              <td><?php echo $payment_method; ?></td>
                            </tr>

                          </thead>
                    
                        </table>
                        
                      </div>
                    </div>
                  </div>



                  <?php





                  
                }

                
              }




              
            }else{

              echo "Sory.You do not have sufficient balance.";
            }

            }else{


              $query = "INSERT INTO orders_details(customer_id,orders_item_id,receiver_name,receiver_number,receiver_address,total_orders_item,total_bill,payment_method) VALUES({$usersId},{$itemid},'{$customer_name}','{$customer_number}','{$customer_adrss}',{$item_total},{$total_bill},'{$p_method}')";

              $result = $db->insert($query);

              if ($result) {

                $select = "SELECT * FROM orders_details WHERE customer_id= $usersId AND orders_item_id = $itemid AND total_bill = $total_bill ORDER BY orders_id DESC";

                $select_result = $db->select($select);

                if ($select_result) {

                  $row = mysqli_fetch_array($select_result);

                 $orders_id = $row['orders_id'];
                  $orders_item_id = $row['orders_item_id'];
                  $orders_date = $row['orders_date'];
                  $receiver_name = $row['receiver_name'];
                  $receiver_number = $row['receiver_number'];
                  $receiver_address = $row['receiver_address'];
                  $total_orders_item = $row['total_orders_item'];
                  $total_bill = $row['total_bill'];
                  $payment_method = $row['payment_method'];

                  ?>


                  <div class="row">
                    <div class="col-md-6 offset-md-3">
                      <div id="printableArea">

                         <table class="table">
                          <h2>Order Details</h2>
                          <thead>
                            <tr>
                              <th>Order Serial No:</th>
                              <td><?php echo $orders_id; ?></td>
                            </tr>

                            <tr>
                              <th>Item Serial No:</th>
                              <td><?php echo $orders_item_id; ?></td>
                            </tr>

                            <tr>
                              <th>Order Date:</th>
                              <td><?php echo $orders_date; ?></td>
                            </tr>

                            <tr>
                              <th>Receiver Name:</th>
                              <td><?php echo $receiver_name; ?></td>
                            </tr>

                            <tr>
                              <th>Receiver Contact No:</th>
                              <td><?php echo $receiver_number; ?></td>
                            </tr>

                            <tr>
                              <th>Receiver Address:</th>
                              <td><?php echo $receiver_address; ?></td>
                            </tr>

                            <tr>
                              <th>Total Bill:</th>
                              <td><?php echo $total_bill." Tk"; ?></td>
                            </tr>

                             <tr>
                              <th>Total Ordered Item:</th>
                              <td><?php echo $total_orders_item; ?></td>
                            </tr>

                             <tr>
                              <th>Payment Method:</th>
                              <td><?php echo $payment_method; ?></td>
                            </tr>

                          </thead>
                    
                        </table>
                        
                      </div>
                    </div>
                  </div>



                  <?php





                  
                }

                
              }






            }


          }



           ?>

           <input type="button" class="btn btn-primary" onclick="printDiv('printableArea')" value="print Your Order Details" />
            
        </div>
    </div>
</div>

</body>
</html>

 <script type="text/javascript">     
   function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
 </script>
