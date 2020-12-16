<?php
    include("../includes/sql_functions.php");
    include("header.php");
    $result_p;
    if(isset($_POST['submit'])){
        $search_p = $_POST['search'];
        echo $search_p;
        $result_p = search_query($search_p);
        print_r($result_p);
    }else{
        $result_p = query_all_from_one_table('posts');
        if($result_p){
            echo "dont got it";
        }
    }
    show_posts($result_p);
    function show_posts($result){
        while ($row = mysqli_fetch_assoc($result)){
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
    }    
        ?>
