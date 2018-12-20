<div class="hamburger-nav">
    <i class="fas fa-bars"></i>
</div>
<div>
    <a class="logo" href="./index.php">
        <img src="/../logo.png" alt="Logo">
    </a>
</div>
<nav class="navbar">
    <ul class="navbar-nav burger-nav-hidden">

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
        </li>

        <li class="nav-item">
            <a class="nav-link" href="./app/posts/store.php">Posts</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="./app/users/settings.php">Settings</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/app/users/logout.php">Logout</a>
        </li>

        <?php endif; ?>

    </ul>
</nav>
