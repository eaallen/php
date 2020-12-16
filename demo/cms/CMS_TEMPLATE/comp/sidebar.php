<div class="col-md-4">
<?php
    $result_s = query_all_from_one_table('category');
?>

<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <div class="input-group">
        <form action="index.php" method="post">
            <input type="text" class="form-control" name="search">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit" name="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
        </form>
        </span>
    </div>
    <!-- /.input-group -->
</div>

<!-- Blog Categories Well -->
<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
            <?php
                while ($row = mysqli_fetch_assoc($result_s)){
                    $cate_title = $row['category_title'];
                    echo "<li><a href='#'>{$cate_title}</a></li>";
                }
            ?>

            </ul>
        </div>
        <!-- /.col-lg-6 -->
        <!-- <div class="col-lg-6">
            <ul class="list-unstyled">
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
            </ul>
        </div> -->
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<div class="well">
    <h4>Contanct the Author</h4>

    <div>
        <form action="https://script.google.com/macros/s/AKfycbzqpKmBdnq4xOX98U1ojst8fpius_e_JOYWI4bsNizBOeYEdFg/exec" id="form">
            <div class="form-group">
                <label for="email">Email</label> 
                <input type="email" name="email" id="email" class='form-control' placeholder="youremail@example.com" required>
            </div>
            <div class="form-group">
                <label for="sub">Subject</label> 
                <input type="text" name="sub" id="sub" value="" class='form-control' placeholder="Greetings" required>
            </div>
            <div class="form-group">
                <label for="body">Message</label> 
                <input type="text" name="body" id="body" placeholder="Have a great day" class='form-control' required>
            </div>
            <div class="form-group">
                <input type="submit" class='btn btn-primary' name="submit" id="submit" value="Send It!">
            </div>
        </form>
    </div>


</div>

</div>
