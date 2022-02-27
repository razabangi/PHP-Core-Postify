<div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="/admin"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="posts.php?source=add_post">Create Post</a>
                    </li>
                    <li>
                        <a href="posts.php">View Post</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="categories.php"><i class="fa fa-fw fa-bar-chart-o"></i> Categories</a>
            </li>
            <li>
                <a href="comments.php"><i class="fa fa-fw fa-table"></i> Comments</a>
            </li>
            <?php if ($_SESSION['role'] == 'admin'): ?>         
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#user"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="user" class="collapse">
                    <li>
                        <a href="users.php?source=add_user">Create User</a>
                    </li>
                    <li>
                        <a href="users.php">View User</a>
                    </li>
                </ul>
            </li>
            <?php endif ?>
            <li>
                <a href="profile.php"><i class="fa fa-fw fa-desktop"></i> Profile</a>
            </li>
        </ul>
    </div>