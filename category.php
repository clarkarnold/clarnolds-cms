<?php include "includes/header.php";?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
               
               
                <?php
                if (isset($_GET['category'])){
                    $cat_id = $_GET['category'];
                }
                
                $query = "SELECT * FROM posts WHERE post_category_id = $cat_id";
                $select_all_posts_category = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($select_all_posts_category)) {
                    $post_id = $row['post_id'];
                    $post_title = $row["post_title"];
                    $post_author = $row["post_author"];
                    $post_date = $row["post_date"];
                    $post_image = $row["post_image"];
                    $post_content = substr($row["post_content"],0,100);
                    
                ?>
                    
                <h1 class="page-header">
                <?php 
                $q = "SELECT * FROM category WHERE cat_id = $cat_id";
                $get_category = mysqli_query($connection, $q);
                while($row = mysqli_fetch_assoc($get_category)){
                    $cat_title = $row['cat_title'];
                }
                echo $cat_title;
                ?>
                
                </h1>

                <!-- HTML/PHP for displaying POSTS -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content ?>...</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                    
                    
                <?php } ?>
                
                
                

                

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php "?>