<!-- header start -->
    <?php include('partials/header.php'); ?>
<!-- header end -->
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
           <!-- sidebar start -->
                <?php include('partials/sidebar.php'); ?>
           <!-- sidebar end -->
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome
                            <small><?php echo strtoupper($_SESSION['username']); ?></small>
                        </h1>
                        
                        <ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="index.html">Profile</a>
    </li>
    <li class="active">
        <i class="fa fa-file"></i> Edit Profile
    </li>
</ol>

<div class="row">
        <div class="col-md-6">
            
            <?php 
                $username = $_SESSION['username'];
                $query = "SELECT * from users where username = '$username'";
                $query = mysqli_query($connection,$query);
                while($user = mysqli_fetch_assoc($query))
                {
                    $user_id = $user['user_id'];
                    $username = $user['username'];
                    $user_first_name = $user['user_first_name'];
                    $user_lastname = $user['user_lastname'];
                    $user_email = $user['user_email'];
                    $user_password = $user['user_password'];
                }
            ?>

            
            <form action="act_edit_user.php" enctype="multipart/form-data" method="post">

                <label for="">First Name</label>
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <input type="text" name="user_first_name" value="<?php echo $user_first_name; ?>" placeholder="First Name" class="form-control" style="margin-bottom: 10px;">

                <label for="">Last Name</label>
                <input type="text" name="user_lastname" value="<?php echo $user_lastname; ?>" placeholder="Last Name" class="form-control" style="margin-bottom: 10px;">

                <label for="">User Name</label>
                <input type="text" name="username" placeholder="User Name" value="<?php echo $username; ?>" class="form-control" style="margin-bottom: 10px;">

                <label for="">Email Address</label>
                <input type="email" name="user_email" value="<?php echo $user_email; ?>" placeholder="Email Address" class="form-control" style="margin-bottom: 10px;">

                <label for="">Password</label>
                <input type="password" name="user_password" placeholder="Password" value="<?php echo $user_password; ?>" class="form-control" style="margin-bottom: 10px;">

                <input style="margin-top: 10px;" type="submit" class="form-control btn btn-info" name="submit" value="Edit Profile">
          </div>

            </form> 
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