<?php 
include "lib/session.php";
Session::check_user_login();
 ?>
<?php include "config/config.php" ?>
<?php include "lib/database.php" ?>
<?php include "helpers/formate.php" ?>

<?php 
$db = new Database();
$fm = new formate();

if (Session::get('userlogin')==true) {
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
                        <li class="scroll active"><a href="index.php">Home</a></li> 
                        <li class="scroll"><a href="#pricing">Menu</a></li>
                        <!-- <li class="scroll"><a href="#about">About</a></li> --> 
                        <!-- <li class="scroll"><a href="#our-team">Team</a></li> -->
                        <li class="scroll"><a href="#contact-us">Contact</a></li>

                        
                        <!-- Trigger/Open The Modal -->
                        <li class="scroll"><a href="user_logout.php?action=true">Logout</a></li>
                    </ul>
                </div>
                
                        
                                                               
                   
                
            </div><!--/.container-->
        </nav><!--/nav-->
    </header><!--/header-->

                        

                            

                       

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

                        $query = "SELECT * FROM category";
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

                        $query = "SELECT * FROM item WHERE item_cat = $cat_id ";
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
        </div>
    </section><!--/#pricing-->
   
   





    

    <section id="contact">
        
        <div class="container">
            <div class="container contact-info">
                <div class="row">
				  <div class="col-sm-4 col-md-4">
                        <div class="contact-form">
                            <h3>Contact Info</h3>

                            <address>
                              <strong>Amazing Company, Inc.</strong><br>
                              12345 NewYork, Street 125<br>
                              United States 94107<br>
                              <abbr title="Phone">P:</abbr> (123) 456-7890
                            </address>
					</div></div>
                    <div class="col-sm-8 col-md-8">
                        <div class="contact-form">
                       
							<!--NOTE: Update your email Id in "contact_me.php" file in order to receive emails from your contact form-->
							<form name="sentMessage" id="contactForm"  novalidate>
							<h3>Contact Form</h3>
							<div class="control-group">
							<div class="controls">
							<input type="text" class="form-control" 
							placeholder="Full Name" id="name" required
							data-validation-required-message="Please enter your name" />
							<p class="help-block"></p>
							</div>
							</div> 	
							<div class="control-group">
							<div class="controls">
							<input type="email" class="form-control" placeholder="Email" 
							id="email" required
							data-validation-required-message="Please enter your email" />
							</div>
							</div> 	

							<div class="control-group">
							<div class="controls">
							<textarea rows="10" cols="100" class="form-control" 
							placeholder="Message" id="message" required
							data-validation-required-message="Please enter your message" minlength="5" 
							data-validation-minlength-message="Min 5 characters" 
							maxlength="999" style="resize:none"></textarea>
							</div>
							</div> 		 
							<div id="success"> </div> <!-- For success/fail messages -->
							<button type="submit" class="btn btn-primary pull-right">SUBMIT</button><br />
							</form>
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


</body>
</html>

<?php
}else{
   echo "<script>alert('please login first');</script>";
  echo "<script>window.location.href = 'index.php'</script>";
}
?>