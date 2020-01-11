<?php 
include "../lib/session.php";
Session::check_session();
 ?>

<?php include "../config/config.php" ?>
<?php include "../lib/database.php" ?>
<?php include "../helpers/formate.php" ?>

<?php 
$db = new Database();
$fm = new formate();
 ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Food Star</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->

        <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">Food Star Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
               <?php 
               $username = Session::get('userRole');
                if ($username=="order_manager") {

                    $qury = "SELECT * FROM orders_details WHERE orders_status = 0 ";
                    $qry_rs = $db->select($qury);
                    if ($qry_rs) {
                        $ttl_ordr = mysqli_num_rows($qry_rs);

                    }else{

                            $ttl_ordr=0;

                    }


                     $qurys = "SELECT * FROM orders_details WHERE deliver_status = 0 ";
                    $qry_rss = $db->select($qurys);
                    if ($qry_rss) {
                        $ttl_ordr_pndng = mysqli_num_rows($qry_rss);

                    }else{

                            $ttl_ordr_pndng=0;

                    }




                    ?>
                    <li style="margin-top: 0px; padding: 0px !important;"><a href="undelivered_item.php"><button style="background-color: blue;padding-left: 5px;padding-right: 5px;padding-top: 3px;padding-bottom: 3px; ">Pending Delivery Item <span style="color: red; border-radius: 50%;border:2px solid green; font-size: 22px;"><?php echo $ttl_ordr_pndng; ?></span></button></a></li>

                     <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i><span style="color: red;font-size: 22px;"><?php echo $ttl_ordr; ?></span><b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                    

                        <?php 
                        if ($ttl_ordr>0) {
                            while ( $rows = mysqli_fetch_assoc($qry_rs)) {

                                $orders_id= $rows['orders_id'];

                                ?>

                            <li>
                            <a href="single_unseen_order.php?ordr_id=<?php echo $orders_id; ?>"><p>Order<?php echo " ".$orders_id ?></p></a>
                        </li>


                        <li class="divider"></li>
                        




                           <?php  }
                        }


                         ?>


                        <li>
                            <a href="all_unsen_order.php">View All</a>
                        </li>
                        
                    </ul>
                </li>
                    
                <?php }


                ?>
                <li class="dropdown">

                    <?php 

                        $username = Session::get('username');
                        $my_id = Session::get('userId');

                     ?>

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $username; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="profile_edit.php?del_pro=<?php echo $my_id; ?>"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                         <li>
                            <a href="logout.php?action='logout' "><i class="fa fa-fw fa-power-off"></i>Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
