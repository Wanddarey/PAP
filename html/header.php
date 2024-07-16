<header>
    <div class="menu">
        <div class="menuContainer">
        <a onclick="focusSideMenu()" class="pfpContainerCorner"><img id="pfpCorner" src="./resources/hmbmenu.webp" class="pfpImg" alt=""></a>
            <?php
                require_once './php/Basics.php';
                //consoleLog(var_dump($_SESSION['user']));
                if (empty($_SESSION['user'])) {
                    echo '<a href="./Login.php" class="pfpContainerCorner userInfoContainer"><img id="pfpCorner" src="./resources/alexandriaLogoFinal.webp" class="pfpImg" alt="No user"><div class="infoContainer"><p>Login</p></div></a>';
                } else {
                    echo '<a href="./Account.php" class="pfpContainerCorner userInfoContainer">';
                    if (empty($_SESSION['user']['pfp']) || $_SESSION['user']['pfp'] == '') {
                        echo '<img id="pfpCorner" src="./imagens/pfp/img.webp" class="pfpImg" alt="No Image">';
                    } else {
                        echo '<img id="pfpCorner" src="./imagens/pfp/' . $_SESSION['user']['pfp'] . '.webp" class="pfpImg" alt="pfp">';
                    }
                    echo '<div class="infoContainer"><p>'. $_SESSION['user']['userName'] .'</p></div></a>';
                }
            
            ?>
        </div>
    </div>
    <a class="websiteName" href="./">
        
        <img class="logo" src="./resources/alexandriaLogoFinal.webp" alt="">
        <h1 class="webTitle">Alexandria</h1>
        
    </a>
    <div class="menu">
        <div class="searchArea">
            <form class="searchBar" id="searchForm" action="/dashboard/pap/query.php" method="get">
                <input id="searchInput" class="searchInput" placeholder="Book or author" type="text" name="query">
                <button class="delButton" type="reset">X</button>
                <button class="searchButton" type="submit">Search</button>
            </form>
        </div>
    </div>
</header>