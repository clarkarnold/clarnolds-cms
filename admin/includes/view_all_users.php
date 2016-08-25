<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Date</th>            
        </tr>
    </thead>
    <tbody>
       <?php
        $query = "SELECT * FROM comments";
        $get_all_comments = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($get_all_comments)) {
            $comment_id      = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_date    = $row['comment_date'];
            $comment_author  = $row['comment_author'];
            $comment_email   = $row['comment_email'];
            $comment_content = $row['comment_content'];
            $comment_status  = $row['comment_status'];
            
            

            echo "<tr>";
            echo "<td>{$comment_id}</td>";
            echo "<td>{$comment_author}</td>";
            echo "<td>" . substr($comment_content,0,100) . "...</td>";

            echo "<td>{$comment_email}</td>";
            echo "<td>{$comment_status}</td>";
            
            // QUERY to get relational data from posts table 
            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            $select_post_id_query = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($select_post_id_query)){
                $post_id = $row["post_id"];
                $comment_in_response_to = $row["post_title"];
            }
            
            echo "<td><a href='../post.php?p_id={$post_id}'>{$comment_in_response_to}</a></td>";
            echo "<td>{$comment_date}</td>";
            echo "<td><a href='comments.php?approve=$comment_id' class='btn btn-success'>Approve</a></td>";
            echo "<td><a href='comments.php?unapprove=$comment_id' class='btn btn-warning'>Unapprove</a></td>";
            
            echo "<td><a href='comments.php?delete=$comment_id' class='btn btn-danger'>Delete</a></td>";
            
            echo "</tr>";
        }




        ?>
    </tbody>
</table>


<?php

if (isset($_GET['delete'])){
    $del_comment_id = $_GET['delete'];
    
    $query = "DELETE FROM comments WHERE comment_id={$del_comment_id} ";
    $delete_query = mysqli_query($connection, $query);
    header("Location: comments.php");
}

if (isset($_GET['unapprove'])){
    $unapprove_comment_id = $_GET['unapprove'];
    
    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $unapprove_comment_id";
    $unapprove_query = mysqli_query($connection, $query);
    header("Location: comments.php");
}

if (isset($_GET['approve'])){
    $approve_comment_id = $_GET['approve'];
    
    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $approve_comment_id";
    $approve_query = mysqli_query($connection, $query);
    header("Location: comments.php");
}

?>










