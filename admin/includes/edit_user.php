<?php

if(isset($_GET["edit_user"])){
    $edit_user_id = $_GET["edit_user"];
    
    $query = "SELECT * FROM users WHERE user_id = $edit_user_id";
    $select_user = mysqli_query($connection, $query);
    
    while($row = mysqli_fetch_assoc($select_user)){
        
        $user_firstname = $row["user_firstname"];
        $user_lastname  = $row["user_lastname"];
        $user_role      = $row["user_role"];
        $username       = $row["username"];
        $user_email     = $row["user_email"];
        $user_password  = $row["user_password"];
    }
    
}






   if (isset($_POST['update_user'])){
       
       $user_firstname   = $_POST['user_firstname'];
       $user_lastname    = $_POST['user_lastname'];
       $user_role        = $_POST['user_role'];
       
//       $post_image = $_FILES['image']['name'];
//       $post_image_temp = $_FILES['image']['tmp_name'];
       
//       $post_date = date('d-m-y');
       
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
       $query .= "WHERE user_id = '{$edit_user_id}'";
       
       
       
       
       //move_uploaded_file($post_image_temp, "../images/$post_image");
       
       
       
       
       $update_user_query = mysqli_query($connection, $query);
       confirm($update_user_query);
       
       }
   

?>
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
        <input type="submit" class="btn btn-primary" name="update_user" value="Update User">
    </div>
</form>