<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets/styles.css">
    <link rel="icon" href="Assets/Image/Logo.png" type="image/jpg" />
    <title>Insert Jurusan - Bagus Nata</title>
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
        <h1 class="title2">Jurusan</h1>
      </div> 
      <div class="form-display">
        <div class="table-responsive-sm insert-form-body shadow" >
          <form action="proses_jurusan.php?q=insert" method="POST">
            <fieldset>
              <legend class="text-center">Form Input Data Jurusan</legend> </br>
              <b>Lengkapi Data ini Dengan Benar</b>
                <table>
                  <tr>
                    <td><div class="td-space">Kode Jurursan</div></td>
                    <td><div class="td-space">:</div></td>
                    <td><input class="form-input td-space" type="text" name="kode_jurusan"></td>
                  </tr>
                  <tr>
                    <td><div class="td-space">Nama Jurursan</div></td>
                    <td><div class="td-space">:</div></td>
                    <td><input class="form-input td-space" type="text" name="nama_jurusan"></td>
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
                        id="btn-cancel"> Cancel
                      </button>
                    </td>
                  </tr>
                </table>
            </fieldset>
          </form>
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