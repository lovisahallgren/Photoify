<?php if(!isLoggedIn()): ?>
    <div class="header">
        <a class="logo" href="./index.php">
            <img src="/../logo.png" alt="Logo">
        </a>
        <i class="fas fa-bars menu-icon hidden"></i>
        <i class="fas fa-times close-menu hidden"></i>
    </div>
<?php elseif(isLoggedIn()): ?>
    <div class="header">
        <a class="logo" href="./index.php">
            <img src="/../logo.png" alt="Logo">
        </a>
    </div>
<?php endif; ?>
