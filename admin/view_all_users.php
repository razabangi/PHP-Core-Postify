<ol class="breadcrumb">
    <li>
        <i class="fa fa-dashboard"></i>  <a href="index.html">Users</a>
    </li>
    <li class="active">
        <i class="fa fa-file"></i> View Users
    </li>
</ol>
<?php delete_user(); ?> 
<?php change_to_admin(); ?> 
<?php change_to_subscriber(); ?> 
<div>
    <div class="row">                            
        
        <div class="col-md-12">
            <table class="table table-responsive table-hover">
                <tr>
                    <td>Id</td>
                    <td>User Name</td>
                    <td>First Name</td>
                    <td>Last Name</td>
                    <td>Email</td>
                    <td>Role</td>
                    <td>Date</td>
                    <td>Approve</td>
                    <td>Unapprove</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
                    
                    <?php findAllUsers(); ?>
            </table>
        </div>
    </div>
</div>