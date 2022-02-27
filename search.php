<!-- header start -->
    <?php include('partials/header.php'); ?>
<!-- header end -->

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <?php

                if (isset($_POST['submit'])) {
                    $search = $_POST['search'];
                    $searchQuery = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                    $searchQuery = mysqli_query($connection,$searchQuery);


                    if (!$searchQuery) {
                        die('Query Failed:'. mysqli_error($connection));
                    }

                    $count = mysqli_num_rows($searchQuery);

                    if ($count == 0) {
                        echo "No result found";
                    }
                    else
                    {
                        while ($post = mysqli_fetch_assoc($searchQuery)): ?>                    
                        <h2>
                            <a href="#"><?php echo $post['post_title']; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post['post_author']; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post['post_date']; ?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post['post_image']; ?>" alt="">
                        <hr>
                        <p><?php echo $post['post_content']; ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>                

                        <hr>
                        <?php endwhile;
                    }
                }
                
                ?>

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->

            <!-- sidebar start -->
                <?php include('partials/sidebar.php'); ?>
            <!-- sidebar end -->

        </div>
        <!-- /.row -->

        <hr>

<!-- footer start -->
    <?php include('partials/footer.php'); ?>
<!-- footer end -->
