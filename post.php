<?php include "includes/header.php"; ?>

    <!-- Navigation -->
<?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                
                <?php
               if (isset($_GET["p_id"])) {
                   $the_post_id = $_GET['p_id'];   
               }
                
                $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
                $select_post_query = mysqli_query($connection, $query);
                
                while($row = mysqli_fetch_assoc($select_post_query)){
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                }
                
               
               
               ?>

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $post_title ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $post_author; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span>Posted on: <?php echo $post_date; ?></p>

                <hr>

                <!-- Preview Image -->
                
                <img class="img-responsive" src='images/<?php echo $post_image ?>' alt="Image">
                

                <hr>

                <!-- Post Content -->
                <p class=""><?php echo $post_content; ?></p>

                <hr>

               
                <!-- Blog Comments -->
                <?php
                    
                if(isset($_POST["create_comment"])){
                    $comment_author  = $_POST["author_name"];
                    $comment_email   = $_POST["comment_email"];
                    $comment_content = $_POST["comment_content"];
                    
                    $the_post_id     = $_GET["p_id"];
                    
                    // insert new comment into comments table
                    $query = "INSERT INTO comments (comment_post_id, comment_date, comment_author, comment_email, comment_content, comment_status)";
                    
                    $query .= "VALUES ($the_post_id, now(), '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved')";
                    
                    $create_comment_query = mysqli_query($connection,$query);
                    if(!$create_comment_query){
                        die("Query Failed: " . mysqli_error($connection));
                    }
                    
                    
                // Query to increment comment count each time a comment is added
                $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                $query .= "WHERE post_id = {$the_post_id} ";
                $increment_comment_count = mysqli_query($connection,$query);
                }
                
                
                
                
                
                
                
                
                ?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="post" action="">
                       <div class="form-group">
                          <label for="author_name">Name</label>
                           <input name="author_name" type="text" class="form-control" placeholder="Fred Flinstone">
                       </div>
                        <div class="form-group">
                          <label for="comment_email">Email Address</label>
                           <input name="comment_email" class="form-control" type="email" placeholder="fart@example.com">
                       </div>
                       
                        <div class="form-group">
                           <label for="comment_content">Comment</label>
                            <textarea class="form-control" rows="3" name="comment_content" placeholder="Blah Blah Blah.."></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                
                   
                   <?php
                // QUERY to select all approved comments for this post.
                    $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
                    $query .= "AND comment_status = 'approved' ";
                    $query .= "ORDER BY comment_id DESC";
                    $select_comment_query = mysqli_query($connection,$query);
                    if(!$select_comment_query){
                        die("ERROR: " . mysqli_error($connection));
                    }
                
                    
                
                
                    
                    while($row = mysqli_fetch_assoc($select_comment_query)){
                        $comment_date    = $row['comment_date'];
                        $comment_content = $row['comment_content'];
                        $comment_author = $row['comment_author'];
                    
                    
                    
                    ?>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small>Published on: <?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>
                
                <?php } //endwhile ?>
                
                

                <!-- Comment -->


            </div>

            <!-- Blog Sidebar Widgets Column -->
            

<?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

<?php include "includes/footer.php"; ?>