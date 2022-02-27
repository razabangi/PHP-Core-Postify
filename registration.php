<?php  include "partials/header.php"; ?>
 
    <!-- Page Content -->
    <div class="container">
    
        <?php 
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $user_email = $_POST['user_email'];
            $user_password = $_POST['user_password'];

            if (!empty($username) && !empty($user_email) && !empty($user_password)) {

            $username = mysqli_real_escape_string($connection,$username);
            $user_email = mysqli_real_escape_string($connection,$user_email);
            $user_password = mysqli_real_escape_string($connection,$user_password);
            $user_date = date("l jS \of F Y h:i:s A");

            $randSaltQuery  = "select randSalt from users";
            $randSaltQuery = mysqli_query($connection,$randSaltQuery);
            if (!$randSaltQuery) {
                echo die("Error:".mysqli_error($connection));
            }
            $row = mysqli_fetch_assoc($randSaltQuery);
            $salt = $row['randSalt'];
            $user_password = crypt($user_password,$salt);

            $query = "INSERT INTO users (username,user_email,user_password,role,user_date) VALUES ('$username','$user_email','$user_password','subscriber','$user_date')";

            $result = mysqli_query($connection,$query);  
            if (!$result) {
                die("Error:".mysqli_error($connection).' '. mysqli_errno($connection));
            }          
                $message = "Registration Has Been Created!";
        }
        else
        {
            $message = "Field Cant Be Empty!";
        }

    }
    else
    {
        $message = "";
    }

         ?>

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                        <?php if (isset($message)): ?>
                             <p class="bg-warning" style="padding: 5px;text-align: center;"><?php echo $message; ?></p>                            
                        <?php endif ?>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="user_email" id="user_email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="user_password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "partials/footer.php";?>
