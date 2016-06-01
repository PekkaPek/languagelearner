<div>
    <?php
    if (session_status() === PHP_SESSION_NONE){session_start();}
    echo $_SESSION['loggedInUser'];
    echo $_SESSION['id'];
    ?>
    <div>
        <a href="index.php">Main page</a>
    </div>
    <div>
        <a href="logout.php">Logout</a>
    </div>

</div>