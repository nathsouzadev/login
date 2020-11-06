<header class="container-fluid border shadow">
    <nav class="row container m-auto">
        <div class="col-10 d-flex align-items-center">
            <a href="home.php">
            <img class="rounded-circle" src="<?php echo $_SESSION['image'];?>" alt="<?php echo $_SESSION['nome'];?>">
            </a>
            <h5 class="ml-3 mb-0"><?php echo $_SESSION['nome'];?></h5>
        </div>

        <div class="col-2 d-flex align-items-center justify-content-end">
            <div class="dropdown">
                <button class="btn text-white dropdown-toggle rounded-circle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="home.php">Home</a>
                    <a class="dropdown-item" href="perfil.php">Meu perfil</a>
                    <a class="dropdown-item" href="logout.php">Sair</a>
                </div>
            </div>
        <div>
            
    </nav>
        
</header>