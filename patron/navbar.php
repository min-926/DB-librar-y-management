<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>



<!-- Bootstrap & jQuery -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@2.3.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@2.3.2/js/bootstrap.min.js"></script>

<!-- Navbar -->
<div class="navbar navbar-fixed-top nav-wrapper">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="nav-collapse collapse">
        <ul class="nav">
          <li class="active">
            <a rel="tooltip" data-placement="bottom" title="Home" href="index.php">Home</a>
          </li>
          <li>
            <a rel="tooltip" data-placement="bottom" title="About Us" href="about.php">About Us</a>
          </li>

          <?php if (!isset($_SESSION['libraryCardID'])): ?> 
            <li>
              <a rel="tooltip" data-placement="bottom" title="Click Here to Login" href="librarian.php">Staff</a>
            </li>
            <li>
              <a rel="tooltip" data-placement="bottom" title="Click " href="library_branch.php">Library Branch</a>
            </li>
            <li>
              <a rel="tooltip" data-placement="bottom" title="Sign Up" href="patron/signup.php">Account Login</a>
            </li>
          <?php else: ?>
            <li>
              <a href="#logout" data-toggle="modal" rel="tooltip" title="Logout">
                <i class="icon-signout icon-large"></i>&nbsp;Logout
              </a>
            </li>
          <?php endif; ?>

          <li>
            <a href="#myModal" data-toggle="modal" rel="tooltip" title="Search Book">Search</a>
          </li>
        </ul>
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

<!-- Logout Modal -->
<div id="logout" class="modal hide fade" tabindex="-1">
  <div class="modal-body">
    <div class="alert alert-danger">Are you sure you want to logout?</div>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
    <a href="logout2.php" class="btn btn-danger">Yes</a>
  </div>
</div>

<!-- Tooltip Activation -->
<script>
  $(function () {
    $('[rel=tooltip]').tooltip();
  });
</script>
