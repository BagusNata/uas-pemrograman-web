<?php
	include "proses_class_system.php";
	$cmahasiswa = new mahasiswa();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets/styles.css">
    <link rel="icon" href="Assets/Image/Logo.png" type="image/jpg" />
    <title>Delete Mahasiswa - Bagus Nata</title>
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
        <h1 class="title2">Mahasiswa</h1>
      </div>
      <div class="table-responsive-sm shadow">
        <table class="table table-bordered" border="3">
          <thead class="table-dark table_title">
            <tr>
              <th scope="col">NIM</th>
              <th scope="col">Nama Mahasiwa</th>
              <th scope="col">Jurusan</th>
              <th scope="col">Gender</th>
              <th scope="col">Alamat</th>
              <th scope="col">No. Hp</th>
              <th scope="col">Email</th>
              <th scope="col">Dosen Wali</th>
              <th scope="col">Foto</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <!-- show Data Table -->
          <?php
          foreach($cmahasiswa->select_data() as $tampil) {
          ?>
            <tbody class="table-body">
              <tr>
                <td class="text-center"> <?php echo $tampil['nim']            ?> </td>
                <td class="text-center"> <?php echo $tampil['nama_mhs']       ?> </td>
                <td class="text-center"> <?php echo $tampil['nama_jurusan']   ?> </td>
                <td class="text-center"> <?php echo $tampil['jenis_kelamin']  ?> </td>
                <td class="text-center"> <?php echo $tampil['alamat']         ?> </td>
                <td class="text-center"> <?php echo $tampil['no_hp']          ?> </td>
                <td class="text-center"> <?php echo $tampil['email']          ?> </td>
                <td class="text-center"> <?php echo $tampil['nama_dosen']     ?> </td>
                <td class="text-center"> 
                  <?php
                  if($tampil['foto'] == null){
                  ?>
                    <img
                    class="rounded-circle"
                    src="Assets/Image/DefaultProfilePicture.jpg"
                    alt="<?php echo $tampil['nama_mhs'] ?> - Profile picture"
                    style="object-fit: cover; width: 80px; height: 80px;">   
                  <?php
                  } else {
                  ?>
                    <img
                    class="rounded-circle"
                    src="Assets/UploadFoto/<?php echo $tampil['foto'] ?>"
                    alt="<?php echo $tampil['nama_mhs'] ?> - Profile picture"
                    style="object-fit: cover; width: 80px; height: 80px;"> 
                  <?php
                  }
                  ?>  
                </td>
                <td class="text-center"> 
                  <a style="color:black;" href="proses_delete_mhs.php?nim=<?php echo $tampil['nim']?>" class="btn-del"> <img src="Assets/Image/b_drop.png"> Delete </a>
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