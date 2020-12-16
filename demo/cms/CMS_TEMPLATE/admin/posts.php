<?php include("comp/header.php") ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include("comp/nav.php") ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Manage Posts
                            <small>Admin</small>
                        </h1>
                        <?php
                            if(isset($_GET['src'])){
                                $src = $_GET['src'];
                                switch ($src) {
                                    case 'add_post':
                                        include("comp/posts/add_post.php");
                                    break;
                                    case 'edit':
                                        include("comp/posts/edit_post.php");
                                    break;
                                    case 'delete':
                                        include("comp/posts/delete_post.php");
                                    break;
    
                                            
                                    default:
                                        include("comp/view_all_posts.php");
                                    break;
                                }
                            }else{
                                include("comp/view_all_posts.php");
                            }
                        
                        ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include("comp/footer.php") ?>

