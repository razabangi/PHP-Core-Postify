<!-- header start -->
    <?php include('partials/header.php'); ?>
<!-- header end -->

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Postify
                    <small>Find Your Favourite One!</small>
                </h1>

                <!-- First Blog Post -->
                <?php
                    $query = "select * from posts";
                    $posts = mysqli_query($connection,$query);
                ?>
                <?php while ($post = mysqli_fetch_assoc($posts)): ?> 

                <?php if ($post['post_status'] == 'published'): ?>                 
                <h2>
                    <a href="post.php?p_id=<?php echo $post['post_id']; ?>"><?php echo $post['post_title']; ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_posts.php?author=<?php echo $post['post_author']; ?>"><?php echo $post['post_author']; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post['post_date']; ?></p>
                <hr>
                <img class="img-responsive" width='250' height='250' src="../uploads/<?php echo $post['post_image']; ?>" alt="">
                <hr>
                <p><?php echo substr($post['post_content'],0,150).'...'; ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post['post_id']; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>                

                <hr>
                <?php endif ?>  

                <?php endwhile; ?>

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
