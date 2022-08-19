<?php
  include "proses_class_system.php";
  $cdosen = new dosen();

  function search() {
    ?>
    <form class="search-box-body" action="admin_searchDosen.php" method="POST">
      <input class="input-shape" type="text" placeholder="Search..." name="search">
      <button class="button-search" type="submit" name="submit-search"> 
        <i class="fa fa-search"></i>
      </button>
    </form>
    <?php
  }
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
    <title>Select Dosen - Admin</title>
  </head>

  <body class="bg-blackTheme">
    <!-- NAVBAR -->
    <?php
      include "navbar.php";
    ?>

    <!-- Content --> 
      <div class="container">  
        <div class="titleBox">
          <h1 class="title">Data</h1>
          <h1 class="title2">Dosen</h1>
        </div>  
    <!-- SearchBox -->
      <?php
        search();
      ?>      
    <!-- Table -->
    <div class="table-responsive-sm shadow">
      <table class="table table-bordered" border="3">
        <thead class="table-dark table_title">
          <tr>
            <th scope="col">NIDN</th>
            <th scope="col">Nama Dosen</th>
            <th scope="col">Pendidikan</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">No. Hp</th>
            <th scope="col">Email</th>
            <th scope="col" colspan="2">Action</th>
          </tr>
        </thead>
        <!-- show Data Table -->
        <?php
        foreach($cdosen->select_data() as $tampil) {
        ?>
          <tbody class="table-body">
            <tr>
              <td class="text-center"> <?php echo $tampil['nidn']           ?> </td>
              <td class="text-center"> <?php echo $tampil['nama_dosen']     ?> </td>
              <td class="text-center"> <?php echo $tampil['pendidikan']     ?> </td>
              <td class="text-center"> <?php echo $tampil['tgl_lahir']      ?> </td>
              <td class="text-center"> <?php echo $tampil['jenis_kelamin']  ?> </td>
              <td class="text-center"> <?php echo $tampil['alamat']         ?> </td>
              <td class="text-center"> <?php echo $tampil['no_hp']          ?> </td>
              <td class="text-center"> <?php echo $tampil['email']          ?> </td>
              <td class="text-center"> 
                <a style="color:black;" href="editDosen.php?nidn=<?php echo $tampil['nidn']?>" class="btn-edit"> <img src="Assets/Image/b_update.png" width="30px"> Edit </a>
              </td>
              <td class="text-center"> 
                <a style="color:black;" href="proses_dosen.php?q=delete&nidn=<?php echo $tampil['nidn'] ?>" class="btn-del"> <img src="Assets/Image/b_delete.png" width="30px"> Delete </a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
      </table>
    </div>
  </div>

  <!-- Untuk alert -->
    <?php if (isset ($_GET['m'])) : ?>
      <div class="update-record" data-update="<?= $_GET['m']; ?>"></div>
    <?php endif; ?>

    <!-- Optional JavaScript -->
    <!-- SweetAlert2 --> 
    <script src="jquery-3.6.0.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script>
      $('.btn-edit').on('click', function(e) {
          e.preventDefault();
          const href = $(this).attr('href')
          Swal.fire({
              title : "Are You Sure?",
              text  : 'You will redirected to edit page!',
              icon  : 'warning',
              showCancelButton  : true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor : '#d33',
              confirmButtonText : 'Yes',
          }). then ((result) => {
                  if (result.value) {
                      document.location.href = href;
                  }
          })
      })

      $('.btn-del').on('click', function(e) {
          e.preventDefault();
          const href = $(this).attr('href')
          Swal.fire({
              title : "Are You Sure?",
              text  : 'Record will be deleted?',
              icon  : 'warning',
              showCancelButton  : true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor : '#d33',
              confirmButtonText : 'Delete Record',
          }).then ((result) => {
                  if (result.value) {
                      document.location.href = href;
                  }
          })
      })
      
      const update = $('.update-record').data('update')
      if (update) {
          Swal.fire({
            timer: 3500,
            timerProgressBar: true,
            icon  : 'success',
            title : 'Update Record',
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