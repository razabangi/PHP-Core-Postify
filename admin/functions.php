<?php 

/**
 * 
 */


	function insert_categories()
	{
		// include('includes/db.php');
		global $connection;
		$cat_title = $_POST['cat_title'];
		$query = "insert into category (cat_title) values ('$cat_title')";
		$result = mysqli_query($connection,$query);
		if ($result)
		header('location:categories.php');
	}

	function insert_posts()
	{
		if (isset($_POST['submit'])) {
			global $connection;
			$post_category_id = $_POST['post_category_id'];
			$post_title = $_POST['post_title'];
			$post_author = $_POST['post_author'];
			$post_date = $_POST['post_date'];
			$post_content = $_POST['post_content'];
			$status = $_POST['post_status'];
			$post_tags = $_POST['post_tags'];

			if(isset($_FILES['post_image']))
			{
				$name = uniqid();
				$extension = pathinfo($_FILES['post_image']['name'], PATHINFO_EXTENSION);
				$fileName = $name.".".$extension;
				$hasFileUploaded = move_uploaded_file($_FILES['post_image']['tmp_name'], '../uploads/'.$fileName);
			}

			// move_uploaded_file($post_image_tmp, '../uploads/'.$post_image);


			// if ($_FILES['post_image']['error'] == 0) {
			// 	$fileName = unique_id().time();
			// 	$fileExtension = pathinfo($_FILES['post_image']['file_name'],PATH_EXTENSION);
			// }

			$query = "INSERT into posts (post_category_id,post_title,post_author,post_date,post_image,post_content,post_status,post_tags) VALUES ('$post_category_id','$post_title','$post_author','$post_date','$fileName','$post_content','$status','$post_tags')";
			$result = mysqli_query($connection,$query);

			if ($result){
				header('Location:posts.php');
			}
		}

		
	}

	function insert_users()
	{
		if (isset($_POST['submit'])) {
			global $connection;
			$user_first_name = $_POST['user_first_name'];
			$user_lastname = $_POST['user_lastname'];
			$username = $_POST['username'];
			$user_email = $_POST['user_email'];
			$user_password = $_POST['user_password'];
			$role = $_POST['role'];

			$query = "INSERT into users (user_first_name,user_lastname,username,user_email,user_password,role) VALUES ('$user_first_name',$user_lastname','$username','$user_email','$user_password','$role')";
			$result = mysqli_query($connection,$query);

			if ($result)
				header('Location:users.php');
		}

	}

	function findAllCategories()
	{
		global $connection;
        $query = "select * from category";
        $query = mysqli_query($connection,$query);
        while ($row = mysqli_fetch_assoc($query)) : ?>
    <tr>
       
        <td><?php echo $row['cat_id']; ?></td>
        <td><?php echo $row['cat_title']; ?></td>
        <td><a href="categories.php?edit=<?php echo $row['cat_id']; ?>">Edit</a></td>
        <td><a href="categories.php?delete=<?php echo $row['cat_id']; ?>">Delete</a></td>
    </tr>
        <?php  endwhile; 
                                            
	}

	// function get_categories()
	// {
	// 	global $connection;
 //        $query = "select * from category";
 //        $query = mysqli_query($connection,$query);
 //        while ($row = mysqli_fetch_assoc($query)) {
 //        	return $row;
 //        }
        
	// }

	function get_category($id)
	{
		global $connection;
		$query = "select * from category where cat_id = {$id}";
		$query = mysqli_query($connection,$query);
		$query = mysqli_fetch_assoc($query);
		return $query;
	}

	function delete_category()
	{
		global $connection;
		if (isset($_GET['delete'])) {
		     $cat_id = $_GET['delete'];
		    $deleted_query = "delete from category where cat_id='$cat_id'";
		    $result = mysqli_query($connection,$deleted_query);
		 }
	}


	function findAllPosts()
	{
		global $connection;
        $query = "select * from posts";
        $query = mysqli_query($connection,$query);
        while ($row = mysqli_fetch_assoc($query)) : ?>
    <tr>
       	<td><input type="checkbox" class="checkBoxes" name="checkBoxArray[]" value="<?php echo $row['post_id']; ?>"></td>
        <td><?php echo $row['post_id']; ?></td>
        <td><?php echo $row['post_author']; ?></td>
        <td><?php echo $row['post_title']; ?></td>
        <td><?php  
        $cat_id = $row['post_category_id']; 
        $categoryQuery = "select * from category where cat_id={$cat_id}";
        $categoryQuery = mysqli_query($connection,$categoryQuery);
        $categoryQuery = mysqli_fetch_assoc($categoryQuery); 
        echo $categoryQuery['cat_title'];
        ?></td>
        <td><?php echo $row['post_status']; ?></td>
        <td><img src="../uploads/<?php echo $row['post_image']; ?>" height="100" width="100" class="img img-thumnail"></td>
        <td><?php echo $row['post_tags']; ?></td>
        <td><?php echo $row['post_comment_count']; ?></td>
        <td><?php echo $row['post_date']; ?></td>
        <td><a href="../post.php?p_id=<?php echo $row['post_id']; ?>">View Post</a></td>
        <td><a href="posts.php?source=edit_post&p_id=<?php echo $row['post_id']; ?>">Edit</a></td>
        <td><a href="posts.php?delete=<?php echo $row['post_id']; ?>">Delete</a></td>
        <td><a href="posts.php?reset=<?php echo $row['post_id']; ?>"><?php echo $row['post_view_count']; ?></a></td>
    </tr>
        <?php  endwhile; 
	}

	function findAllUsers()
	{
		global $connection;
        $query = "select * from users";
        $query = mysqli_query($connection,$query);
        while ($row = mysqli_fetch_assoc($query)) : ?>
    <tr>
       
        <td><?php echo $row['user_id']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['user_first_name']; ?></td>
        <td><?php echo $row['user_lastname']; ?></td>
        <td><?php echo $row['user_email'];
        ?></td>
        <td><?php echo $row['role']; ?></td>
        <td><?php echo $row['user_date']; ?></td>
        <td><a href="users.php?change_to_admin=<?php echo $row['user_id']; ?>">Admin</a></td>
        <td><a href="users.php?change_to_subscriber=<?php echo $row['user_id']; ?>">Subscriber</a></td>
        <td><a href="users.php?source=edit_user&edit=<?php echo $row['user_id']; ?>">Edit</a></td>
        <td><a onclick="return confirm('Are you sure you wanna delete it?');" href="users.php?delete=<?php echo $row['user_id']; ?>">Delete</a></td>
    </tr>
        <?php  endwhile;
	}

    function findAllComments()
	{
		global $connection;
        $query = "select * from comments";
        $query = mysqli_query($connection,$query);
        while ($row = mysqli_fetch_assoc($query)) : ?>
    <tr>
       
        <td><?php echo $row['comment_id']; ?></td>
        <td><?php echo $row['comment_post_id']; ?></td>
        <td><?php echo $row['comment_author']; ?></td>
        <td><?php echo $row['comment_email'];
        ?></td>
        <td><?php echo $row['comment_content']; ?></td>
        <td><?php echo $row['comment_status']; ?></td>
        <td><?php 
        $comment_post_id = $row['comment_post_id'];
        $queryWRTPost = "select * from posts where post_id = {$comment_post_id}";
        $queryWRTPost = mysqli_query($connection,$queryWRTPost);
        $queryWRTPost = mysqli_fetch_assoc($queryWRTPost); 
        $post_id = $queryWRTPost['post_id'];
        $post_title = $queryWRTPost['post_title'];
        echo "<a href='../post.php?p_id=$post_id'>$post_title</a>";
        ?></td>
        <td><?php echo $row['comment_date']; ?></td>
        <td><a href="comments.php?approve=<?php echo $row['comment_id']; ?>">Approve</a></td>
        <td><a href="comments.php?unapprove=<?php echo $row['comment_id']; ?>">Un Approve</a></td>
        <td><a href="comments.php?delete=<?php echo $row['comment_id']; ?>">Delete</a></td>
    </tr>
        <?php  endwhile; 
	}

	function update_posts()
	{

		if (isset($_POST['submit'])) {
			global $connection;
			$post_id = $_POST['post_id'];
			$post_category_id = $_POST['post_category_id'];
			$post_title = $_POST['post_title'];
			$post_author = $_POST['post_author'];
			$post_date = $_POST['post_date'];
			$post_content = $_POST['post_content'];
			$post_tags = $_POST['post_tags'];
			$image_url = $_POST['image_url'];
			$fileName = $image_url;

			if ($_FILES['post_image']['error'] == 0) {
				$name = uniqid();
				$extension = pathinfo($_FILES['post_image']['name'], PATHINFO_EXTENSION);
				$fileName = $name.".".$extension;
				$hasFileUploaded = move_uploaded_file($_FILES['post_image']['tmp_name'], '../uploads/'.$fileName);
			}


		$query = "UPDATE posts SET post_category_id='$post_category_id',post_title='$post_title',post_author='$post_author',post_date='$post_date',post_image='$fileName',post_content='$post_content',post_tags='$post_tags' WHERE post_id='$post_id'";
		$result = mysqli_query($connection,$query);

		if ($result) {
			if($hasFileUploaded)
				unlink('../uploads/'.$image_url);

			header('Location:posts.php');
		}

		}

	}

	function update_users()
	{
		global $connection;
		if (isset($_POST['submit'])) {
			// global $connection;
			$user_id = $_POST['user_id'];			
			$user_first_name = $_POST['user_first_name'];
			$user_lastname = $_POST['user_lastname'];
			$username = $_POST['username'];
			$user_email = $_POST['user_email'];
			$user_password = $_POST['user_password'];
			$user_date = date("l jS \of F Y h:i:s A");

			$randSaltQuery  = "select randSalt from users";
            $randSaltQuery = mysqli_query($connection,$randSaltQuery);
            if (!$randSaltQuery) {
                echo die("Error:".mysqli_error($connection));
            }
            $row = mysqli_fetch_assoc($randSaltQuery);
            $salt = $row['randSalt'];
            $user_password = crypt($user_password,$salt);


		$query = "UPDATE users SET user_first_name='$user_first_name',user_lastname='$user_lastname',username='$username',user_email='$user_email',user_password='$user_password',user_date='$user_date' WHERE user_id='$user_id'";
		$result = mysqli_query($connection,$query);

		if ($result) {
			header('Location:users.php');
		}

		}
	}

	function delete_post()
	{
		global $connection;
		if (isset($_GET['delete'])) {
		     $post_id = $_GET['delete'];
		    $deleted_query = "delete from posts where post_id='$post_id'";
		    $result = mysqli_query($connection,$deleted_query);
		 }
	}

	function delete_user()
	{
		global $connection;
		if (isset($_GET['delete'])) {
		     $user_id = $_GET['delete'];
		    $deleted_query = "delete from users where user_id='$user_id'";
		    $result = mysqli_query($connection,$deleted_query);
		 }
	}

	function delete_comment()
	{
		global $connection;
		if (isset($_GET['delete'])) {
		    $comment_id = $_GET['delete'];
		    $deleted_query = "delete from comments where comment_id='$comment_id'";
		    $result = mysqli_query($connection,$deleted_query);
		 }
	}

	function approve_comment()
	{
		global $connection;
		if (isset($_GET['approve'])) {
		    $comment_id = $_GET['approve'];
		    $deleted_query = "UPDATE comments SET comment_status = 'approve' WHERE comment_id={$comment_id} ";
		    $result = mysqli_query($connection,$deleted_query);
		 }
	}

	function unapprove_comment()
	{
		global $connection;
		if (isset($_GET['unapprove'])) {
		    $comment_id = $_GET['unapprove'];
		    $deleted_query = "UPDATE comments SET comment_status = 'unapprove' WHERE comment_id={$comment_id} ";
		    $result = mysqli_query($connection,$deleted_query);
		 }
	}

	function change_to_admin()
	{
		global $connection;
		if (isset($_GET['change_to_admin'])) {
		    $user_id = $_GET['change_to_admin'];
		    $deleted_query = "UPDATE users SET role = 'admin' WHERE user_id={$user_id} ";
		    $result = mysqli_query($connection,$deleted_query);
		 }
	}

	function change_to_subscriber()
	{
		global $connection;
		if (isset($_GET['change_to_subscriber'])) {
		    $user_id = $_GET['change_to_subscriber'];
		    $deleted_query = "UPDATE users SET role = 'subscriber' WHERE user_id={$user_id} ";
		    $result = mysqli_query($connection,$deleted_query);
		 }
	}










 ?>