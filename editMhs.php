<?php
	include "proses_class_system.php";
  $cmahasiswa = new mahasiswa();

	if(isset($_GET['nim'])){
		$nim = $_GET['nim'];
		$data = $cmahasiswa->edit($nim);
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets/styles.css">
    <link rel="icon" href="Assets/Image/Logo.png" type="image/jpg" />
    <title>Update Mahasiswa - Bagus Nata</title>
  </head>

  <body class="bg-blackTheme">
    <!-- NAVBAR -->
    <?php
      include "navbar.php";
    ?>
    <!-- TABLE -->
    <div class="container"> 
      <div class="titleBox">
        <h1 class="title">Update Data</h1>
        <h1 class="title2">Mahasiswa</h1>
      </div> 
      <div class="form-display">
        <div class="table-responsive-sm insert-form-body shadow" >
          <form action="proses_mahasiswa.php?q=update" method="POST" enctype="multipart/form-data">
            <fieldset>
              <legend class="text-center">Form Update Biodata Mahasiswa</legend> </br>
              <b>Lengkapi Biodata Dengan Benar</b> <br>
                <table>
                  <tr>
                    <td><div class="td-space">NIM (Nomor Induk Mahasiswa)</div></td>
                    <td><div class="td-space">:</div></td>
                    <td><input class="form-input td-space" type="text" name="nomorIndukMahasiswa" value="<?php echo $data['nim'] ?>" readonly></td>
                  </tr>
                  <tr>
                    <td><div class="td-space">Nama Mahasiswa</div></td>
                    <td><div class="td-space">:</div></td>
                    <td><input class="form-input td-space" type="text" name="namaMahasiswa" value="<?php echo $data['nama_mhs'] ?>"></td>
                  </tr>
                  <tr>
                    <td><div class="td-space">Jurusan</div></td>
                    <td><div class="td-space">:</div></td>
                    <td>
                      <select class="form-input td-space" name="jurusan" id="jurusan">
                      <!--Buat option-->
                        <?php
                          foreach($cmahasiswa->print_option_jurusan() as $option) {
                            if ($option['kode_jurusan'] == $data['kode_jurusan']){
                              echo "<option selected='selected' value='".$option['kode_jurusan']."'>".$option['nama_jurusan']."</option>";
                            } else { 
                              echo "<option value='".$option['kode_jurusan']."'>".$option['nama_jurusan']."</option>";
                            }
                         } 
                        ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td><div class="td-space">Jenis Kelamin</div></td>
                    <td><div class="td-space">:</div></td>
                    <td class="form-input td-space">
                      <?php if ($data['jenis_kelamin'] == 1) { ?>
                          <input type="radio" name="gender" value="1" checked>Laki - Laki
                          <input type="radio" name="gender" value="2">Perempuan
                      <?php } else { ?>
                          <input type="radio" name="gender" value="1">Laki - Laki
                          <input type="radio" name="gender" value="2" checked>Perempuan
                      <?php } ?>
                    </td>
                  </tr>
                  <tr>
                    <td><div class="td-space">Alamat</div></td>
                    <td><div class="td-space">:</div></td>
                    <td><input class="form-input td-space" type="text" name="alamat" value="<?php echo $data['alamat'] ?>"></td>
                  </tr>
                  <tr>
                    <td><div class="td-space">No. HP</div></td>
                    <td><div class="td-space">:</div></td>
                    <td><input class="form-input td-space" type="number" name="phoneNumber" value="<?php echo $data['no_hp'] ?>"></td>
                  </tr>
                  <tr>
                    <td><div class="td-space">Email</div></td>
                    <td><div class="td-space">:</div></td>
                    <td><input class="form-input td-space" type="email" name="email" value="<?php echo $data['email'] ?>"></td>
                  </tr>
                  <tr>
                    <td><div class="td-space">Dosen Wali</div></td>
                    <td><div class="td-space">:</div></td>
                    <td> 
                      <select class="form-input td-space" name="dosen" id="dosen">
                        <!--Buat option-->
                        <?php
                          foreach($cmahasiswa->print_option_dosen() as $option) {
                            if ($option['nidn'] == $data['nidn']){
                              echo "<option selected='selected' value='".$option['nidn']."'>".$option['nama_dosen']."</option>";
                            } else { 
                              echo "<option value='".$option['nidn']."'>".$option['nama_dosen']."</option>";
                            }
                         } 
                        ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td><div class="td-space">Foto</div></td>
                    <td><div class="td-space">:</div></td>
                    <td><input type="file" name="uploadFoto" value="<?php echo $data['foto'] ?>"></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td>
                      <!-- button update -->
                      <button 
                        type="submit"
                        name="submitUpdate"
                        class="btn btn-success btn-form"
                        id="btn-update">Update
                      </button>
                      <!-- button cancel -->
                      <button 
                        type="button"
                        onclick="history.go(-1);" 
                        class="btn btn-danger btn-form" 
                        id="btn-cancel">Cancel
                      </button>
                    </td>
                  </tr>
                </table>
            </fieldset>
          </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>