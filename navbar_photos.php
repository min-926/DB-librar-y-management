<?php include('tooltip.php'); ?>

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
                        <a rel="tooltip" data-placement="bottom" title="Home" id="home" href="index.php">&nbsp;Home</a>
                    </li>
                    <li>
                        <a rel="tooltip" data-placement="bottom" title="About Us" id="about" href="about.php">&nbsp;About Us</a>
                    </li>
                    <li>
                        <a rel="tooltip" data-placement="bottom" title="Library Resources" id="resources" href="photos.php">&nbsp;Library Resource</a>
                    </li>
                    <li>
                        <a rel="tooltip" data-placement="bottom" title="Click Here to Login" id="login" href="librarian">&nbsp;Login</a>
                    </li>
                    <li>
                        <a rel="tooltip" data-placement="bottom" title="Sign Up" id="signup" href="signup.php">&nbsp;Sign Up</a>
                    </li>
                </ul>
                <form class="navbar-search pull-right" action="search.php" method="GET">
                    <input type="text" class="search-query span2" placeholder="Search" name="query">
                </form>
            </div>
        </div>
    </div>
</div>
