<header>
    <div class="menu">
        <div class="menuContainer">
            <?php 
                if ( 1 == 1) {
                    echo '<img id="pfpCorner" src="./resources/alexandriaLogoFinal.png" class="pfpContainerCorner" alt="">';
                } else {
                    
                }
            
            ?>
        </div>
    </div>
    <a href="/dashboard/pap/">
        <div class="websiteName">
            <img class="logo" src="./resources/alexandriaLogoFinal.png" alt="">
            <h1 class="webTitle">Alexandria</h1>
        </div>
    </a>
    <div class="menu2">
        <div class="searchArea">
            <form class="searchBar" id="searchForm" action="/dashboard/pap/query.php" method="get">
                <input id="searchInput" class="searchInput" placeholder="Livro ou autor" type="text" name="query">
                <button class="delButton" onclick="deleteText()" type="button">X</button>
                <button class="searchButton" type="submit">Pesquisar</button>
            </form>
        </div>
    </div>
</header>