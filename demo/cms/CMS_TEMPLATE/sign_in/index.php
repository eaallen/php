<?php include("comp/header.php") ?>
<!-- Navigation -->
<?php include("comp/nav.php") ?>
<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <?php
                        if(isset($_GET['page'])){
                            switch($_GET['page']){
                                case 'sign_up':
                                    include("comp/forms/sign_up.php"); 
                                break;
                                default:
                                    include("comp/forms/sign_in.php"); 
                                break;
                            } 
    
                        }else{
                            include("comp/forms/sign_in.php"); 
                        }
                        
                    ?>
                </div>
                <div class="col-md-4"></div>

            </div>
        </div>

        <!-- /.row -->
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4">
                    <h3>Lorem Ipsum</h3>
                    <p class="text-left">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                        when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Lorem Ipsum</h3>
                    <p class="text-left">
                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                        The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here,
                        content here', making it look like readable English.
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Lorem Ipsum</h3>
                    <p class="text-left">
                        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin 
                        literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney 
                        College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage...
                    </p>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->


<!-- footer data -->
<?php include("comp/footer.php") ?>

