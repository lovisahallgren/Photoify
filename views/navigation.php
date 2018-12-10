<nav class="navbar">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="./index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./about.php">About</a>
        </li>




        <li class="nav-item">
            <a class="nav-link" href="./login.php">Login</a>
        </li>



        <li class="nav-item">
            <a class="nav-link" href="/app/users/logout.php">Logout</a>
        </li>



    </ul>
</nav>

<?php

if(!isset($_SESSION['user'])): // in mellan about och login

elseif(isset($_SESSION['user'])): // in mellan login och logout

endif; // in efter logout

?>
