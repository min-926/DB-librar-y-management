<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_dashboard.php'); ?>

    <div class="container">
		<div class="margin-top">
			<div class="row">	
			<div class="span12">	
			   <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Member Table</strong>
                                </div>
								<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">
    <p><a href="add_member.php" class="btn-default">&nbsp;Add Member</a></p>
    <thead>
        <tr>
            <th>Library Card ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Card Expire</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php  
        $user_query = mysqli_query($conn, "SELECT * FROM patron") or die(mysqli_error($conn));
        while ($row = mysqli_fetch_array($user_query)) {
            $id = $row['libraryCardID'];
        ?>
        <tr class="del<?php echo $id ?>">
            <td><?php echo $row['libraryCardID']; ?></td>
            <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['cardexpire']; ?></td>
            <td>
                <?php echo $row['street'] . ", " . $row['city'] . ", " . $row['state'] . " " . $row['zipcode']; ?>
            </td>
            <td>
                <div class="span2">
                    <a rel="tooltip" title="Delete" id="<?php echo $id; ?>" href="#delete_student<?php echo $id; ?>" data-toggle="modal" class="btn-default">
                        <i class="icon-trash icon-large"></i>
                    </a>
                    <?php include('delete_student_modal.php'); ?>
                    <div class="span1">
                        <a rel="tooltip" title="Edit" id="e<?php echo $id; ?>" href="edit_member.php?id=<?php echo $id; ?>" class="btn-default">
                            <i class="icon-pencil icon-large"></i>
                        </a>
                    </div>
                </div>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

							
			
			</div>		
			</div>
		</div>
    </div>
<?php include('footer.php') ?>