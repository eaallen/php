<div>
    <table class="table table-hover table-responsive">
        <thead>
            <tr>
                <th>ID</th>
                <th>Post Title</th>
                <th>Post Catagory ID</th>
                <th>Post Author</th>
                <th>Post Date</th>
                <th>Post Image</th>
                <th>Post Content</th>
                <th>Post Tags</th>
                <th>Post Comment Count</th>
                <th>Post Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $result_s = query_all_from_one_table('posts');
                while ($row = mysqli_fetch_assoc($result_s)){
                    $post_id = $row['post_id'];
                    $post_category_id = $row['post_category_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_tags = $row['post_tags'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_status = $row['post_status'];
                    $get_str = urlencode($post_title);
                    $get_img = urlencode($post_image);
                    echo "<tr>
                            <td>$post_id</td>
                            <td>$post_title</td>
                            <td>$post_category_id</td>
                            <td>$post_author</td>
                            <td>$post_date</td>
                            <td>
                                <img class='img-responsive' src='../images/$post_image' alt='$post_image'/>
                            </td>
                            <td>$post_content</td>
                            <td>$post_tags</td>
                            <td>$post_comment_count</td>
                            <td>$post_status</td>
                            <td>
                                <a href='posts.php?delete_id=$post_id&src=delete&post_title_del=$get_str&post_img=$get_img'>DELETE</a> <br/> 
                                <a href='posts.php?edit_id=$post_id&src=edit'>EDIT</a>
                            </td>
                        </tr>
                    ";
                }
            ?>
        </tbody>
    </table>
</div>
