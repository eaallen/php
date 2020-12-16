<?php include('comp/header.php');?>
    <!-- Page Content -->
    <div class="container">
        <!-- navigation  -->
        <?php include('comp/nav.php');?>
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Lowfod Map
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <!--  -->
                <?php

                    $result_p;
                    if(isset($_POST['submit'])){
                        $search_p = $_POST['search'];
                        $result_p = search_query($search_p);
                    }else{
                        $result_p = query_all_from_one_table('posts');
                        if(!$result_p){
                            echo "dont got it";
                        }
                    }
                    
                    while ($row = mysqli_fetch_assoc($result_p)){
                        $title = $row['post_title'];
                        $author = $row['post_author'];
                        $date = $row['post_date'];
                        $image = $row['post_image'];
                        $content = $row['post_content'];
                        ?>
                        <div>
                            <h2>
                                <a href="#"><?php echo $title ?></a>
                            </h2>
                            <p class="lead">
                                by <a href="index.php"><?php echo $author ?></a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $date ?></p>
                            <hr>
                            <img class="img-responsive" src="images/<?php echo $image?>" alt=<?php echo $image ?>>
                            <hr>
                            <p><?php echo $content ?></p>
                            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                            <hr/>
                        </div>
                    <?php } 
             
                ?>


                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include('comp/sidebar.php');?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <?php include('comp/footer.php');?>
