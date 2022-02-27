<!-- header start -->
    <?php include('partials/header.php'); ?>
<!-- header end -->

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">                

                <h1 class="page-header">
                    All Posts
                    <small>Blogerify</small>
                </h1>

                <!-- First Blog Post -->   
                <?php if (isset($_GET['cat_id'])): ?>
                    <?php 
                    $cat_id = $_GET['cat_id']; 
                    $query = "select * from posts where post_category_id={$cat_id}";
                    $query = mysqli_query($connection,$query);    
                    $queryNumRows = mysqli_num_rows($query);        
                if ($queryNumRows == 0){
                     echo "<h1 style='background:orange;font-weight:bold;padding:15px;border-radius:5px;text-align:center;'>No Post Found!</h1>"; 
                }
                else {     
                    while($post = mysqli_fetch_assoc($query)) : ?>
                <h2>
                    <a href="post.php?p_id=<?php echo $post['post_id']; ?>"><?php echo $post['post_title']; ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_posts?author=<?php echo $post['post_author'] ?>&p_id=<?php echo $post['post_id']; ?>"><?php echo $post['post_author']; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post['post_date']; ?></p>
                <hr>
                <img class="img-responsive" src="assets/images/<?php echo $post['post_image']; ?>" alt="">
                <hr>
                <p><?php echo substr($post['post_content'],0,150).'...'; ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post['post_id']; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>            

                <hr>                
               <?php endwhile; } ?>

                <?php endif ?>  

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
