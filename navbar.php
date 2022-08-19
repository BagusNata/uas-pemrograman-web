<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark ">
  <div class="container-fluid">
    <div class="collapse navbar-collapse mynavbar" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <!-- Mahasiswa -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mahasiswa
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="admin_selectMhs.php">Lihat Data Mahasiswa</a></li>
            <li><a class="dropdown-item" href="insertMhs.php">Tambah Data Mahasiswa</a></li>
          </ul>
        </li>
        <!-- Jurusan -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Jurusan
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="admin_selectJurusan.php">Lihat Data Jurusan</a></li>
            <li><a class="dropdown-item" href="insertJurusan.php">Tambah Data Jurusan</a></li>
          </ul>
        </li>
        <!-- Dosen -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dosen
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="admin_selectDosen.php">Lihat Data Dosen</a></li>
            <li><a class="dropdown-item" href="insertDosen.php">Tambah Data Dosen</a></li>
          </ul>
        </li>
        <!-- Jadwal Kuliah -->
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="selectAdminJadwal.php">Jadwal Kuliah</a>
        </li>
        <!-- User -->
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="login.php">Login as User</a>
        </li>
        <!-- Logout -->
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>