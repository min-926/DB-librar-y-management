<?php
include('dbcon.php'); 
?>
<?php include('header.php'); ?>
<div class="container">
    <div class="margin-top">
        <div class="row">	
            <div class="span12">	
                <div class="alert alert-danger">Add staff</div>
                <p><a href="staff.php" class="btn btn-info"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a></p>

                <div class="addstudent">
                    <div class="details">Please Enter Details Below</div>		
                    <form class="form-horizontal" method="POST" action="student_save.php" enctype="multipart/form-data">
                        
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Firstname:</label>
                            <div class="controls">
                                <input type="text" id="inputEmail" name="firstname" placeholder="Firstname" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Lastname:</label>
                            <div class="controls">
                                <input type="text" id="inputPassword" name="lastname" placeholder="Lastname" required>
                            </div>
                        </div>
                        
						<!-- id -->
                        <div class="control-group">
                            <label class="control-label" for="staffid">staffid:</label>
                            <div class="controls">
                                <input type="text" id="staffid" name="staffid" placeholder="staffid" required>
                            </div>
                        </div>

                        <!-- Street -->
                        <div class="control-group">
                            <label class="control-label" for="street">Street:</label>
                            <div class="controls">
                                <input type="text" id="street" name="street" placeholder="Street" required>
                            </div>
                        </div>

                        <!-- City -->
                        <div class="control-group">
                            <label class="control-label" for="city">City:</label>
                            <div class="controls">
                                <input type="text" id="city" name="city" placeholder="City" required>
                            </div>
                        </div>

                        <!-- State -->
                        <div class="control-group">
                            <label class="control-label" for="state">State:</label>
                            <div class="controls">
                                <input type="text" id="state" name="state" placeholder="State" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="inputPassword">phone:</label>
                            <div class="controls">
                                <input type="text" id="inputPassword" name="phone" placeholder="phone" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <button name="submit" type="submit" class="btn btn-default"><i class="icon-save icon-large"></i>&nbsp;Save</button>
                            </div>
                        </div>
                    </form>					
                </div>		
            </div>		
        </div>
    </div>
</div>
