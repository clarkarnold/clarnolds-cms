<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>            
        </tr>
    </thead>
    <tbody>
       <?php
        $query = "SELECT * FROM users";
        $get_all_users = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($get_all_users)) {
            $user_id        = $row['user_id'];
            $username       = $row['username'];
            $user_password  = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname  = $row['user_lastname'];
            $user_email     = $row['user_email'];
            $user_image     = $row['user_image'];
            $user_role      = $row['user_role'];
            
            
            

            echo "<tr>";
            echo "<td>{$user_id}</td>";
            echo "<td>{$username}</td>";
            echo "<td>{$user_firstname}</td>";

            echo "<td>{$user_lastname}</td>";
            echo "<td>{$user_email}</td>";
            echo "<td>{$user_role}</td>";
            
            // QUERY to get relational data from posts table 
//            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
//            $select_post_id_query = mysqli_query($connection,$query);
//            while($row = mysqli_fetch_assoc($select_post_id_query)){
//                $post_id = $row["post_id"];
//                $comment_in_response_to = $row["post_title"];
//            }
            
            
           
            echo "<td><a href='users.php?change_to_admin=$user_id' class='btn btn-success'>Admin</a></td>";
            echo "<td><a href='users.php?change_to_sub=$user_id' class='btn btn-warning'>Subscriber</a></td>";
            
            echo "<td><a href='users.php?source=edit_user&edit_user=$user_id' class='btn btn-default'>Edit</a></td>";
            
            echo "<td><a href='users.php?delete={$user_id}' class='btn btn-danger'>Delete</a></td>";
            
            echo "</tr>";
        }




        ?>
    </tbody>
</table>


<?php

if (isset($_GET['delete'])){
    $del_user_id = $_GET['delete'];
    
    $query = "DELETE FROM users WHERE user_id={$del_user_id} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: users.php");
}

if (isset($_GET['change_to_admin'])){
    $admin_id = $_GET['change_to_admin'];
    
    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $admin_id";
    $admin_query = mysqli_query($connection, $query);
    header("Location: users.php");
}

if (isset($_GET['change_to_sub'])){
    $sub_id = $_GET['change_to_sub'];
    
    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $sub_id";
    $sub_query = mysqli_query($connection, $query);
    header("Location: users.php");
}
?>










