<form action="" method="post">
    <div class="form-group">
       <label for="cat_title">Edit Category</label>

       <?php 
        if(isset($_GET['edit'])) {
            $cat_id = $_GET['edit'];
            $query = "SELECT * FROM category WHERE cat_id = $cat_id";
            $category_query_id = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($category_query_id)) {
                $id = $row["cat_id"];
                $cat_title = $row["cat_title"];
                ?>
            <input type="text" value="<?php if(isset($cat_title)) { echo $cat_title; } ?>" class="form-control" name="cat_title">                                            

            <?php } //endwhile ?>
        <?php } //end IF ?>


        <?php // update query

        if(isset($_POST['edit'])) {
            $get_cat_title = $_POST['cat_title'];
            $get_query = "UPDATE category SET cat_title = '{$get_cat_title}' WHERE cat_id = {$cat_id} ";
            $update_query = mysqli_query($connection, $get_query);
            if(!$update_query) {
                die("Query Failed" . mysqli_error($connection));
            }
            header("Location: categories.php");
        }



        ?>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit" value="Edit Category" >
    </div>
</form>