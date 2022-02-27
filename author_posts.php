<!-- header start -->
    <?php include('partials/header.php'); ?>
<!-- header end -->

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <?php if (isset($_GET['author'])): ?>
                <?php 
                // $post_id = $_GET['p_id']; 
                $author = $_GET['author'];                 
                ?>
            <?php endif ?>

            

            <!-- Blog Post Content Column -->
            <div class="col-md-8">

                <?php 
            $query = "select * from posts where post_author='$author'";
                $query = mysqli_query($connection,$query);
                while($post = mysqli_fetch_assoc($query)):
                    $post_id = $post['post_id'];
                    $post_author = $post['post_author'];
                    $post_date = $post['post_date'];
                    $post_image = $post['post_image'];
                    $post_content = $post['post_content'];
                    $post_title = $post['post_title'];
            ?>

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $post_title; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="#"><?php echo $post_author; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="<?php echo 'uploads/'.$post_image; ?>" alt="" width="400" height="400">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $post_content; ?></p>

                <hr>           

            <?php endwhile; ?>
            </div>


                <?php include('partials/sidebar.php'); ?>
            <!-- Blog Sidebar Widgets Column -->
            <!-- sidebar start -->
            <!-- sidebar end -->

        </div>
        <!-- /.row -->
</div>
        <hr>

        <!-- Footer -->
        <!-- start footer -->
            <?php include('partials/footer.php'); ?>
        <!-- footer end -->