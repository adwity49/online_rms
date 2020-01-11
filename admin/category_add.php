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
                            <small>Add </small>
                            <small>View </small>
                            <small>Edit </small>
                            <small>Delete Category</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i>Page Name
                            </li>
                        </ol>

                       <div class="row">
                           <div class="col-md-4">
                            <?php 

                                if (isset($_POST['create_cat'])) {

                                $cat_title =$fm->validation($_POST['cat_name']);
                                $cat_title = mysqli_real_escape_string($db->link,$cat_title);

                                if (!empty($cat_title)) {

                                    $query = "Insert into category(cat_title) values('$cat_title') ";
                                    $create = $db->insert($query);
                                    if ($create) {
                                       echo "<p style='color:green;text-align:center;'>catagory created successfully</p>";
                                    }else{
                                        echo "<p style='color:red;text-align:center;'>opps!! category is not created</p>";
                                    }

                                }else{
                                    echo "<p style='color:red;text-align:center;'>field must not be empty</p>";
                                }
                            }


                             ?>
                                 <form role="form" action="category_add.php" method="post">

                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" name="cat_name" class="form-control" placeholder="Enter Nme">
                                    </div>

                                     <div class="form-group">
                                        <label></label>
                                        <input type="submit" value="Create Category" name="create_cat" class="btn btn-primary">
                                    </div>

                                 </form>
                           </div>
                            <div class="col-md-6" style="margin-left: 10%;">

                                <?php 
                                    if (isset($_GET['del_cat_id'])) {
                                        $del_id = $_GET['del_cat_id'];

                                        $query = "delete from category where cat_id = $del_id";
                                        $del_result = $db->delete($query);
                                        if ($del_result) {
                                            echo "<p style='color:green;text-align:center;font-size:20px;'>category deleted successfully</p>";
                                        }else{
                                            echo "<p style='color:red;text-align:center;font-size:20px;'>fail to delete category</p>";
                                        }
                                    }

                                 ?>

                                <h2 style="text-align: center;">View Category</h2>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr class="danger">
                                                <th>No.</th>
                                                <th>Category</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                                 <?php 
                                                        $query = "select * from category ";
                                                        $cat_result = $db->select($query);
                                                        if ($cat_result) {
                                                            $number_of_rows = mysqli_num_rows($cat_result);
                                                            $i=1;
                                                            while ($row = $cat_result->fetch_assoc()) {
                                                                $cat_id = $row['cat_id'];
                                                                $cat_title = $row['cat_title'];


                                                     ?>
                                                <tr class="success">
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $cat_title; ?></td>
                                                    <td><a href="category_edit.php?edit_cat_id=<?php echo $cat_id; ?> "><button type="submit" class="btn btn-success">Edit</button></a></td>


                                                    <td><a onclick="return confirm('Are you sure to delete?')" href="category_add.php?del_cat_id=<?php echo $cat_id; ?>"><button type="submit" class="btn btn-danger">Delete</button></a></td>

                                                </tr>

                                                <?php $i++; }
                                                

                                                    }

                                                ?> 
                                            
                                        </tbody>
                                    </table>
                                </div>
                              
                                
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