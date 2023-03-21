<nav class="sb-topnav navbar navbar-expand" style="background: darkviolet;">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="<?= base_url('dashboard') ?>" style="color:aliceblue;"><i class="fa-fw far fa-id-card"></i> Pengaduan Masyarakat</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!" style="margin-left: 30px; color: green;"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-success" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: green;"><i class="fas fa-user fa-fw"></i><?=$user['nama']?></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        </li>
        <li><a class="dropdown-item" href="<?= base_url('Auth/logout') ?>">Logout</a></li>
    </ul>
    </li>
    </ul>
</nav>