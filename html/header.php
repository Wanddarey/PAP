<header>
    <div class="menu">
        <div class="menuContainer">
        <a href="#sideMenu" class="pfpContainerCorner"><img id="pfpCorner" src="./resources/hmbmenu.webp" class="pfpImg" alt=""></a>
            <?php 
                if (1 == 1) {
                    echo '<a href="./Login.php" class="pfpContainerCorner"><img id="pfpCorner" src="./resources/alexandriaLogoFinal.webp" class="pfpImg" alt=""></a>';
                } else {
                    echo '<a href="./Account.php" class="pfpContainerCorner"><img id="pfpCorner" src="./resources/alexandriaLogoFinal.webp" class="pfpImg" alt=""></a>';
                }
            
            ?>
        </div>
    </div>
    <a class="websiteName" href="/dashboard/pap/">
        
        <img class="logo" src="./resources/alexandriaLogoFinal.webp" alt="">
        <h1 class="webTitle">Alexandria</h1>
        
    </a>
    <div class="menu2">
        <div class="searchArea">
            <form class="searchBar" id="searchForm" action="/dashboard/pap/query.php" method="get">
                <input id="searchInput" class="searchInput" placeholder="Livro ou autor" type="text" name="query">
                <button class="delButton" type="reset">X</button>
                <button class="searchButton" type="submit">Pesquisar</button>
            </form>
        </div>
    </div>
</header>