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
                            Category
                            <small>Edit Category</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>category_edit
                            </li>
                        </ol>


                        <?php 
                            if (isset($_GET['edit_cat_id']) && $_GET['edit_cat_id'] !=NULL) {
                                $id = $_GET['edit_cat_id'];


                                 $query = "select * from category where cat_id = $id ";
                                $select_cat = $db->select($query);
                                if ($select_cat) {

                                    $row = $select_cat->fetch_array();
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];     
                                    
                                }else{
                                     echo "<p style='color:red;text-align:center;'>opps!! not found the category</p>"; 
                                }
                            }

                         ?>


                    <div class="row">
                        <div class="col-md-6">

                            <?php 
                                if (isset($_POST['update_cat'])) {

                                    $cat_id_up =$_POST['id'];
                                    $cat_title =$fm->validation($_POST['cat_name']);
                                    $cat_title_up = mysqli_real_escape_string($db->link,$cat_title);

                                    if (!empty($cat_title_up)) {
                                        $query = "update  category set cat_title = '$cat_title_up' where cat_id =  $cat_id_up ";

                                        $update = $db->update($query);
                                        if ($update) {
                                           echo "<p style='color:green;text-align:center;'>catagory updated successfully <a href='category_add.php'>Click Here To View</a> </p>";
                                        }else{
                                            echo "<p style='color:red;text-align:center;'>opps!! category is not updated</p>";
                                        }

                                    
                                    }else{
                                        echo "<p style='color:red;text-align:center;'>field must not be empty</p>";
                                    }
                                }


                             ?>


                            <form role="form" action="category_edit.php" method="post">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" name="cat_name" class="form-control" value="<?php echo isset($_GET['edit_cat_id']) ? $cat_title : '' ?>">
                                </div>

                                 <input type="hidden" name="id" value="<?php echo isset($_GET['edit_cat_id']) ? $cat_id : '' ?>">

                                 <div class="form-group">
                                    <label></label>
                                    <input type="submit" value="Update Category" name="update_cat" class="btn btn-primary">
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