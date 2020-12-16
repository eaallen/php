    <?php
        $result_n = query_all_from_one_table('category');
        if(!$result_n){
            echo "dont got it";
        }
    
    ?>
    <!-- Navigation -->
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
                <a class="navbar-brand" href="#">IBS Food Map</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php
                        while ($row = mysqli_fetch_assoc($result_n)){
                            $cate_title = $row['category_title'];
                            echo "<li><a href='#'>{$cate_title}</a></li>";
                        }
                    ?>
                    
                    <?php
                        session_start();
                        if(isset($_SESSION['user'])){
                            echo "<li><a href='admin'>Admin</a></li>";
                        }else{
                            echo "<li><a href='sign_in'>Sign in</a></li>";
                        }
                    ?>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
