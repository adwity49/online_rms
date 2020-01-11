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
                            <small>Edit Item</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>Item_edit
                            </li>
                        </ol>

                         <?php 
                            if (isset($_GET['edit_list_id']) && $_GET['edit_list_id'] !=NULL) {
                                $edit_list_id = $_GET['edit_list_id'];


                                 $query = "select * from item where item_id = $edit_list_id ";
                                $select_cat = $db->select($query);
                                if ($select_cat) {

                                    $row = $select_cat->fetch_array();
                                    $item_id = $row['item_id'];
                                    $item_name = $row['item_name'];
                                    $item_cat = $row['item_cat'];
                                    $item_location = $row['item_location'];
                                    $item_status = $row['item_status'];
                                    $item_price = $row['item_price'];
                                    $item_details = $row['item_details'];
                                    $item_img = $row['item_img'];     
                                    
                                }else{
                                     echo "<p style='color:red;text-align:center;'>opps!! not found the Item</p>"; 
                                }
                            }

                         ?>

                    <div class="row">
                        <div class="col-md-6" style="margin-left:20%">
                            <?php 

                                if (isset($_POST['edit_item'])) {

                                $item_id_up =$_POST['item_id_up'];
                                $name =$fm->validation($_POST['item_name']);
                                $cat =$fm->validation($_POST['item_cat']);
                                $location =$fm->validation($_POST['location']);
                                $status =$fm->validation($_POST['status']);
                                $price =$fm->validation($_POST['price']);
                                $details =$fm->validation($_POST['details']);

                                $post_img = $_FILES['img']['name'];

                                $name = mysqli_real_escape_string($db->link,$name);
                                $cat = mysqli_real_escape_string($db->link,$cat);
                                $location = mysqli_real_escape_string($db->link,$location);
                                $status = mysqli_real_escape_string($db->link,$status);
                                $price = mysqli_real_escape_string($db->link,$price);
                                $details = mysqli_real_escape_string($db->link,$details);


                                 if (!empty($post_img)) {



                                    $extension = strtolower(substr($post_img,strlen($post_img)-4,strlen($post_img)));
                                      $allowed_extensions = array(".jpg","jpeg",".png");

                                      if(in_array($extension,$allowed_extensions)){

                                        $select_query = "select item_img from item where item_id = $item_id_up ";
                                            $result_query = $db->select($select_query);
                                            if ($result_query) {

                                                $image_row = $result_query->fetch_array();
                                                $item_img = $image_row['item_img'];
                                                unlink('../images/item_img/'.$item_img);
                                                
                                            }

                                      $destination = "../images/item_img/".$post_img;  
                                      $file = $_FILES['img']['tmp_name'];
                                      move_uploaded_file($file, $destination); 
                                       }else{

                                         echo "<p style='color:red;text-align:center;'>image type must be (.jpg, jpeg, .png)</p>"; 
                                    }
                                  
                                  }else {
                                          $query = "select item_img from item where item_id = $item_id_up ";
                                          $select_image = $db->select($query);
                                          if ($select_image) {

                                              $row = $select_image->fetch_array();   
                                              $post_img = $row['item_img'];
                                               
                                              
                                          }else{
                                               echo "<p style='color:red;text-align:center;'>opps!! not found any Image</p>"; 
                                          }
                                      }






                                
                              

                                if (!empty($name) && !empty($cat) && !empty($location) && !empty($status) && !empty($price) && !empty($details) && !empty($post_img)) {

                                    $query = "update item set item_name='$name',item_cat='$cat',item_location='$location',item_status='$status',item_price='$price',item_details='$details',item_img='$post_img' where item_id = $item_id_up ";
                                    $update = $db->update($query);
                                    if ($update) {
                                       echo "<p style='color:green;text-align:center;'>Item Updated successfully...<a href='item_list.php'>View Update History</a></p>";
                                    }else{
                                        echo "<p style='color:red;text-align:center;'>opps!! Item is not Updated</p>";
                                    }

                                }else{
                                    echo "<p style='color:red;text-align:center;'>field must not be empty... <a href='item_list.php'>Click here to edit</a></p>";
                                }
                                 
                            }


                             ?>
                                 <form role="form" action="item_edit.php" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label>Item Name</label>
                                        <input type="text" name="item_name" class="form-control" value="<?php echo isset($_GET['edit_list_id']) ? $item_name : '' ?> ">
                                    </div>

                                    <div class="form-group">
                                        <label>Item Category</label>
                                        <select class="form-control" name="item_cat" id="">
                                          <option value="">Select Category</option>

                                        <?php 
                                            $query = "select * from category";
                                            $result = $db->select($query);
                                            if ($result) {
                                               while ($row = $result->fetch_assoc()) {
                                                   $cat_id = $row['cat_id'];
                                                   $cat_title = $row['cat_title'];

                                                   ?>
                                                    
                                                        <option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>

                                            <?php   }
                                            }

                                         ?> 
                                         </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Location</label>
                                        <select class="form-control" name="location" id="">
                                            <option value="">Select Location</option>
                                            <option value="Mirpur">Mirpur</option>
                                            <option value="Dhanmondi">Dhanmondi</option>
                                            <option value="Mohammadpur">Mohammadpur</option>
                                            <option value="Uttora">Uttora</option>
                                       
                                         </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status" id="">
                                            <option value="">Select Status</option>
                                            <option value="Available">Available</option>
                                            <option value="Uvailable">Uvailable</option>
                                       
                                         </select>
                                    </div>

                                     <div class="form-group">
                                        <label>Item price</label>
                                        <input type="text" name="price" class="form-control"  value="<?php echo isset($_GET['edit_list_id']) ? $item_price : '' ?> ">
                                    </div>
                                     <div class="form-group">
                                        <P>if you dot upload new photo, previous photo will be there</P>
                                        <label>Item Image</label>
                                        <input type="file" name="img">
                                    </div>

                                    <label>Item Details</label>
                                     <div class="form-group"> 
                                        <textarea name="details" id="" cols="70" rows="5"><?php echo isset($_GET['edit_list_id']) ? $item_details : '' ?></textarea>
                                    </div>

                                    <input type="hidden" name="item_id_up" class="form-control"  value="<?php echo isset($_GET['edit_list_id']) ? $item_id : '' ?> ">

                                     <div class="form-group">
                                        <label></label>
                                        <input type="submit" value="Update Item" name="edit_item" class="btn btn-primary">
                                    </div>

                                 </form>
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