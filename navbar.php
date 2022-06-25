<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark ">
  <div class="container-fluid">
    <div class="collapse navbar-collapse mynavbar" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <!-- Home -->
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <!-- Insert -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Insert
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="insertMhs.php">Data Mahasiswa</a></li>
            <li><a class="dropdown-item" href="insertJurusan.php">Data Jurusan</a></li>
            <li><a class="dropdown-item" href="insertDosen.php">Data Dosen</a></li>
          </ul>
        </li>
        <!-- Select -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Select
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="selectMhs.php">Data Mahasiswa</a></li>
            <li><a class="dropdown-item" href="selectJurusan.php">Data Jurusan</a></li>
            <li><a class="dropdown-item" href="selectDosen.php">Data Dosen</a></li>
          </ul>
        </li>
        <!-- Update -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Update
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="updateMhs.php">Data Mahasiswa</a></li>
            <li><a class="dropdown-item" href="updateJurusan.php">Data Jurusan</a></li>
            <li><a class="dropdown-item" href="updateDosen.php">Data dosen</a></li>
          </ul>
        </li>
        <!-- Delete -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Delete
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="deleteMhs.php">Data Mahasiswa</a></li>
            <li><a class="dropdown-item" href="deleteJurusan.php">Data Jurusan</a></li>
            <li><a class="dropdown-item" href="deleteDosen.php">Data dosen</a></li>
          </ul>
        </li>
        <!-- Logout -->
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>