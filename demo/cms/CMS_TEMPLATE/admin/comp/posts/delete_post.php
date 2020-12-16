<?php include("comp/header.php") ?>
<?php 
    if(isset($_POST['submit_delete_post'])){
        $id = $_GET['delete_id'];
        $resp = any_delete('posts','post_id',"$id");
        if($resp){
            $post_image = $_GET['post_img'];
            unlink("../images/$post_image");
        }
        header("Location: posts.php");
    }
?>
            <div class="container">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="">
                            Are you sure you want to delete <strong> <?php echo $_GET['post_title_del']; ?> </strong> ?
                        </h1>
                        <form action="" method="post">
                            <input type="submit" value="Yes" class='btn btn-danger' name="submit_delete_post"> 
                            <a href='posts.php' class='btn btn-primary'>no</a>
                        </form> 
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

<?php include("comp/footer.php") ?>

