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
                    $findAllPosts = "select * from posts";
                    $findAllPosts = mysqli_query($connection,$findAllPosts);
                    $count = mysqli_num_rows($findAllPosts);

                    $per_page = 2;
                    $count = ceil($count / $per_page);

                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    }
                    else
                    {
                        $page = "";
                    }

                    if ($page == 0 || $page == 1) {
                        $page_1 = 0;
                    }
                    else
                    {
                        $page_1 = ($page * $per_page) - $per_page;
                    }


                    $query = "select * from posts limit $page_1,$per_page";
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
                    <!-- <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li> -->
                    <?php 
                    for ($i=1; $i <= $count; $i++): ?>
                        <?php if ($page == $i): ?>
                        <li><a class="active_link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php else: ?>
                        <li><a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php endif ?>

                    <?php endfor; ?>
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
