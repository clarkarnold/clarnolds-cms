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
                        
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                $query = "SELECT * FROM posts";
                                $category_posts = mysqli_query($connection, $query);

                                while($row = mysqli_fetch_assoc($category_posts)) {
                                    $post_id = $row['post_id'];
                                    $post_title = $row['post_title'];
                                    $post_author = $row['post_author'];
                                    $post_category_id = $row['post_category_id'];
                                    $post_date = $row['post_date'];
                                    $post_image = $row['post_image'];
                                    $post_tags = $row['post_tags'];
                                    $post_comment_count = $row['post_comment_count'];
                                    $post_status = $row['post_status'];
                                    
                                    echo "<tr>";
                                    echo "<td>{$post_id}</td>";
                                    echo "<td>{$post_author}</td>";
                                    echo "<td>{$post_title}</td>";
                                    echo "<td>{$post_category_id}</td>";
                                    echo "<td>{$post_status}</td>";
                                    echo "<td><img src='../images/{$post_image}' width='100' alt='{$post_author} image' /></td>";
                                    echo "<td>{$post_tags}</td>";
                                    echo "<td>{$post_comment_count}</td>";
                                    echo "<td>{$post_date}</td>";
                                    echo "<tr>";
                                }
                                
                                
                                
                                
                                ?>
                                <tr>
                                    <td>10</td>
                                    <td>Clark Arnold</td>
                                    <td>Bootstrap Framework</td>
                                    <td>Bootstrap</td>
                                    <td>Published</td>
                                    <td>strap.jpg</td>
                                    <td>Bootstrap, CSS, HTML</td>
                                    <td>Comments</td>
                                    <td>10/10/10</td>
                                </tr>
                            </tbody>
                        </table>
                       
                        
                        
                        
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
