<!-- header start -->
    <?php include('partials/header.php'); ?>
<!-- header end -->
<?php 
$session = session_id();
$time = time();
$time_out_in_seconds = 60;
$time_out = $time - $time_out_in_seconds;

$query = "select * from user_online where session = '$session'";
$query = mysqli_query($connection,$query);
$count = mysqli_num_rows($query);

if ($count == null) {
    $insertQuery = "INSERT INTO user_online (session,time) VALUES ('$session','$time')";
    mysqli_query($connection,$insertQuery);
}

?>

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
                            Welcome Admin
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>

                    </div>                    

                </div>
                <!-- /.row -->


                <!-- /.row -->
                
                <?php 
                $draftPostQuery = "select * from posts where post_status = 'draft'";
                $draftPostQuery = mysqli_query($connection,$draftPostQuery);
                $draftPostCount = mysqli_num_rows($draftPostQuery);

                $subsUserQuery = "select * from users where role = 'subscriber'";
                $subsUserQuery = mysqli_query($connection,$subsUserQuery);
                $subsUserCount = mysqli_num_rows($subsUserQuery);

                $unAppCommentQuery = "select * from comments where comment_status = 'unapprove'";
                $unAppCommentQuery = mysqli_query($connection,$unAppCommentQuery);
                $unAppCommentCount = mysqli_num_rows($unAppCommentQuery);

                $postPublishedQuery = "select * from posts where post_status = 'published'";
                $postPublishedQuery = mysqli_query($connection,$postPublishedQuery);
                $postPublishedCount = mysqli_num_rows($postPublishedQuery);

                 ?>

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                <?php  
                                $postQuery = "select * from posts";
                                $postQuery = mysqli_query($connection,$postQuery);
                                $postCount = mysqli_num_rows($postQuery);
                                ?>
                                  <div class='huge'><?php echo $postCount; ?></div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                     <?php  
                                        $commentQuery = "select * from comments";
                                        $commentQuery = mysqli_query($connection,$commentQuery);
                                        $commentCount = mysqli_num_rows($commentQuery);
                                      ?>
                                     <div class='huge'><?php echo $commentCount; ?></div>
                                      <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    <?php  
                                        $userQuery = "select * from users";
                                        $userQuery = mysqli_query($connection,$userQuery);
                                        $userCount = mysqli_num_rows($userQuery);
                                      ?>
                                    <div class='huge'><?php echo $userCount; ?></div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php  
                                            $categoryQuery = "select * from category";
                                            $categoryQuery = mysqli_query($connection,$categoryQuery);
                                            $categoryCount = mysqli_num_rows($categoryQuery);
                                          ?>
                                        <div class='huge'><?php echo $categoryCount; ?></div>
                                         <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                     <script type="text/javascript">
                          google.charts.load('current', {'packages':['bar']});
                          google.charts.setOnLoadCallback(drawChart);

                          function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                              ['Data', 'Count'],

                              <?php 

                              $ElementText = ['Posts','Published Posts','Pending Comments','Active Subscriber','Draft Post','Categories','Users','Comments'];
                              $ElementCount = [$postCount,$postPublishedCount,$unAppCommentCount,$subsUserCount,$draftPostCount,$categoryCount,$userCount,$commentCount];
                              for ($i=0; $i < 8; $i++) { 
                                  echo "['{$ElementText[$i]}'".','."{$ElementCount[$i]}],";
                              }


                              ?>
                            ]);

                            var options = {
                              chart: {
                                title: '',
                                subtitle: '',
                              }
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                          }
                        </script>

                    <div id="columnchart_material" style="width: 100%; height: 500px;"></div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<!-- footer start -->
    <?php include('partials/footer.php'); ?>
<!-- footer end -->