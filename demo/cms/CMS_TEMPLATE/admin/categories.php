<?php include("comp/header.php") ?>
<?php
    if(isset($_POST['submit'])){
        header("Location: categories.php");
        $title = $_POST['cate_title'];
        if(empty($title)){
            echo "<font color='red'>error</font>";
        }else{
            $arr = ['category_title'=> $title];
            $check = any_create_one_at_a_time("category", $arr);
            if(!$check){
                echo "<font color='red'> Connection Error </font>";
            }
        }
    }
    if(isset($_GET['delete_id'])){
        header("Location: categories.php");
        $id = $_GET['delete_id'];
        $check = any_delete('category', 'category_id',$id);
        if(!$check){
            echo "<font color='red'> Connection Error </font>";
        }
    }
    if(isset($_POST['edit'])){
        header("Location: categories.php");
        $title = $_POST['cate_edit'];
        
        if(empty($title)){
            echo "<font color='red'>error</font>";
        }else{
            $data_arr = [
            'category_title' => $title
            ];

            $id_arr = ['category_id',$_GET['edit_id']];

            $check = any_update_one('category', $data_arr ,$id_arr);
            
            if(!$check){
                echo "<font color='red'> Connection Error </font>";
            }
        }
    }
    
?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include("comp/nav.php") ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Catagories
                            <small>Create, Edit, or Delete</small>
                        </h1>
                    </div>
                    <div class='col-md-6'>
                            <?php
                                if(isset($_GET['edit_id'])){
                                    $val = $_GET['edit_title'];
                                    echo "
                                        <form action='' method='post'>
                                            <div class='form-group'>
                                                <label for='cate_edit'>Edit a Category Title</label>
                                                <input id='cate_edit' name='cate_edit' type='text' class='form-control' value='$val'/>
                                            </div>
                                            <div class='form-group'>
                                                <input type='submit' name='edit' class='btn btn-primary' value='edit'/>
                                                <a href='categories.php'> cancle </a>
                                            </div>
                                        </form>
                                    ";
                                }else{
                                    echo "
                                        <form action='' method='post'>
                                            <div class='form-group'>
                                                <label for='cate_title'>Create a Category Title</label>
                                                <input id='cate_title' name='cate_title' type='text' class='form-control'/>
                    
                                            </div>
                                            <div class='form-group'>
                                                <input type='submit' name='submit' class='btn btn-primary' value='Save' />
                                            </div>
                                        </form>
                                    ";
                                }
                            ?>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Title</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $result_s = query_all_from_one_table('category');
                                while ($row = mysqli_fetch_assoc($result_s)){
                                    $cate_id = $row['category_id'];
                                    $cate_title = $row['category_title'];
                                    echo "<tr>
                                            <td>$cate_id</td>
                                            <td>$cate_title</td>
                                            <td> <a href='categories.php?delete_id=$cate_id'>DELETE</a></td>
                                            <td> <a href='categories.php?edit_id=$cate_id&edit_title=$cate_title'>EDIT</a></td>
                                          </tr>";
                                }
                            ?>
                            </tbody>
                        </table>
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

