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
                            <small>Add Item</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>Item_add
                            </li>
                        </ol>

                    <div class="row">
                        <div class="col-md-6" style="margin-left:20%">
                            <?php 

                                if (isset($_POST['create_item'])) {

                                $item_name =$fm->validation($_POST['item_name']);
                                $item_cat =$fm->validation($_POST['item_cat']);
                                $location =$fm->validation($_POST['location']);
                                $status =$fm->validation($_POST['status']);
                                $price =$fm->validation($_POST['price']);
                                $details =$fm->validation($_POST['details']);


                                 $post_img = $_FILES['img']['name'];
                                 $extension = strtolower(substr($post_img,strlen($post_img)-4,strlen($post_img)));
                                 $allowed_extensions = array(".jpg","jpeg",".png");
                                 if(in_array($extension,$allowed_extensions)){

                                  $destination = "../images/item_img/".$post_img;  
                                  $file = $_FILES['img']['tmp_name'];
                                  move_uploaded_file($file, $destination);





                                $item_name = mysqli_real_escape_string($db->link,$item_name);
                                $item_cat = mysqli_real_escape_string($db->link,$item_cat);
                                $location = mysqli_real_escape_string($db->link,$location);
                                $status = mysqli_real_escape_string($db->link,$status);
                                $price = mysqli_real_escape_string($db->link,$price);
                                $details = mysqli_real_escape_string($db->link,$details);
                              

                                if (!empty($item_name) && !empty($item_cat) && !empty($location) && !empty($status) && !empty($price) && !empty($details) && !empty($post_img)) {

                                    $query = "Insert into item(item_name,item_cat,item_location,item_status,item_price,item_details,item_img) values('$item_name','$item_cat','$location','$status','$price','$details','$post_img') ";
                                    $create = $db->insert($query);
                                    if ($create) {
                                       echo "<p style='color:green;text-align:center;'>Item created successfully</p>";
                                    }else{
                                        echo "<p style='color:red;text-align:center;'>opps!! Item is not created</p>";
                                    }

                                }else{
                                    echo "<p style='color:red;text-align:center;'>field must not be empty</p>";
                                }
                                 }else{
                                     echo "<p style='color:red;text-align:center;'>Image must be (jpg,png,jpeg)</p>";
                                 }
                            }


                             ?>
                                 <form role="form" action="item_add.php" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label>Item Name</label>
                                        <input type="text" name="item_name" class="form-control" placeholder="Enter Username">
                                    </div>

                                    <div class="form-group">
                                        <label>Item Category</label>
                                        <select class="form-control" name="item_cat" id="">

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
                                            <option value="Mirpur">Mirpur</option>
                                            <option value="Dhanmondi">Dhanmondi</option>
                                            <option value="Mohammadpur">Mohammadpur</option>
                                            <option value="Uttora">Uttora</option>
                                       
                                         </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status" id="">
                                            <option value="Available">Available</option>
                                            <option value="Uvailable">Uvailable</option>
                                       
                                         </select>
                                    </div>

                                     <div class="form-group">
                                        <label>Item price</label>
                                        <input type="text" name="price" class="form-control" placeholder="Enter Price">
                                    </div>
                                     <div class="form-group">
                                        <label>Item Image</label>
                                        <input type="file" name="img">
                                    </div>

                                    <label>Item Details</label>
                                     <div class="form-group"> 
                                        <textarea name="details" id="" cols="70" rows="5"></textarea>
                                    </div>

                                     <div class="form-group">
                                        <label></label>
                                        <input type="submit" value="Create Item" name="create_item" class="btn btn-primary">
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