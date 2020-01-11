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
                <a href="#" class="logo"><?php echo $_SESSION['usersname']; ?></a>
                <div class="header-right">
                    <a href="index.php">Home</a>
                    <a href="total_orders.php">Orders</a>
                    <a href="total_orders.php">Rate It</a>
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

                <?php 

                   if (isset($_GET['get_item_id'])) {
                        $get_item_id=$_GET['get_item_id'];
                        Session::set("itemId",$get_item_id);

                        $query = "select * from item where item_id = $get_item_id ";
                        $result = $db->select($query);
                        if ($result) {

                         $value = $result->fetch_array();
                        $item_id = $value['item_id'];
                        $item_name = $value['item_name'];
                        $item_location = $value['item_location'];
                        $item_status = $value['item_status'];
                        $item_price = $value['item_price'];
                        $item_details = $value['item_details'];
                        $item_img = $value['item_img'];
                            
                        }else{
                            echo "Error";
                        } ?>

                        <div class="row">
                             <div class="col-md-4">
                                 <img height="400px" width="350px" src="images/item_img/<?php echo $item_img; ?>" alt="">
                             </div>
                             <div class="col-md-4" style="margin-left: 50px;">

                                  <h2><?php echo $item_name; ?></h2>
                                  <p style="font-size: 22px;">Price: <?php echo $item_price;" TK"; ?></p>
                                  <p><strong>Location: </strong><?php echo $item_location; ?></p>
                                  <p><strong>Status: </strong><?php echo $item_status; ?></p>

                                   <h3>Rating  [out of 5]</h3>


                                    <?php 

                                   $query_rting = "SELECT * FROM orders_details WHERE orders_item_id = $item_id ";

                                    $rtng_rslt = $db->select($query_rting);
                                    if ($rtng_rslt) {
                                      $five = 0;
                                      $four = 0;
                                      $three = 0;
                                      $two = 0;
                                      $one = 0;
                                      while ($row = mysqli_fetch_assoc($rtng_rslt)) {
                                        if ($row['product_rating'] == 5) {
                                          $five = $five+1;
                                        }
                                         if ($row['product_rating'] == 4) {
                                          $four = $four+1;
                                        }
                                         if ($row['product_rating'] == 3) {
                                          $three = $three+1;
                                        }
                                        if ($row['product_rating'] == 2) {
                                          $two = $two+1;
                                        }
                                         if ($row['product_rating'] == 1) {
                                          $one = $one+1;
                                        }
                                      }


                                      $arr  = array('5' =>$five,'4' =>$four,'3' =>$three,'2' =>$two,'1' =>$one);

                                      $highest_value = max($arr);

                                     $vall = array_keys($arr,$highest_value);

                                     $rate_val =  $vall[0];

                                    }else{

                                        $rate_val=5;

                                    }

                                    for ($i=0; $i<$rate_val ; $i++) {?>

                                      <span style="color:red;font-size: 30px;"><i class="fa fa-star"></i></span>
                                      
                                    <?php }





                                    ?>


                                   <p><strong>Details: </strong><?php echo $item_details; ?></p>
                             </div>
                             <div class="col-md-2" style="margin-left: 20px;">
                                 <span style="float:right;"><a href="order.php?itm_id=<?php echo $item_id; ?> " class="btn btn-info" role="button">Order Now!</a></span>
                             </div>
                         </div>  

                  <?php  }else if(Session::get('itemId')!=NULL){ 


                        $itemId = Session::get('itemId');
                        Session::set("itemId",$itemId);
                        $query = "select * from item where item_id = $itemId ";
                        $result = $db->select($query);
                        if ($result) {

                         $value = $result->fetch_array();
                        $item_id = $value['item_id'];
                        $item_name = $value['item_name'];
                        $item_location = $value['item_location'];
                        $item_status = $value['item_status'];
                        $item_price = $value['item_price'];
                        $item_details = $value['item_details'];
                        $item_img = $value['item_img'];
                            
                        }else{
                            echo "Error";
                        } ?>

                        <div class="row">
                             <div class="col-md-4">
                                 <img height="400px" width="350px" src="images/item_img/<?php echo $item_img; ?>" alt="">
                             </div>
                             <div class="col-md-4" style="margin-left: 50px;">

                                  <h2><?php echo $item_name; ?></h2>
                                  <p style="font-size: 22px;">Price: <?php echo $item_price;" TK"; ?></p>
                                  <p><strong>Location: </strong><?php echo $item_location; ?></p>
                                  <p><strong>Status: </strong><?php echo $item_status; ?></p>
                                   <h3>Rating  [out of 5]</h3>


                                    <?php 

                                   $query_rting = "SELECT * FROM orders_details WHERE orders_item_id = $item_id ";

                                    $rtng_rslt = $db->select($query_rting);
                                    if ($rtng_rslt) {
                                      $five = 0;
                                      $four = 0;
                                      $three = 0;
                                      $two = 0;
                                      $one = 0;
                                      while ($row = mysqli_fetch_assoc($rtng_rslt)) {
                                        if ($row['product_rating'] == 5) {
                                          $five = $five+1;
                                        }
                                         if ($row['product_rating'] == 4) {
                                          $four = $four+1;
                                        }
                                         if ($row['product_rating'] == 3) {
                                          $three = $three+1;
                                        }
                                        if ($row['product_rating'] == 2) {
                                          $two = $two+1;
                                        }
                                         if ($row['product_rating'] == 1) {
                                          $one = $one+1;
                                        }
                                      }


                                      $arr  = array('5' =>$five,'4' =>$four,'3' =>$three,'2' =>$two,'1' =>$one);

                                      $highest_value = max($arr);

                                     $vall = array_keys($arr,$highest_value);

                                     $rate_val =  $vall[0];

                                    }else{

                                        $rate_val=5;

                                    }

                                    for ($i=0; $i<$rate_val ; $i++) {?>

                                      <span style="color:red;font-size: 30px;"><i class="fa fa-star"></i></span>
                                      
                                    <?php }





                                    ?>




                                   <p><strong>Details: </strong><?php echo $item_details; ?></p>
                             </div>
                             <div class="col-md-2" style="margin-left: 20px;">
                                 <span style="float:right;"><a href="order.php?itm_id=<?php echo $item_id; ?> " class="btn btn-info" role="button">Order Now!</a></span>
                             </div>
                         </div>  

                       
                <?php  }else{

                    header("Location:index.php");
                }


                 ?>

            
        </div>
    </div>
</div>

</body>
</html>