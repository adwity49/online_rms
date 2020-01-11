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


                        <?php 

                        if (isset($_GET['ordr_id'])) {
                            $ordr_id= $_GET['ordr_id'];


                            $dlvr_up_query = "UPDATE orders_details SET orders_status = 1 WHERE orders_id =  $ordr_id";
                            $dlvr_up_query_result = $db->update($dlvr_up_query);
                        

                $select = "SELECT * FROM orders_details WHERE orders_id = $ordr_id";

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
                  $deliver_status = $row['deliver_status'];

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




                         ?>
                        
                       

<input type="button" class="btn btn-primary" onclick="printDiv('printableArea')" value="print Order Details" />



 <a href="?od_id=<?php echo $orders_id; ?>"><button class="btn btn-success">Delivered Confirm</button></a>   
    

<?php 
if (isset($_GET['od_id'])) {
    $od_id = $_GET['od_id'];

    $del_sucess_query = "UPDATE orders_details SET deliver_status = 1 WHERE orders_id =  $od_id";
    $rslt = $db->update($del_sucess_query);
}




 ?>
                        

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "include/footer.php" ?>

 <script type="text/javascript">     
   function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
 </script>
