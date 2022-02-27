<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="index.html">Users</a>
    </li>
    <li class="active">
        <i class="fa fa-file"></i> Edit User
    </li>
</ol>

<div class="row">
        <div class="col-md-6">
            
            <?php 
            if (isset($_GET['edit'])) {
                $user_id = $_GET['edit'];
                $query = "select * from users where user_id = {$user_id}";
                $query = mysqli_query($connection,$query);
                $user = mysqli_fetch_assoc($query);
            }

            ?>

            
            <form action="act_edit_user.php" enctype="multipart/form-data" method="post">

                <label for="">First Name</label>
                <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                <input type="text" name="user_first_name" value="<?php echo $user['user_first_name']; ?>" placeholder="First Name" class="form-control" style="margin-bottom: 10px;">

                <label for="">Last Name</label>
                <input type="text" name="user_lastname" value="<?php echo $user['user_lastname']; ?>" placeholder="Last Name" class="form-control" style="margin-bottom: 10px;">

                <label for="">User Name</label>
                <input type="text" name="username" placeholder="User Name" value="<?php echo $user['username']; ?>" class="form-control" style="margin-bottom: 10px;">

                <label for="">Email Address</label>
                <input type="email" name="user_email" value="<?php echo $user['user_email']; ?>" placeholder="Email Address" class="form-control" style="margin-bottom: 10px;">

                <label for="">Password</label>
                <input type="password" name="user_password" placeholder="Password" value="<?php echo $user['user_password']; ?>" class="form-control" style="margin-bottom: 10px;">

                <input style="margin-top: 10px;" type="submit" class="form-control btn btn-info" name="submit" value="Add User">
          </div>

            </form> 
            </div>

          
        </div>
</div>