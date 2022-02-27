<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="index.html">Posts</a>
    </li>
    <li class="active">
        <i class="fa fa-file"></i> View Posts
    </li>
</ol>
<?php delete_post(); ?>

<?php 
    if (isset($_GET['reset'])) {
        $post_id = $_GET['reset'];
        $updateResetCount = "UPDATE posts SET post_view_count = 0 WHERE post_id={$post_id}";
        $updateResetCount = mysqli_query($connection,$updateResetCount);
        if (!$updateResetCount) {
            die("Query Failed: ".mysqli_error($connection));
        }
    }

?>

<div>
    <div class="row">                            
        
        <?php 
        if (isset($_POST['checkBoxArray'])) {
            foreach ($_POST['checkBoxArray'] as $post_id_value) {
                $bulkOptions = $_POST['bulkOptions'];

                switch ($bulkOptions) {
                    case 'published':
                        $publishedQuery = "UPDATE posts SET post_status = '{$bulkOptions}' WHERE post_id = {$post_id_value}";
                        mysqli_query($connection,$publishedQuery); 
                        break;
                    case 'draft':
                        $draftQuery = "UPDATE posts SET post_status = '{$bulkOptions}' WHERE post_id = {$post_id_value}";
                        mysqli_query($connection,$draftQuery);
                        break;
                    case 'delete':
                        $deleteQuery = "DELETE FROM posts WHERE post_id ={$post_id_value}";
                        mysqli_query($connection,$deleteQuery);
                        break;
                    case 'clone':
                        $getClone = "select * from posts where post_id='$post_id_value'";
                        $getClone = mysqli_query($connection,$getClone);
                        while($getRow = mysqli_fetch_assoc($getClone))
                        {
                            $post_title = $getRow['post_title'];   
                            $post_author = $getRow['post_author'];   
                            $post_date = $getRow['post_date'];   
                            $post_content = $getRow['post_content'];   
                            $post_image = $getRow['post_image'];   
                            $post_category_id = $getRow['post_category_id'];   
                            $post_status = $getRow['post_status'];   
                            $post_tags = $getRow['post_tags'];   
                        }

                        $insertClone = "INSERT INTO posts (post_category_id,post_title,post_author,post_date,post_image,post_status,post_tags,post_content) VALUES ('$post_category_id','$post_title','$post_author','$post_date','$post_image','$post_status','$post_tags','$post_content')";
                        $insertClone = mysqli_query($connection,$insertClone);
                        if (!$insertClone) {
                            die("Query Failed:".mysqli_error($connection));
                        }
                        break;
                }
            }
        }

         ?>

        <div class="col-md-12">
            <form action="" method="post">

            <div class="col-md-4" style="margin-bottom: 10px;padding: 0px;margin-right: 5px;">
            <select name="bulkOptions" id="" class="form-control">
                <option value="">Select Status</option>
                <option value="published">Published</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
                <option value="clone">Clone</option>
            </select>
            </div>

            <button class="btn btn-info">Apply</button>
            <a href="posts.php?source=add_post" class="btn btn-warning">Add Now</a>

            <table class="table table-responsive table-hover">
                <tr>
                    <td><input type="checkbox" id="selectAllBoxes"></td>
                    <td>Id</td>
                    <td>Author</td>
                    <td>Title</td>
                    <td>Category</td>
                    <td>Status</td>
                    <td>Image</td>
                    <td>Tags</td>
                    <td>Comments</td>
                    <td>Date</td>
                    <td>Post</td>
                    <td>Edit</td>
                    <td>Delete</td>
                    <td>Post Views</td>
                </tr>
                    
                    <?php findAllPosts(); ?>
            </table>
            </form>
        </div>
    </div>
</div>

