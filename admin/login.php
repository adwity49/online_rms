<?php 
include "../lib/session.php";
Session::check_login();

 ?>
<?php include "../config/config.php" ?>
<?php include "../lib/database.php" ?>
<?php include "../helpers/formate.php" ?>

<?php 
$db = new Database();
$fm = new formate();

 ?>

 <?php 
      if (isset($_POST['login'])) {
        $username = $fm->validation($_POST['uname']);
        $password =  $fm->validation(md5($_POST['pass']));
        $username = mysqli_real_escape_string($db->link,$username);
        $password = mysqli_real_escape_string($db->link,$password);

        $query = "select * from dashboard_user where user_name ='$username' and user_password = '$password' ";
        $login = $db->select($query);
        if ($login != false) {
          $value = mysqli_fetch_array($login);
          $row=mysqli_num_rows($login);
          if ($row>0) {
            Session::set("adminlogin", true);
            Session::set("username", $value['user_name']);
            Session::set("userId", $value['user_id']);
            Session::set("userRole", $value['user_role']);
            header("Location:index.php");
          }else{
            echo "<span style='color:red;text-align:center;font-size:20px;'>No record found</span>";
          }
        }else{
          echo "<span style='color:red; text-align:center; font-size:20px;'>username or password not matched</span>";
        }
      }

     ?>

<!-- <!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>LOG IN page</title>
   <h1 align="center"><font face="castellar">Food star</font></h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <style type="text/css">
   body{background-image:url("../images/bb.jpg");background-repeat:no-repeat;background-size:1300px 650px}
   
    div#amarblock{width:300px;padding:10px;background-color:rgba(133, 116, 116, 0.64);margin: auto;border:rgba(20, 20, 20, 0.41);text-align:left}
	div#inputfield input{margin-bottom:10px;width:94%;padding-top:12px;padding-bottom:12px;padding:10px;background-color:rgba(10, 10, 10, 0.39);color:white}
	.signintitle{background-color:rgba(255, 52, 2, 0.88);margin-bottom:10px;width:100%}
	.signintitle h3{padding:8px;margin:0px; color:white;font-family:calibri}
	.getin input{background:rgba(255, 52, 2, 0.88);color:white;padding:8px;width:100%;border:1px solid #0a8eca;border-radius:5px}
   </style>
 </head>
 <body>

 <form action="login.php" method="post">
   <div id="amarblock" >
        <div class="signintitle">
          <h3 align="center">SIGN IN</h3>
        </div>
        <div id="inputfield">
          <input type="text" name="uname" placeholder="Enter Username"/>
        </div>
        <div id="inputfield">
          <input type="password" name="pass" placeholder="Enter_Password"/>
        </div>
        <div class="getin">
        <input type="submit" name="login" value="LOG IN"/>
        </div>
        <input type="checkbox"/><span>Remember me</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="password hint"/>
   </div>
   </form>
   </body>
</html> -->