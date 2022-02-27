<!-- header start -->
    <?php include('partials/header.php'); ?>
<!-- header end -->
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
           <!-- sidebar start -->
                <?php include('partials/sidebar.php'); ?>
           <!-- sidebar end -->
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper" style="height: 550px;">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome
                            <small>Admin Panel</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Category</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Add Category
                            </li>
                        </ol>

                        <div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div style="padding: 20px;">
                                    <form action="act_add_category.php" method="post">
                                        <label for="">Add Category</label>
                                        <input type="text" name="cat_title" placeholder="Add Category" class="form-control" style="margin-bottom: 10px;">
                                        <input type="submit" class="form-control btn btn-info" name="submit" value="Add Category">
                                    </form> 

                                    <form action="act_edit_category.php" method="post" style="margin-top: 20px;">
                                        <?php if (isset($_GET['edit'])): ?>
                                        <label for="">Edit Category</label>

                                        <?php 
                                        $cat_id = $_GET['edit'];
                                        $editQuery = "select * from category where cat_id={$cat_id}";
                                        $result = mysqli_query($connection,$editQuery);
                                        $row = mysqli_fetch_assoc($result);
                                        ?>
                                        <input type="hidden" name="cat_id" value="<?php echo $row['cat_id'] ?>">
                                        <input type="text" name="cat_title" value="<?php echo (isset($_GET['edit'])) ? $row['cat_title'] : null; ?>" placeholder="Add Category" class="form-control" style="margin-bottom: 10px;">
                                        <input type="submit" class="form-control btn btn-info" name="submit" value="Edit Category">
                                        <?php else: ?>    
                                        <?php endif; ?>
                                    </form> 

                                    </div>
                                </div>
                                 <?php 
                                 delete_category();
                                ?>
                                <div class="col-md-6">
                                    <table class="table table-responsive table-hover" style="height: 350px;overflow-x: hidden;overflow-y: scroll;white-space:nowrap;display: inline-block;max-width: auto;">
                                        <tr>
                                            <td>Id</td>
                                            <td>Title</td>
                                            <td>Edit</td>
                                            <td>Delete</td>
                                        </tr>
                                           <?php findAllCategories(); ?>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>                    

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<!-- footer start -->
    <?php include('partials/footer.php'); ?>
<!-- footer end -->