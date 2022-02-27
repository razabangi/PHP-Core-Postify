<!-- header start -->
    <?php include('partials/header.php'); ?>
<!-- header end -->

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <?php if (isset($_GET['p_id'])): ?>
                <?php 
                $post_id = $_GET['p_id']; 
                $query = "select * from posts where post_id={$post_id}";
                $query = mysqli_query($connection,$query);
                $post = mysqli_fetch_assoc($query);
                @$post_view_count = $post['post_view_count'] + 1;

                $postView = "UPDATE posts SET post_view_count={$post_view_count} WHERE post_id=$post_id";
                $postView = mysqli_query($connection,$postView);
                if (!$postView) {
                    die('Query Failed:'.mysqli_error($connection));
                }

                ?>
            <?php endif ?>

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $post['post_title']; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $post['post_author']; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post['post_date']; ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="<?php echo 'uploads/'.$post['post_image']; ?>" alt="" width="400" height="400">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $post['post_content']; ?></p>

                <hr>

                <!-- Blog Comments -->

                <?php 
                if (isset($_POST['submit'])) {
                    $post_id = $_GET['p_id'];
                    $author_name = $_POST['author_name'];
                    $author_email = $_POST['author_email'];
                    $author_content = $_POST['author_content'];
                    $post_id = $post['post_id'];
                    $comment_date = date("l jS \of F Y h:i:s A");
                    @$post_comment_count = @$post_comment_count + 1;

                    if (!empty($author_name) && !empty($author_email) && !empty($author_content)) {
                        $queryComment = "INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) VALUES ({$post_id},'{$author_name}','{$author_email}','{$author_content}','unapprove','{$comment_date}')";
                        $result = mysqli_query($connection,$queryComment);                    

                        if ($result) {
                            $postCommentCountQuery = "UPDATE posts SET post_comment_count = $post_comment_count WHERE post_id = '$post_id' ";
                        $updateCount = mysqli_query($connection,$postCommentCountQuery);
                            echo "<div>Your Comment Has Been Send!</div>";
                        }                         
                    }
                    else
                    {
                        echo "<script>alert('Field Can't Be Empty!')</script>";
                    } 

                    // else
                    // {
                    //     die('Error:'.mysqli_error($connection));
                    // }
                }


                ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form method="post" action="" role="form">
                        <div class="form-group">
                            <label>Author Name:</label>
                            <input type="text" name="author_name" class="form-control">
                            <label>Author Email:</label>
                            <input type="email" name="author_email" class="form-control">
                            <label>Your Comment:</label>
                            <textarea class="form-control" rows="3" name="author_content"></textarea>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <?php
                $queryDisplayComment = "SELECT * from comments where comment_post_id='$post_id' AND comment_status ='approve' order by comment_id DESC";
                $queryDisplayComment = mysqli_query($connection,$queryDisplayComment);
                if (!$queryDisplayComment) {
                    die('Error:'.mysqli_error($connection));
                }
                while($comment = mysqli_fetch_array($queryDisplayComment)):
                ?>

                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment['comment_author']; ?>
                            <small><?php echo $comment['comment_date']; ?></small>
                        </h4>
                        <?php echo $comment['comment_content']; ?>
                    </div>
                </div>

                <?php endwhile; ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <!-- sidebar start -->
                <?php include('partials/sidebar.php'); ?>
            <!-- sidebar end -->

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <!-- start footer -->
            <?php include('partials/footer.php'); ?>
        <!-- footer end -->