<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="index.html">Posts</a>
    </li>
    <li class="active">
        <i class="fa fa-file"></i> Edit Post
    </li>
</ol>

<div class="row">
        <div class="col-md-6">
            <?php 
            $post_id = $_GET['p_id'];
            $query = "select * from posts where post_id={$post_id}";
            $query = mysqli_query($connection,$query);
            $post = mysqli_fetch_assoc($query);
             ?>
            <form action="act_edit_post.php" enctype="multipart/form-data" method="post">
                <label for="">Edit Category</label>
                <select name="post_category_id" id="post_category_id" class="form-control">
                	<?php 
                		$query = "select * from category";
				        $query = mysqli_query($connection,$query);
				        while ($row = mysqli_fetch_assoc($query)): ?>
				        		<option value="<?php echo $row['cat_id']; ?>" <?php ($post['post_category_id'] == $row['cat_id']) ? 'selected' : null; ?>><?php echo $row['cat_title']; ?></option>
				        <?php endwhile;
                	 ?>
                </select>
                <input type="hidden" name="post_id" value="<?php echo $post['post_id']; ?>">
                <label for="">Add Title</label>
                <input type="text" name="post_title" value="<?php echo $post['post_title']; ?>" placeholder="Title" class="form-control" style="margin-bottom: 10px;">

                <label for="">Add Author</label>
                <input type="text" name="post_author" value="<?php echo $post['post_author']; ?>" placeholder="Author" class="form-control" style="margin-bottom: 10px;">

                <label for="">Add Date</label>
                <input type="date" name="post_date" placeholder="Date" value="<?php echo $post['post_date']; ?>" class="form-control" style="margin-bottom: 10px;">

                <label for="">Select Status</label>                
                <select name="post_status" class="form-control">
                    <option value="published" <?php echo ($post['post_status'] == 'published') ? 'selected' : null; ?>>Published</option>
                    <option value="draft" <?php echo ($post['post_status'] == 'draft') ? 'selected' : null; ?>>Draft</option>
                </select>
          </div>

          	<div class="col-md-6">
                <label for="">Add Image</label>
                <input type="hidden" name="image_url" value="<?php echo $post['post_image']; ?>">
                <input type="file" name="post_image" placeholder="Image" class="form-control" style="margin-bottom: 10px;">

                <label for="">Add Description</label>
                <textarea name="post_content" placeholder="Add Description" class="form-control" style="margin-bottom: 10px;"><?php echo $post['post_content'] ?></textarea>

                <label for="">Add Tags</label>
                <input type="text" name="post_tags" value="<?php echo $post['post_tags']; ?>" placeholder="Add Tags" class="form-control" style="margin-bottom: 10px;">


                <input type="submit" class="form-control btn btn-info" name="submit" value="Edit Post">
            </form> 
            </div>

          
        </div>
</div>