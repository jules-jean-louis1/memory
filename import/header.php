<?php

if (isset($_POST['deconnexion'])) {
    $connexion = new Connexion();
    $connexion->disconnect();
}
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
        <i class="fa-solid fa-thumbs-up fa-5x"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        Memory
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Jouer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Scores</a>
        </li>
      </ul>
      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <!-- Icon -->
      
        <div class="">
            <a href="https://github.com/jules-jean-louis1/memory"><i class="fa-brands fa-github fa-2xl"></i></a>
        </div>
      <div class="connect">
        <?php if (isset($_SESSION['login']) != null) { ?>
        <div class="d-flex flex-row">
            <div class="">
                <form action="" method="post">
                    <input type="submit" name="deconnexion" value="Déconnexion" class="btn btn-outline-danger" />
                </form>
            </div>
            <div class="">
                <div class="nav-item me-3 me-lg-0 dropdown btn btn-outline-primary">
                <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-mdb-toggle="dropdown"
                aria-expanded="false"
                ><?php echo $_SESSION['login']; ?>
                <i class="fas fa-user"></i>
                </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="#">Action</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">Another action</a>
                        </li>
                        <li><hr class="dropdown-divider" /></li>
                        <li>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
            <?php } else { ?>
        <div class="d-flex flex-row">
            <div class="d-flex justify-content-center align-items-center">
                <button class="btn btn-success">
                    <a class="text-reset me-3" href="signup_form.php">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        S'inscrire
                    </a>
                </button>
            </div>
            <div class="dropdown">
                <button class="btn btn-outline-success">
                    <a
                        class="text-reset me-3"
                        href="login_form.php"
                        role="button"
                        aria-expanded="false"
                    >
                        <i class="fa-solid fa-user"></i>
                        Se connecter
                    <!-- <span class="badge rounded-pill badge-notification bg-danger">1</span> -->
                    </a>
                </button>
            </div>
        </div>
        <?php } ?>
      </div>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->