<?php
  include "proses_class_system.php";
	$cadminJadwal = new adminJadwal();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets/styles.css">
    <link rel="icon" href="Assets/Image/Logo.png" type="image/jpg" />
    <title>Insert Jadwal Kuliah - Bagus Nata</title>
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
        <h1 class="title2">Jadwal Kuliah</h1>
      </div>  
      <div class="form-display">
        <div class="table-responsive-sm insert-form-body shadow" >
          <form action="proses_admin_jadwal.php?q=insert" method="POST">
            <fieldset>
              <legend class="text-center">Form Input Jadwal Kuliah</legend> </br>
              <b>Lengkapi Data Jadwal Kuliah Dengan Benar</b>
                <table>
                  <tr>
                    <td><div class="td-space">Kode Jadwal</div></td>
                    <td><div class="td-space">:</div></td>
                    <td><input class="form-input td-space" type="text" name="kode_jadwal"></td>
                  </tr>
                  <tr>
                    <td><div class="td-space">Matakuliah</div></td>
                    <td><div class="td-space">:</div></td>
                    <td>
                      <select class="form-input td-space" name="kode_matakuliah">
                      <!--Buat option-->
                        <?php
                          foreach($cadminJadwal->print_option_matakuliah() as $option) {
                        ?>
                          <option 
                            value="<?php echo $option['kode_matakuliah']; ?>">
                            <?php echo $option['kode_matakuliah']; ?> - <?php echo $option['nama_matakuliah']; ?>
                          </option>
                        <?php } ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td><div class="td-space">Hari</div></td>
                    <td><div class="td-space">:</div></td>
                    <td>
                      <select class="form-input td-space" name="hari">
                      <!--Buat option-->
                        <?php
                          foreach($cadminJadwal->print_option_hari() as $option) {
                        ?>
                          <option 
                            value="<?php echo $option['kode_hari']; ?>"><?php echo $option['nama_hari']; ?>
                          </option>
                        <?php } ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td><div class="td-space">Jam</div></td>
                    <td><div class="td-space">:</div></td>
                    <td><input class="form-input td-space" type="text" name="jam"></td>
                  </tr>
                  <tr>
                    <td><div class="td-space">Kelas</div></td>
                    <td><div class="td-space">:</div></td>
                    <td><input class="form-input td-space" type="text" name="kelas"></td>
                  </tr>
                  <tr>
                    <td><div class="td-space">Ruang</div></td>
                    <td><div class="td-space">:</div></td>
                    <td><input class="form-input td-space" type="text" name="ruang"></td>
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