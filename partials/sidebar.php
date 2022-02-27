  <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" name="submit" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>


                <!-- Blog Login Well -->
                <div class="well">
                    <h4>Blog Login</h4>
                    <form action="auth/login.php" method="post">
                        <input type="text" name="username" class="form-control">
                    <div class="input-group" style="margin-top: 10px;">
                        <input type="password" name="password" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" name="login" type="submit">
                                Submit
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <?php 
                                $query = "select * from category limit 4";
                                $query = mysqli_query($connection,$query);
                                while ($row = mysqli_fetch_assoc($query)) : ?>
                                    <li><a href="<?php echo 'category.php?cat_id='.$row['cat_id'] ?>"><?php echo $row['cat_title']; ?></a>
                                <?php endwhile;

                                 ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- widget start -->
                    <?php include('widget.php'); ?>
                <!-- widget end -->

            </div>