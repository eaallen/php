<?php 
    $test = 'HELLO WORLD';
    $data = mysqli_fetch_assoc(any_query_one_record_by_id('posts', 'post_id', $_GET['edit_id']));
    $post_id = $data['post_id'];
    $post_category_id = $data['post_category_id'];
    $post_title = $data['post_title'];
    $post_author = $data['post_author'];
    $post_date = $data['post_date'];
    $post_image = $data['post_image'];
    $post_content = $data['post_content'];
    $post_tags = $data['post_tags'];
    $post_comment_count = $data['post_comment_count'];
    $post_status = $data['post_status'];

?>

<div class='container'>
    <form action="" method="post" enctype="multipart/form-data">
        <div class='row'>
            <div class='col-md-4'>
                <div class='form-group'>
                    <label for='post_title'>Post Title</label>
                    <input id='post_title' name='post_title' type='text' class='form-control' value=<?php echo "'$post_title'"; ?>/>
                </div>
            </div>
            <div  class='col-md-4'>
                <div class='form-group'>
                    <label for='post_tags'>Post Tags</label>
                    <input id='post_tags' name='post_tags' type='text' class='form-control' value=<?php echo "'$post_tags'"; ?>/>
                </div>
            </div>
            <div  class='col-md-4'>
                <div class='form-group'>
                    <label for='post_category_id'>Post Catagory ID</label>
                    <select name="post_category_id" id="post_category_id" class='form-control'>
                        <?php 
                            $add_post_data = query_all_from_one_table('category');
                            while ($row = mysqli_fetch_assoc($add_post_data)){
                                $id = $row['category_id'];
                                $title = $row['category_title'];
                                if($id==$post_category_id){
                                    echo "<option value=$id selected='true'>$id ($title)</option>";
                                }else{
                                    echo "<option value=$id>$id ($title)</option>";
                                }
                            };
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class='form-group'>
            <label for='post_author'>Post Author</label>
            <input id='post_author' name='post_author' type='text' class='form-control' value=<?php echo "'$post_author'"; ?>/>
        </div>

        <div class='row'>
            <div class='col-md-11'>
                <div class='form-group'>
                    <label for='post_image'>Post Image</label>
                    <input id='post_image' name='post_image' type='file' class='form-control' />
                    <!-- <input id='post_image' name='post_image' type='text' class='form-control' value=''/> -->
                </div>
            </div>
            <div class='col-md-1'>
                <div class='form-group center_child'>
                    <?php echo "<img src='../images/$post_image' class='img-responsive thumb_nail center'/>" ?>
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-4'>
                <div class='form-group'>
                    <label for='post_date'>Post Date</label>
                    <?php 
                        $today = date("Y-m-d");
                        echo "<input id='post_date' name='post_date' type='date' class='form-control' value='$post_date'/>";
                    ?>
                    
                </div>
            </div>
            <div  class='col-md-4'>
                <div class='form-group'>
                    <label for='post_comment_count'>Post Comment Count</label>
                    <input id='post_comment_count' name='post_comment_count' type='number' class='form-control' value=<?php echo "'$post_comment_count'"; ?>/>
                </div>
            </div>
            <div  class='col-md-4'>
                <div class='form-group'>
                    <label for='post_status'>Post Status</label>
                    <select name="post_status" id="post_status" class='form-control'>
                            <option value="Pending"  selected=<?php if($post_content=='Pending'){echo 'true';} ?> >Pending</option>
                            <option value="Accepted" selected=<?php if($post_content=='Accepted'){echo 'true';} ?> >Accepted</option>
                            <option value="Rejected" selected=<?php if($post_content    =='Rejected'){echo 'true';}  ?> >Rejected</option>
                    </select>
                    
                </div>
            </div>
        </div>



        <div class='form-group'>
            <label for='post_content'>Post Content</label>
            <textarea id='post_content' name='post_content' type='text' class='form-control' value='' rows="10" style=""><?php echo "$post_content"; ?></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class='btn btn-primary' value="submit post" name="submit_post">
        </div>
        <?php 
            if(isset($_POST['submit_post'])){
                $err = false;
                $img = $_FILES['post_image']['name']; 
                echo $img ."---- <br>";
                foreach ($_POST as $key => $value) {
                    if(empty($value)){
                        echo "<font color='red'>$key is empty</font> <br/>";
                        $err = true;
                    }
                }
                if(!$err){
                    unset($_POST['submit_post']);
                    if($img){
                        $_POST['post_image'] = $img;

                    }
                    print_r($_POST);
                    $check = any_update_one("posts", $_POST, ['post_id', $post_id]);
                    if(!$check){
                        echo "<font color='red'> Connection Error </font>"; // we hade a problem uploading the data, see sql_functions
                    }else{ // handleing the image last
                        $temp_img = $_FILES['post_image']['tmp_name'];
                        if($temp_img){
                            move_uploaded_file($temp_img, "../images/$img");
                        }
                        header("Location: posts.php");
                    }
                }
            }
        ?>

    </form>
</div>