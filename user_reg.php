<?php 
include "lib/session.php";
// Session::check_login();

 ?>
<?php include "config/config.php" ?>
<?php include "lib/database.php" ?>
<?php include "helpers/formate.php" ?>

<?php 
$db = new Database();
$fm = new formate();

 ?>

 <?php 
      if (isset($_POST['reg'])) {
        $user_email = $fm->validation($_POST['user_email']);
        $user_name =  $fm->validation($_POST['user_name']);
        $user_pass =  $fm->validation(md5($_POST['user_pass']));
        $card =  $fm->validation($_POST['card']);
        
        $user_email = mysqli_real_escape_string($db->link,$user_email);
        $user_name = mysqli_real_escape_string($db->link,$user_name);
        $user_pass = mysqli_real_escape_string($db->link,$user_pass);
        $card = mysqli_real_escape_string($db->link,$card);

        if (!empty($user_email) && !empty($user_name) && !empty($user_pass) && !empty($card)) {

             $query = "select user_email from users where user_email ='$user_email' ";
             $login = $db->select($query);

              if ($login == false) {
               $query = "Insert into users(user_email,user_name,user_card,user_pass) values('$user_email','$user_name','$card','$user_pass') ";
              $create = $db->insert($query);
              if ($create) {
                 echo "<p style='color:green;text-align:center;'>Registration Complete...<a href='index.php'>login? click here</a></p>";
              }else{
                  echo "<p style='color:red;text-align:center;'>opps!! Registration Failed</p>";
              }

              }else{
                 echo "<p style='color:red;text-align:center;'>this Email is already resistered.Please Try another Email.</p>";
              }
          }else{
              echo "<p style='color:red;text-align:center;'>field must not be empty</p>";
          }
      }
      

     ?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>LOG IN page</title>
   <h1 align="center"><font face="castellar">Food star</font></h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <style type="text/css">
   body{background-image:url("images//bb.jpg");background-repeat:no-repeat;background-size:1300px 650px}
   
    div#amarblock{width:300px;padding:10px;background-color:rgba(133, 116, 116, 0.64);margin: auto;border:rgba(20, 20, 20, 0.41);text-align:left}
	div#inputfield input{margin-bottom: 10px;
    width: 94%;
    padding-top: 12px;
    padding-bottom: 12px;
    padding: 10px;
    background-color: rgb(35, 232, 232);
    color: #080808;}
	.signintitle{background-color:rgba(255, 52, 2, 0.88);margin-bottom:10px;width:100%}
	.signintitle h3{padding:8px;margin:0px; color:white;font-family:calibri}
	.getin input{background:rgba(255, 52, 2, 0.88);color:white;padding:8px;width:100%;border:1px solid #0a8eca;border-radius:5px}
   </style>
 </head>
 <body>

 <form action="user_reg.php" method="post">
   <div id="amarblock" >
        <div class="signintitle">
          <h3 align="center">Registration</h3>
        </div>
        <div id="inputfield">
          <input type="email" name="user_email" placeholder="Enter Email"/>
        </div>
        <div id="inputfield">
          <input type="text" name="user_name" placeholder="Enter Your Name"/>
        </div>

         <div id="inputfield">
          <input type="text" name="card" placeholder="Enter Your Card Number"/>
        </div>

        <div id="inputfield">
          <input type="password" name="user_pass" placeholder="Enter_Password"/>
        </div>
        <div class="getin">
        <input type="submit" name="reg" value="Register Now!"/>
        </div>
   </div>
   </form>
   </body>
</html>