<div class="navbar navbar-fixed-top nav-wrapper">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="nav-collapse collapse">
                      <!-- .nav, .navbar-search, .navbar-form, etc -->
                <ul class="nav">
                    <li class="active"><a href="dashboard.php">&nbsp;Home</a></li>
                    
                    <?php include('dropdown.php'); ?>
                    <li><a href="books.php">&nbsp;Books</a></li>
                    <li><a href="member.php">&nbsp;Patron</a></li>
                    
                    <li><a href="#myModal" data-toggle="modal">&nbsp;Search</a></li>




                    <li><a href="messages.php">&nbsp;Messages</a></li> <!-- ✅ Messages Link -->
                </ul>

                <div class="pull-right">
                    <div class="admin">
                        <a href="#logout" data-toggle="modal">&nbsp;Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Search Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3 id="searchModalLabel">Advanced Book Search</h3>
    </div>

    <form class="form-horizontal" method="POST" action="advance_search.php">
        <div class="modal-body">
            <div class="control-group">
                <label class="control-label" for="inputTitle">Title</label>
                <div class="controls">
                    <input type="text" name="title" id="inputTitle" placeholder="Enter Book Title">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputAuthor">Author</label>
                <div class="controls">
                    <input type="text" name="author" id="inputAuthor" placeholder="Enter Author Name">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputGenre">Genre</label>
                <div class="controls">
                    <input type="text" name="genre" id="inputGenre" placeholder="Enter Genre">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="inputYear">Publication Year</label>
                <div class="controls">
                    <input type="text" name="year" id="inputYear" placeholder="Enter Year">
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
</div>




