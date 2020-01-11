<?php include "include/header.php" ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include "include/sidebar.php" ?>
            <!-- /.navbar-collapse -->
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Item
                            <small>Item List</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>item_list
                            </li>
                        </ol>


                  <div class="row">
                    <div class="col-md-12">

                         <table class="table">
                          <h2>Order Details</h2>
                          <thead>

                            <th>Order Serial No:</th>
                            <th>Item Serial No</th>
                            <th>Order Date</th>
                            <th>Receiver Name</th>
                            <th>Receiver Contact No</th>
                            <th>Receiver Address</th>
                            <th>Total Bill</th>
                            <th>Total Ordered Item</th>
                            <th>Payment Method</th>
                            <th>View</th>
                            <th>Confirmation</th>

                          </thead>

                          <tbody>


                        <?php
   

                $select = "SELECT * FROM orders_details WHERE deliver_status = 0 ";

                $select_result = $db->select($select);

                if ($select_result) {

                  while($row = mysqli_fetch_assoc($select_result)){

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


                            <tr>
                              <td><?php echo $orders_id; ?></td>
                              <td><?php echo $orders_item_id; ?></td>
                              <td><?php echo $orders_date; ?></td>
                              <td><?php echo $receiver_name; ?></td>
                              <td><?php echo $receiver_number; ?></td>
                              <td><?php echo $receiver_address; ?></td>
                              <td><?php echo $total_bill." Tk"; ?></td>
                              <td><?php echo $total_orders_item; ?></td>
                              <td><?php echo $payment_method; ?></td>
                              <td><a href="single_unseen_order.php?ordr_id=<?php echo $orders_id; ?>"><button class="btn btn-success">View</button></a></td>
                              <td><a href="?dlvr_ordr_id=<?php echo $orders_id; ?>"><button class="btn btn-success">Delivered Confirm</button></a></td>
                            </tr>

                          


                  <?php





                  
                }

}






                         ?>

                         </tbody>
                    
                        </table>


                  <?php 

                    if (isset($_GET['dlvr_ordr_id'])) {
                      $dlvr_ordr_id = $_GET['dlvr_ordr_id'];

                      $orddr_upquery = "UPDATE orders_details SET deliver_status = 1 WHERE orders_id =  $dlvr_ordr_id";
                  $orddr_upquery_result = $db->update($orddr_upquery);
                    }


                   ?>
                        
                    </div>
                  </div>

                      
                        

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "include/footer.php" ?>

