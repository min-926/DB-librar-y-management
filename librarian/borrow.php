<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('navbar_borrow.php'); 
$connection = mysqli_connect("localhost", "root", "", "eb_lms") or die("Connection failed: " . mysqli_connect_error()); ?>
<div class="container">
    <div class="margin-top">
        <div class="row">	
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><i class="icon-user icon-large"></i>&nbsp;Borrow Form</strong>
            </div>

            <div class="span12">		
                <form method="post" action="borrow_save.php">
                    <div class="span6 offset3">

                        <!-- Library Card ID -->
                        <div class="control-group">
                            <label class="control-label" for="libraryCardID">Library Card ID</label>
                            <div class="controls">
                                <input type="text" name="libraryCardID" class="form-control" required />
                            </div>
                        </div>

                       <!-- Borrow Date -->
<div class="control-group">
    <label class="control-label" for="date_borrow">Date Borrow</label>
    <div class="controls">
        <input type="date" name="date_borrow" id="date_borrow" class="form-control" style="border: 3px double #CCCCCC;" required />
    </div>
</div>


                        

                        <!-- Book IDs -->
                        <div class="control-group">
                            <label class="control-label" for="book_ids">Book ID(s)</label>
                            <div class="controls">
                                <textarea name="book_ids" class="form-control" rows="3" placeholder="Enter book IDs separated by commas (e.g. 101,102,103)" required></textarea>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="control-group"> 
                            <div class="controls">
                                <button name="borrow_books" class="btn btn-primary">Borrow</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php') ?>
