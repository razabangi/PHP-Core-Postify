<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="index.html">Posts</a>
    </li>
    <li class="active">
        <i class="fa fa-file"></i> View Posts
    </li>
</ol>
<?php delete_comment(); ?>
<?php approve_comment(); ?>
<?php unapprove_comment(); ?>
<div>
    <div class="row">                            
        
        <div class="col-md-12">
            <table class="table table-responsive table-hover">
                <tr>
                    <td>Id</td>
                    <td>Comment Post Id</td>
                    <td>Comment Author</td>
                    <td>Comment Email</td>
                    <td>Comment Content</td>
                    <td>Comment Status</td>
                    <td>In Response to</td>
                    <td>Comment Date</td>
                    <td>Approve</td>
                    <td>Un Approve</td>
                    <td>Delete</td>
                </tr>
                    
                    <?php findAllComments(); ?>
            </table>
        </div>
    </div>
</div>