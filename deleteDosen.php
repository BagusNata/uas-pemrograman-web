<?php
  include "proses_class_system.php";
  $cdosen = new dosen();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets/styles.css">
    <link rel="icon" href="Assets/Image/Logo.png" type="image/jpg" />
    <title>Delete Dosen - Bagus Nata</title>
  </head>

  <body class="bg-blackTheme">
    <!-- NAVBAR -->
    <?php
      include "navbar.php";
    ?>

    <!-- TABLE -->
    <div class="container"> 
      <div class="titleBox">
        <h1 class="title">Delete Data</h1>
        <h1 class="title2">Dosen</h1>
      </div>
      <div class="table-responsive-sm shadow">
        <table class="table table-bordered" border="3">
          <thead class="table-dark table_title">
            <tr>
              <tr>
              <th scope="col">NIDN</th>
              <th scope="col">Nama Dosen</th>
              <th scope="col">Pendidikan</th>
              <th scope="col">Tanggal Lahir</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Alamat</th>
              <th scope="col">No. Hp</th>
              <th scope="col">Email</th>
              <th scope="col">Action</th>
            </tr>
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
                  <a style="color:black;" href="proses_dosen.php?q=delete&nidn=<?php echo $tampil['nidn'] ?>" class="btn-del"> <img src="Assets/Image/b_drop.png"> Delete </a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
        </table>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- SweetAlert2 --> 
    <script src="jquery-3.6.0.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script>
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
          }). then ((result) => {
                  if (result.value) {
                      document.location.href = href;
                  }
          })
      })
    </script>
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>