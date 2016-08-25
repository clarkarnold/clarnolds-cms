<?php
   if (isset($_POST['create_user'])){
       
       $user_firstname   = $_POST['user_firstname'];
       $user_lastname    = $_POST['user_lastname'];
       $user_role        = $_POST['user_role'];
       
//       $post_image = $_FILES['image']['name'];
//       $post_image_temp = $_FILES['image']['tmp_name'];
       
//       $post_date = date('d-m-y');
       
       $username         = $_POST['username'];
       $user_email       = $_POST['user_email'];
       $user_password    = $_POST['user_password'];

       
       
       //move_uploaded_file($post_image_temp, "../images/$post_image");
       
       $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_role) ";
       $query .= "VALUES('{$username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_role}')";
       
       
       $create_user_query = mysqli_query($connection, $query);
       confirm($create_user_query);
       
       }
   

?>
<form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
        <label for="author">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    
    <div class="form-group">
        <label for="post_status">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    
    <div class="form-group">
        <label for="categories">User Role</label>
        <select name="user_role" class="form-control">
            <option value="subscriber">Select Options</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
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
        <input type="text" class="form-control" name="username">
    </div>
    
    <div class="form-group">
        <label for="post_content">User Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Create User">
    </div>
</form>