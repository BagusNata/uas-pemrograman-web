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
    <title>Insert Mahasiswa - Bagus Nata</title>
  </head>

  <body class="bg-blackTheme">
    <!-- NAVBAR -->
    <?php
      include "navbar.php";
    ?>

    <!-- TABLE -->
    <div class="container">  
      <div class="titleBox">
        <h1 class="title">Input Data</h1>
        <h1 class="title2">Mahasiswa</h1>
      </div>  
      <div class="form-display">
        <div class="table-responsive-sm insert-form-body shadow" >
          <form action="proses_mahasiswa.php?q=insert" method="POST" enctype="multipart/form-data">
            <fieldset>
              <legend class="text-center">Form Input Biodata Mahasiswa</legend> </br>
              <b>Lengkapi Biodata Dengan Benar</b>
                <table>
                  <tr>
                    <td><div class="td-space">NIM (Nomor Induk Mahasiswa)</div></td>
                    <td><div class="td-space">:</div></td>
                    <td><input class="form-input td-space" type="text" name="nomorIndukMahasiswa"></td>
                  </tr>
                  <tr>
                    <td><div class="td-space">Nama Mahasiswa</div></td>
                    <td><div class="td-space">:</div></td>
                    <td><input class="form-input td-space" type="text" name="namaMahasiswa"></td>
                  </tr>
                  <tr>
                    <td><div class="td-space">Jurusan</div></td>
                    <td><div class="td-space">:</div></td>
                    <td>
                      <select class="form-input td-space" name="jurusan" id="jurusan">
                      <!--Buat option-->
                        <?php
                          foreach($cmahasiswa->print_option_jurusan() as $tampil) {
                        ?>
                          <option 
                            value="<?php echo $tampil['kode_jurusan']; ?>"><?php echo $tampil['nama_jurusan']; ?>
                          </option>
                        <?php } ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td><div class="td-space">Jenis Kelamin</div></td>
                    <td><div class="td-space">:</div></td>
                    <td class="form-input td-space">
                      <input type="radio" name="gender" value="1"> Male
                      <input type="radio" name="gender" value="2"> Female
                    </td>
                  </tr>
                  <tr>
                    <td><div class="td-space">Alamat</div></td>
                    <td><div class="td-space">:</div></td>
                    <td><input class="form-input td-space" type="text" name="alamat"></td>
                  </tr>
                  <tr>
                    <td><div class="td-space">No. HP</div></td>
                    <td><div class="td-space">:</div></td>
                    <td><input class="form-input td-space" type="number" name="phoneNumber"></td>
                  </tr>
                  <tr>
                    <td><div class="td-space">Email</div></td>
                    <td><div class="td-space">:</div></td>
                    <td><input class="form-input td-space" type="email" name="email"></td>
                  </tr>
                  <tr>
                    <td><div class="td-space">Dosen Wali</div></td>
                    <td><div class="td-space">:</div></td>
                    <td> 
                      <select class="form-input td-space" name="dosen" id="dosen">
                        <!--Buat option-->
                        <?php
                          foreach($cmahasiswa->print_option_dosen() as $tampil) {
                        ?>
                          <option 
                            value="<?php echo $tampil['nidn']; ?>"><?php echo $tampil['nama_dosen']; ?>
                          </option>
                        <?php } ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td><div class="td-space">Foto</div></td>
                    <td><div class="td-space">:</div></td>
                    <td><input type="file" name="uploadFoto"></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td>
                      <!-- button update -->
                      <button 
                        type="submit"
                        name="submitInsert" 
                        class="btn btn-success btn-form"
                        id="btn-simpan">Simpan
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

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>