<div tabindex="-1" id="sideMenu" class="sideMenu">
    <div class="sideMenuContent">
        <a class="sideMenuLink" href="./Index.php">Home page</a>
        <div class="sideMenuSeparator"></div>
        <a class="sideMenuLink" href="./query.php">See all</a>
        <div class="sideMenuSeparator"></div>
        <?php
            if ( empty($_SESSION['user']) ) {
                echo '<a class="sideMenuLink" href="./Login.php">Login</a>';
                echo '<div class="sideMenuSeparator"></div>';
                echo '<a class="sideMenuLink" href="./createaccount.php">Create Account</a>';
            } else {
                echo '<a class="sideMenuLink" href="./Account.php">Account</a>
                    <div class="sideMenuSeparator"></div>
                    <a class="sideMenuLink" href="./Logout.php">Log out</a>
                    <div class="sideMenuSeparator"></div>
                    <a class="sideMenuLink" href="./BookSubmit.php">Publish Book</a>
                    <div class="sideMenuSeparator"></div>
                ';
            }
        ?>     
        
    </div>
</div>