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
            <a href="index.php" class="logo">FOOD STAR</a>
            <div class="header-right">
                <a class="" href="index.php">Home</a>
                <a href="index.php">Login</a>
            </div>
        </div>


      <?php }


     ?>


     <?php 

if (isset($_POST['submits'])) {

  $serial= $_POST['serial'];
  $rating= $_POST['rating'];

$rating_query = "UPDATE orders_details SET product_rating = $rating WHERE orders_id= $serial ";

$rating_query_result = $db->update($rating_query);

if ($rating_query_result) {
  echo "Thanks For You feedback ";
}


}


  ?>

<div class="container">
    <div class="row">
        <div class="col-md-4" style="margin-left:35%;">


          <form action="rating_item.php" method="post">
            <div class="form-group">
              <label for="email">Enter Order Serial No:</label>
              <input type="text" class="form-control" name="serial">
            </div>
            <div class="form-group">
              <label for="pwd">SelectRating</label>
              <select class="form-control" name="rating" id="">
                <option value="5">Five Star</option>
                <option value="4">Four Star</option>
                <option value="3">Three Star</option>
                <option value="2">Two Star</option>
                <option value="1">One Star</option>
              </select>
            </div>
            <button type="submit" name="submits" class="btn btn-default">Submit</button>
          </form>

          

        </div>
    </div>
</div>

</body>
</html>