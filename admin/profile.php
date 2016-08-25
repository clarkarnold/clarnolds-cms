<?php include "includes/admin_header.php"; ?>
 <?php
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        
        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $current_user_query = mysqli_query($connection, $query);
        
        while($row = mysqli_fetch_assoc($current_user_query)){
            $user_firstname = $row["user_firstname"];
            $user_lastname  = $row["user_lastname"];
            $user_role      = $row["user_role"];
            $username       = $row["username"];
            $user_email     = $row["user_email"];
            $user_password  = $row["user_password"];
            $user_id        = $row["user_id"];
        }
        
    }

if (isset($_POST['update_profile'])){
       
       $user_firstname   = $_POST['user_firstname'];
       $user_lastname    = $_POST['user_lastname'];
       $user_role        = $_POST['user_role'];
       
       $username         = $_POST['username'];
       $user_email       = $_POST['user_email'];
       $user_password    = $_POST['user_password'];

       $query = "UPDATE users SET ";
       $query .= "user_firstname = '{$user_firstname}', ";
       $query .= "user_lastname = '{$user_lastname}', ";
       $query .= "user_role = '{$user_role}', ";
       $query .= "username = '{$username}', ";
       $query .= "user_email = '{$user_email}', ";
       $query .= "user_password= '{$user_password} ' ";
       $query .= "WHERE user_id = '{$user_id}'";
       

       //move_uploaded_file($post_image_temp, "../images/$post_image");
       

       $update_user_query = mysqli_query($connection, $query);
       confirm($update_user_query);
       
       }




?> 
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       <h1 class="page-header">
                            Welcome <?php echo $user_firstname; ?>
                            <small></small>
                        </h1>
        <form action="" method="post" enctype="multipart/form-data">

           
            <div class="form-group">
                <label for="author">First Name</label>
                <input value="<?php echo $user_firstname; ?>" type="text" class="form-control" name="user_firstname">
            </div>

            <div class="form-group">
                <label for="post_status">Last Name</label>
                <input value="<?php echo $user_lastname; ?>" type="text" class="form-control" name="user_lastname">
            </div>

            <div class="form-group">
                <label for="categories">User Role</label>

                <select name="user_role" class="form-control">
                  <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
                   <?php
                    if($user_role == "admin"){
                        echo "<option value='subscriber'>subscriber</option>";
                    } else {
                        echo "<option value='admin'>admin</option>";
                    }

                    ?>


                </select>
            </div>



        <!--
            <div class="form-group">
                <label for="post_image">User Image</label>
                <input type="file" name="user_image">
                <p class="help-block">Select a profile picture.</p>
            </div>
        -->

            <div class="form-group">
                <label for="post_tags">Username</label>
                <input value="<?php echo $username; ?>" type="text" class="form-control" name="username">
            </div>

            <div class="form-group">
                <label for="post_content">User Email</label>
                <input value="<?php echo $user_email; ?>" type="email" class="form-control" name="user_email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input value="<?php echo $user_password; ?>" type="password" class="form-control" name="user_password">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="update_profile" value="Update Profile">
            </div>
        </form>
                   
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
