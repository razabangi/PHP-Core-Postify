<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="index.html">Users</a>
    </li>
    <li class="active">
        <i class="fa fa-file"></i> Add User
    </li>
</ol>

<div class="row">
        <div class="col-md-6">
            
            <form action="act_add_user.php" enctype="multipart/form-data" method="post">

                <label for="">First Name</label>
                <input type="text" name="user_first_name" placeholder="First Name" class="form-control" style="margin-bottom: 10px;">

                <label for="">Last Name</label>
                <input type="text" name="user_lastname" placeholder="Last Name" class="form-control" style="margin-bottom: 10px;">

                <label for="">User Name</label>
                <input type="text" name="username" placeholder="User Name" class="form-control" style="margin-bottom: 10px;">

                <label for="">Email Address</label>
                <input type="email" name="user_email" placeholder="Email Address" class="form-control" style="margin-bottom: 10px;">

                <label for="">Password</label>
                <input type="password" name="user_password" placeholder="Password" class="form-control" style="margin-bottom: 10px;">
          </div>

          	<div class="col-md-6">
                <label for="">Add Role</label>
                <select class="form-control" name="role">
                    <option value="">Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="subscriber">Subscriber</option>
                </select>          
                <input style="margin-top: 10px;" type="submit" class="form-control btn btn-info" name="submit" value="Add User">
            </div>

            </form> 
            </div>

          
        </div>
</div>