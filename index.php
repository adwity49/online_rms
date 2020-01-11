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
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="webthemez">
    <title>Food Star</title>
	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet"> 
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet"> 
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico"> 
</head> 

<body id="home">

    <header id="header">
        <nav id="main-nav" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll active"><a href="#home">Home</a></li> 
                        <li class="scroll"><a href="#portfolio">Gallery</a></li>
                        <li class="scroll"><a href="#pricing">Menu</a></li>
                        <li class="scroll"><a href="#about">About</a></li> 
                        <!-- <li class="scroll"><a href="#our-team">Team</a></li> -->
                        <li class="scroll"><a href="#contact-us">Contact</a></li>

                        <?php 

                            if (Session::get('userlogin')==false && Session::get('adminlogin') == false) { ?>

                                <li class="scroll collapsible"><a href="#">Login</a> </li>
                         <div class="content">
                               <li class="scroll" id="myBtn"><a href="#login">Admin Login</a></li>
                               <li class="scroll" id="myBtn1"><a href="#login">User Login</a></li>
                        </div>

                             <?php }else{ ?>

                                     <li class="scroll"><a href="user_logout.php?action=true">Logout</a></li>

                            <?php }


                         ?>
                         

                    </ul>

                </div>



                
                        
                                                               
                   
                
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->

                        <!-- The Modal -->

                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4 offset-md-8">
                                         <div id="myModal" class="modal">
                                            <!-- Modal content -->
                                              <div class="modal-content">
                                                <span class="close">&times;</span>
                                                     <form action="admin/login.php" method="post">
                                                        <h1 style="text-align: center;">Admin Login</h1>
                                                          <div class="form-group">
                                                            <label for="email">Username:</label>
                                                            <input type="text" name="uname" class="form-control" id="email">
                                                          </div>
                                                          <div class="form-group">
                                                            <label for="pwd">Password:</label>
                                                            <input type="password"name="pass" class="form-control" id="pwd">
                                                          </div>
                                                          <button type="submit" name="login" class="btn btn-success">Submit</button>
                                                    </form>
                                              </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4 offset-md-8">
                                         <div id="myModal1" class="modal">
                                            <!-- Modal content -->
                                              <div class="modal-content">
                                                <span class="close1">&times;</span>
                                                     <form action="user_login.php" method="post">
                                                        <h1 style="text-align: center;">User Login</h1>
                                                          <div class="form-group">
                                                            <label for="email">Email:</label>
                                                            <input type="email" name="user_email" class="form-control" id="email">
                                                          </div>
                                                          <div class="form-group">
                                                            <label for="pwd">Password:</label>
                                                            <input type="password" name="user_pass" class="form-control" id="pwd">
                                                          </div>
                                                          <button type="submit" name="login" class="btn btn-success">Submit</button>
                                                    </form>

                                                    <p>Haven't an Account...?<a href="user_reg.php"> Register here</a></p>
                                              </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>

                       

    <section id="hero-banner">
             <div class="banner-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                 
                                    <h2><b>Tasty</b> Food For Sure!! </h2>
                                    <p>Whatever your occasion, we make it one to remember!</p>
                                    
                            </div>
                        </div>
                    </div>
                </div>
    </section><!--/#main-slider-->



    <section id="portfolio">

