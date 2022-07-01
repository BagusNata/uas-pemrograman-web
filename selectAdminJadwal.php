<?php
  include "proses_class_system.php";
	$cadminJadwal = new adminJadwal();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets/styles.css">
    <link rel="icon" href="Assets/Image/Logo.png" type="image/jpg" />
    <title>Jadwal Kuliah - Bagus Nata</title>
  </head>

  <body class="bg-blackTheme">
    <!-- NAVBAR -->
    <?php
      include "navbar.php";
    ?> 
    <!-- Content --> 
      <div class="container">    
        <div class="titleBox">
          <h1 class="title">Daftar</h1>
          <h1 class="title2">Jadwal Kuliah</h1>
        </div>
        <div class="button_tambah top-50 end-0 translate-middle-y">
          <a href="insert_admin_jadwal.php"> <img src="Assets/Image/b_add.png" width="60px" alt="buttonTambah"> </a>
        </div>
      <!-- Table -->
      <div class="table-responsive-sm shadow">
        <table class="table table-bordered" border="3">
          <thead class="table-dark table_title">
            <tr>
              <th scope="col">Kode Jadwal</th>
              <th scope="col">Mata Kuliah</th>
              <th scope="col">Hari</th>
              <th scope="col">Jam</th>
              <th scope="col">Kelas</th>
              <th scope="col">Ruang</th>
              <th scope="col">Dosen</th>
              <th scope="col" colspan="2">Action</th>
            </tr>
          </thead>
          <!-- show Data Table -->
          <?php
          foreach($cadminJadwal->select_data() as $data) {
          ?>
            <tbody class="table-body">
              <tr>
                <td class="text-center"> <?php echo $data['kode_jadwal']     ?> </td>
                <td class="text-center"> <?php echo $data['nama_matakuliah'] ?> </td>
                <td class="text-center"> <?php echo $data['nama_hari']       ?> </td>
                <td class="text-center"> <?php echo $data['jam']             ?> </td>
                <td class="text-center"> <?php echo $data['kelas']           ?> </td>
                <td class="text-center"> <?php echo $data['ruang']           ?> </td>
                <td class="text-center"> <?php echo $data['dosen']           ?> </td>
                <!-- ACTION -->
                <!-- ubah jadwal -->
                <td class="text-center"> 
                  <a style="color:black;" href="edit_admin_jadwal.php?kode_jadwal=<?php echo $data['kode_jadwal']?>" class="btn-edit"> <img src="Assets/Image/b_update.png" width="30px"> ubah </a>
                </td>
                <!-- delete jadwal -->
                <td class="text-center"> 
                  <a style="color:black;" href="proses_admin_jadwal.php?q=delete&kode_jadwal=<?php echo $data['kode_jadwal'] ?>" class="btn-del"> <img src="Assets/Image/b_delete.png" width="30px"> Delete </a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
        </table>
      </div>
    </div>  

    <!-- Untuk alert -->
    <?php if (isset ($_GET['m'])) : ?>
      <div class="update-data" data-update_data="<?= $_GET['m']; ?>"></div>
    <?php endif; ?>

    <!-- Optional JavaScript -->
    <!-- SweetAlert2 --> 
    <script src="jquery-3.6.0.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script>
      const update = $('.update-data').data('update_data')
      if (update) {
          Swal.fire({
            timer: 3500,
            timerProgressBar: true,
            icon  : 'success',
            title : 'Success',
            text  : 'Record has been updated!',
          })
      }
    </script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>