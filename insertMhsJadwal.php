<?php
  include "proses_class_system.php";
	$cmhsJadwal = new mhsJadwal();

  if(isset($_GET['nim'])){
		$nim = $_GET['nim'];
		$data = $cmhsJadwal->auto_insert_nim($nim);
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets/styles.css">
    <link rel="icon" href="Assets/Image/Logo.png" type="image/jpg" />
    <title>Pilih Jadwal Kuliah - Bagus Nata</title>
  </head>

  <body class="bg-blackTheme">
    <!-- NAVBAR -->
    <?php
      include "navbar.php";
    ?>

    <!-- TABLE -->
    <div class="container">  
      <div class="titleBox">
        <h1 class="title">Pilih</h1>
        <h1 class="title2">Jadwal Kuliah</h1>
      </div>
      <div class="d-flex d-jadwal_form">
        <div class="form-display">
          <div class="table-responsive-sm insert-form-body shadow pad-jadwal_form" >
            <form action="proses_mhs_jadwal.php?q=insert" method="POST" enctype="multipart/form-data">
              <fieldset>
                <legend class="text-center">Form Pemilihan Pertama</legend> </br>
                <b>Pilih Jadwal Kuliah Dengan Bijak</b>
                  <table>
                    <tr>
                      <td><div class="td-space">NIM</div></td>
                      <td><div class="td-space">:</div></td>
                      <td><input class="form-input td-space" type="text" name="nim" id="nim" value="<?php echo $data['nim'] ?>" readonly></td>
                    </tr>
                    <tr>
                      <td><div class="td-space">Mata kuliah</div></td>
                      <td><div class="td-space">:</div></td>
                      <td>
                        <select class="form-input td-space" name="kode_jadwal" id="kode_jadwal">
                        <!--Buat option-->
                          <?php
                            foreach($cmhsJadwal->print_option_pertama() as $tampil) {
                          ?>
                            <option 
                              value="<?php echo $tampil['kode_jadwal']; ?>">
                                <?php echo $tampil['nama_matakuliah']; ?>
                                ||  
                                <?php echo $tampil['nama_hari']; ?>
                                ||
                                <?php echo $tampil['jam']; ?>
                            </option>
                          <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>
                        <!-- button submit -->
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
        <!-- FORM KEDUA   -->
        <div class="form-display">
          <div class="table-responsive-sm insert-form-body shadow pad-jadwal_form" >
            <form action="proses_mhs_jadwal.php?q=insert" method="POST" enctype="multipart/form-data">
              <fieldset>
                <legend class="text-center">Form Pemilihan Kedua</legend> </br>
                <b>Pilih Jadwal Kuliah Dengan Bijak</b>
                  <table>
                    <tr>
                      <td><div class="td-space">NIM</div></td>
                      <td><div class="td-space">:</div></td>
                      <td><input class="form-input td-space" type="text" name="nim" id="nim" value="<?php echo $data['nim'] ?>" readonly></td>
                    </tr>
                    <tr>
                      <td><div class="td-space">Mata Kuliah</div></td>
                      <td><div class="td-space">:</div></td>
                      <td> 
                        <select class="form-input td-space" name="kode_jadwal" id="kode_jadwal">
                          <!--Buat option-->
                          <!--Buat option-->
                          <?php
                            foreach($cmhsJadwal->print_option_kedua() as $tampil) {
                          ?>
                            <option 
                              value="<?php echo $tampil['kode_jadwal']; ?>">
                                <?php echo $tampil['nama_matakuliah']; ?>
                                ||  
                                <?php echo $tampil['nama_hari']; ?>
                                ||
                                <?php echo $tampil['jam']; ?>
                            </option>
                          <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>
                        <!-- button submit -->
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
        <!-- FORM KETIGA   -->
        <div class="form-display">
          <div class="table-responsive-sm insert-form-body shadow pad-jadwal_form" >
            <form action="proses_mhs_jadwal.php?q=insert" method="POST" enctype="multipart/form-data">
              <fieldset>
                <legend class="text-center">Form Pemilihan Ketiga</legend> </br>
                <b>Pilih Jadwal Kuliah Dengan Bijak</b>
                  <table>
                    <tr>
                      <td><div class="td-space">NIM</div></td>
                      <td><div class="td-space">:</div></td>
                      <td><input class="form-input td-space" type="text" name="nim" id="nim" value="<?php echo $data['nim'] ?>" readonly></td>
                    </tr>
                    <tr>
                      <td><div class="td-space">Mata kuliah</div></td>
                      <td><div class="td-space">:</div></td>
                      <td>
                        <select class="form-input td-space" name="kode_jadwal" id="kode_jadwal">
                        <!--Buat option-->
                          <?php
                            foreach($cmhsJadwal->print_option_ketiga() as $tampil) {
                          ?>
                            <option 
                              value="<?php echo $tampil['kode_jadwal']; ?>">
                                <?php echo $tampil['nama_matakuliah']; ?>
                                ||  
                                <?php echo $tampil['nama_hari']; ?>
                                ||
                                <?php echo $tampil['jam']; ?>
                            </option>
                          <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td>
                        <!-- button submit -->
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
            text  : 'Class Schedule successfully selected!',
          })
      }
    </script>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>