<div class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeInDown">Gallery</h2>
                <p class="wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
            </div>


            <div class="portfolio-items">

            <?php 

                        $querys = "SELECT * FROM item LIMIT 8 ";
                        $resultss = $db->select($querys);
                        if ($resultss) {
                            while ($rowss=$resultss->fetch_assoc()) {
                                $item_id=$rowss['item_id'];
                                $item_name=$rowss['item_name'];
                                $item_price=$rowss['item_price'];
                                $item_img=$rowss['item_img'];
                       ?>




                <div class="portfolio-item designing">
                    <div class="portfolio-item-inner">
                        <img style="max-width: 276px;max-height: 250px;min-width: 276px;min-height: 250px;" class="img-responsive" src="images/item_img/<?php echo $item_img; ?>" alt="">
                        <div class="portfolio-info">
                            <h3><?php echo $item_name; ?></h3>
                            <h4>Price : <?php echo $item_price." Tk"; ?></h4>
                            
                            <a class="preview" href="images/item_img/<?php echo $item_img; ?>" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                             <a href="order.php?itm_id=<?php echo $item_id; ?>"><button style="margin-left: -5px !important;" class="btn btn-success">Order</button></a>
                        </div>
                    </div>

                </div><!--/.portfolio-item-->

            <?php 
                    }
                }

             ?>

           
            </div>
            <div style="margin-top: 10%;" class="container">
            <div class="row">
                <div style="margin-left:45%;" class="col-md-4">
                    <a target="_blank" href="more_post.php"><button class="btn btn-primary">View More</button></a>
                </div>
            </div>
        </div>

        </div><!--/.container-->
        
        
       
    </section><!--/#portfolio-->

 
    <section id="pricing">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeInDown">Menu</h2>
                <p class="wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
            </div> 
            <div class="row">
                <!-- Menu text, Image or Video iframe -->
                      <!-- Menu Card -->
                      <?php 

                        $query = "SELECT * FROM category LIMIT 4";
                        $results = $db->select($query);
                        if ($results) {
                            while ($rows=$results->fetch_assoc()) {
                                $cat_id=$rows['cat_id'];
                                $cat_title=$rows['cat_title'];
                       ?>
                <div class="col-sm-3">
                    <h4><?php echo $cat_title; ?></h4>
                    <ul class="menuPrice">
                        <?php 

                        $query = "SELECT * FROM item WHERE item_cat = $cat_id LIMIT 3";
                        $result = $db->select($query);
                        if ($result) {
                            while ($row=$result->fetch_assoc()) {
                                $item_id=$row['item_id'];
                                $item_name=$row['item_name'];
                                $item_price=$row['item_price'];
                       ?>

                        <li>
                            <a href="single_item.php?get_item_id=<?php echo $item_id; ?>"><?php echo $item_name; ?><span class="number"><?php echo $item_price." Tk" ?></span></a>
                        </li>
                    <?php } } ?>
                    </ul>
                </div>

                <?php  }
                        } ?>


            </div>    
               <div class="row">
                   <div class="col-md-3" style="margin-left:45%;margin-top:5%;">
                       <a href="more_post.php"><button class="btn btn-success">See More</button></a>
                   </div>
               </div>  
        </div>

    </section><!--/#pricing-->
   
   

 <section id="about">
        <div class="container">

            <div class="section-header">
                <h2 class="section-title wow fadeInDown">About Us</h2>
                <p class="wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
            </div>

            <div class="row">
                <div class="col-sm-6 wow fadeInLeft">
                  <img class="img-responsive" src="images/about.png" alt="">
                </div>

                <div class="col-sm-6 wow fadeInRight">
                    <h3 class="column-title">Our Restaurant</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa semper aliquam quis mattis quam. Morbi vitae tortor tempus, placerat leo et, suscipit lectus. Phasellus ut euismod massa, eu eleifend ipsum.</p>

                    <p>Nulla eu neque commodo, dapibus dolor eget, dictum arcu. In nec purus eu tellus consequat ultricies. Donec feugiat tempor turpis, rutrum sagittis mi venenatis at. Sed molestie lorem a blandit congue. Ut pellentesque odio quis leo volutpat, vitae vulputate felis condimentum. </p>

					<p>Praesent vulputate fermentum lorem, id rhoncus sem vehicula eu. Quisque ullamcorper, orci adipiscing auctor viverra, velit arcu malesuada metus, in volutpat tellus sem at justo.</p>

                </div>
            </div>
        </div>
    </section><!--/#about-->

    <section id="features">
    	 <div class="container">
    	   <div class="section-header">
                <h2 class="section-title wow fadeInDown">Our Features</h2>
                <p class="wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
            </div>
        	<div class="row FeatLayout">
                <div class="col-md-5 Featimg"> 
                    <img src="images/features_img.png" alt="feature" class="img-responsive center-block">
                </div>
                <div class="col-md-7">
                    <h2>We Make your life easy</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa semper aliquam quis mattis quam adipiscing elit. Praesent eget risus vitae massa.</p>
                    <ul class="listarrow">
                        <li><i class="fa fa-angle-double-right"></i>Quality Food</li>
                        <li><i class="fa fa-angle-double-right"></i>Best Ambiance</li>
                        <li><i class="fa fa-angle-double-right"></i>Hygiene</li>
                        <li><i class="fa fa-angle-double-right"></i>DineIn, Buffet</li>
                        <li><i class="fa fa-angle-double-right"></i>24/7 Service</li>
                        <li><i class="fa fa-angle-double-right"></i>Party</li>
                    </ul>
                </div>
            </div>
    	 </div>
    </section>

    
 
    <section id="contact-us">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title wow fadeInDown">Contact Us</h2>
                <p class="wow fadeInDown">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eget risus vitae massa <br> semper aliquam quis mattis quam.</p>
            </div>
        </div>
    </section><!--/#contact-us-->


    <section id="contact">
        
        <div class="container">
            <div class="container contact-info">
                <div class="row">
				  <div class="col-sm-8" style="margin-left:30%;">
                        <div class="contact-form">
                            <h3>Contact Info</h3>

                            <address>
                              <strong>Food Star</strong><br>
                              Mirpur,Section-10,Dhaka<br>
                              Bangladesh<br>
                              <abbr title="Contact No:">Contact No:</abbr>+8801xxxxxxxxx</br>
                              <abbr title="Email:">Email:</abbr>example@gmail.com
                            </address>
					</div>
                   
                </div>
            </div>

        </div>   
        </div>   
   </section><!--/#bottom-->

    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2019 All right Reserved <a href="https://webthemez.com/tag/free" target="_blank">Food lover</a>
                </div>
                <div class="col-sm-6">
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li> 
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa fa-github"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/mousescroll.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/jquery.inview.min.js"></script>
    <script src="js/wow.min.js"></script>
 <script src="contact/jqBootstrapValidation.js"></script>
 <script src="contact/contact_me.js"></script>
    <script src="js/custom-scripts.js"></script>


<script>

    var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}
    
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
    document.getElementById("myBtn").style.zIndex = "1";
  }
}


// Get the modal
var modal1 = document.getElementById("myModal1");

// Get the button that opens the modal
var btn1 = document.getElementById("myBtn1");

// Get the <span> element that closes the modal
var span1 = document.getElementsByClassName("close1")[0];

// When the user clicks on the button, open the modal
btn1.onclick = function() {
  modal1.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span1.onclick = function() {
  modal1.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal1) {
    modal1.style.display = "none";
    document.getElementById("myBtn1").style.zIndex = "1";
  }
}

</script>


</body>
</html>

