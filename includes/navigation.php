<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Clark's CMS</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

                    
                    <?php
                    
                    if(isset($_SESSION['role'])){
                        echo "<li class='pull-right'><a href='includes/logout.php'>Logout</a></li>";
                        
                        if($_SESSION['role'] == 'admin') {
                            echo "<li class='pull-right'><a href='admin'>Admin</a></li>";
                        }

                        if(isset($_GET['p_id']) && $_SESSION['role'] == 'admin'){
                            $p_id = $_GET['p_id'];
                            echo "<li><a href='admin/post.php?source=edit_post&p_id=$p_id'>Edit Post</a></li>";
                        }
                    }
 
                        ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>