<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="index.html">Posts</a>
    </li>
    <li class="active">
        <i class="fa fa-file"></i> Add Post
    </li>
</ol>

<div class="row">
        <div class="col-md-6">
            
            <form action="act_add_post.php" enctype="multipart/form-data" method="post">
                <label for="">Add Category</label>
                <select name="post_category_id" id="post_category_id" class="form-control">
                    <option value="">Select Category</option>
                	<?php 
                		$query = "select * from category";
				        $query = mysqli_query($connection,$query);                        
				        while ($row = mysqli_fetch_assoc($query)): ?>
				        		<option value="<?php echo $row['cat_id']; ?>"><?php echo $row['cat_title']; ?></option>
				        <?php endwhile;
                	 ?>
                </select>

                <label for="">Add Title</label>
                <input type="text" name="post_title" placeholder="Title" class="form-control" style="margin-bottom: 10px;">

                <label for="">Add Author</label>
                <input type="text" name="post_author" placeholder="Author" class="form-control" style="margin-bottom: 10px;">

                <label for="">Add Date</label>
                <input type="date" name="post_date" placeholder="Date" class="form-control" style="margin-bottom: 10px;">

                <label for="">Select Status</label>                
                <select name="post_status" class="form-control">
                    <option value="published">Published</option>
                    <option value="draft">Draft</option>
                </select>
          </div>

          	<div class="col-md-6">
                <label for="">Add Image</label>                
                <input type="file" name="post_image" placeholder="Image" class="form-control" style="margin-bottom: 10px;">

                <label for="">Add Description</label>
                <textarea name="post_content" placeholder="Add Description" class="form-control" style="margin-bottom: 10px;"></textarea>

                <label for="">Add Tags</label>
                <input type="text" name="post_tags" placeholder="Add Tags" class="form-control" style="margin-bottom: 10px;">


                <input type="submit" class="form-control btn btn-info" name="submit" value="Add Post">
            </form> 
            </div>

          
        </div>
</div>