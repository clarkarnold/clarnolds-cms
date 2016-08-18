<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Username</small>
                        </h1>
                        
                        <!-- Form for new Category Begins -->
                        <div class="col-xs-12 col-sm-6">
                           <?php
                            
                            if(isset($_POST['submit'])) {
                                $cat_title = $_POST['cat_title'];
                                
                                if($cat_title=="" || empty($cat_title)) {
                                    echo "<p class='bg-danger'>You Dumb</p>";
                                } else {
                                    $query = "INSERT INTO category(cat_title) ";
                                    $query .= "VALUE('{$cat_title}') ";
                                    
                                    $create_category = mysqli_query($connection, $query);
                                    
                                    if(!$create_category) {
                                        die("Error " . mysqli_error($connection));
                                    }
                                }
                            }
                            
                            ?>
                            <form action="" method="post">
                                <div class="form-group">
                                   <label for="cat_title">New Category</label>
                                    <input class="form-control" type="text" name="cat_title" >
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category" >
                                </div>
                            </form>
                            
                            <?php 
                            
                            if(isset($_GET['edit'])) {
                                $cat_id = $_GET['edit'];
                                include "includes/update_categories.php";
                            }
                            
                            ?>
                            

                        </div>
                        
                        <div class="col-xs-12 col-sm-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query = "SELECT * FROM category";
                                        $category_query = mysqli_query($connection, $query);
                                    
                                        while($row = mysqli_fetch_assoc($category_query)) {
                                            $id = $row["cat_id"];
                                            $cat_title = $row["cat_title"];
                                            echo "
                                            <tr>
                                                <td>{$id}</td>
                                                <td><p>{$cat_title}</p>
                                                    <div class='btn-toolbar'>
                                                    <a class='btn btn-sm btn-danger pull-right' href='categories.php?delete={$id}'> Delete</a><a class=' btn btn-sm btn-warning pull-right' href='categories.php?edit={$id}'>Edit </a> 
                                                    </div>
                                                </td>
                                            </tr>";
                                        }
                                    
                                    
                                    ?>
                                    
                                    <?php
                                    
                                    if(isset($_GET['delete'])) {
                                        $get_cat_id = $_GET['delete'];
                                        $get_query = "DELETE FROM category WHERE cat_id = {$get_cat_id} ";
                                        $delete_query = mysqli_query($connection, $get_query);
                                        header("Location: categories.php");
                                    }
                                    
                                    
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

<?php include "includes/admin_footer.php"; ?>
