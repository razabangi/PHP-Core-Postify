<!-- header start -->
    <?php include('partials/header.php'); ?>
<!-- header end -->
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
           <!-- sidebar start -->
                <?php include('partials/sidebar.php'); ?>
           <!-- sidebar end -->
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper" style="height: 800px;overflow-x: scroll;">

            <div class="container-fluid">


                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome
                            <small>Admin Panel</small>
                        </h1>
                    
                        <?php 
                        if (isset($_GET['source'])) {
                            $source = $_GET['source'];
                        }
                        else
                        {
                            $source = '';
                        }

                        switch ($source) {
                            case 'add_user':
                                include('add_user.php');
                            break;

                            case 'edit_user':
                                include('edit_user.php');  
                                break;                              
                            
                            default:
                                include('view_all_users.php');
                            break;
                        }


                         ?>


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