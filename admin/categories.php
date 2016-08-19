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
                          
                           <?php insert_categories(); ?>
                           
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
                            // If EDIT is pressed, includes update_categories form section
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
                                   <!-- Function to bring all categories into view -->
                                    <?php view_categories(); ?>
                                    
                                    <!-- Function to bring delete form to screen -->
                                    <?php delete_category(); ?>
                                    
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
