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

 ?>

 <?php 
 if (Session::get('userlogin')==true){

  header("Location:index.php");

 }else{
      if (isset($_POST['login'])) {
        $user_email = $fm->validation($_POST['user_email']);
        $user_pass =  $fm->validation(md5($_POST['user_pass']));
        $user_email = mysqli_real_escape_string($db->link,$user_email);
        $user_pass = mysqli_real_escape_string($db->link,$user_pass);

        $query = "select * from users where user_email ='$user_email' and user_pass = '$user_pass' ";
        $login = $db->select($query);
        if ($login != false) {
          $values = mysqli_fetch_array($login);
          $rows=mysqli_num_rows($login);
          if ($rows>0 && $rows<2) {
            Session::set("userlogin", true);
            Session::set("usersId", $values['users_id']);
            Session::set("usersemail", $values['user_email']);
            Session::set("usersname", $values['user_name']);
            Session::set("card_balance", $values['user_card_balance']);
            header("Location:more_post.php");
          }else{
            echo "<span style='color:red;text-align:center;font-size:20px;'>No record found</span>";
          }
        }else{
          echo "<span style='color:red; text-align:center; font-size:20px;'>username or password not matched</span>";
        }
      }

}
     ?>
