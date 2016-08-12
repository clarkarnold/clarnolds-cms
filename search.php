<?php include "includes/header.php";?>
<?php include "includes/db.php"; ?>
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
               <h1 class="page-header">
                Page Heading
                <small>Secondary Text</small>
                </h1>
               
                <?php
                
                // use usset() to test for submit, if submit is pressed we run the code
                if(isset($_POST['submit'])) {
                    // $search is set to what is inside of the text field named search
                    $search = $_POST['search'];
                    // select all items from posts using LIKE our $search
                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";

                    // query the database using the connection and query
                    $search_query = mysqli_query($connection, $query);

                    // if statement to check for errors and display info
                    if(!$search_query) {
                        die("ERROR " . mysqli_error($connection));
                    }

                    $count = mysqli_num_rows($search_query);

                    if($count == 0) {
                        echo "<h1>No Result</h1>";
                    } else {
                        


                        while($row = mysqli_fetch_assoc($search_query)) {
                            $post_title = $row["post_title"];
                            $post_author = $row["post_author"];
                            $post_date = $row["post_date"];
                            $post_image = $row["post_image"];
                            $post_content = $row["post_content"];

                            ?>



                        <!-- HTML/PHP for displaying POSTS -->
                        <h2>
                            <a href="#"><?php echo $post_title ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                        <hr>
                        <p><?php echo $post_content ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>


                        <?php } 
                    }

                }
                
                ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php "?>