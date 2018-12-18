<nav class="navbar">
    <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link" href="./index.php">Home</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="./about.php">About</a>
        </li>

        <?php if(!isset($_SESSION['user'])): ?>

        <li class="nav-item">
            <a class="nav-link" href="./login.php">Login</a>
        </li>

        <?php elseif(isset($_SESSION['user'])): ?>

        <li class="nav-item">
            <a class="nav-link" href="./profile.php">My profile</a>
            <ul>
                <a class="nav-item">Posts</a>
                <a class="nav-item" href="./app/users/settings.php">Edit profile</a>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/app/users/logout.php">Logout</a>
        </li>

        <?php endif; ?>

    </ul>
</nav>
