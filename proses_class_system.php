<?php
include "koneksi.php";

class signup extends database{
	function new_user($data){
		$qry = "INSERT INTO user 
						VALUES ('". "' ,
							'".$data['fullname']."' , '".$data['username']."' ,
							'".$data['email']."' 	  , '".$data['password']."' 	
						)" or die(mysqli_error($this->conn));
		$exec = mysqli_query($this->conn, $qry);
		return $exec;
	}
};

class login extends database{
	function login_user($data){
		$qry = "SELECT * FROM user 
        		WHERE (username = '".$data['username']."' OR email = '".$data['username']."') 
						AND password = '".$data['password']."' "  or die(mysqli_error($this->conn));
		$exec = mysqli_query($this->conn, $qry);
		$data = mysqli_fetch_array($exec);
		return $data;
	}
};

class loginAdmin extends database{
	function login_admin($data){
		$qry = "SELECT * FROM admin 
        		WHERE (username = '".$data['username']."' OR email = '".$data['username']."') 
						AND password = '".$data['password']."' "  or die(mysqli_error($this->conn));
		$exec = mysqli_query($this->conn, $qry);
		$data = mysqli_fetch_array($exec);
		return $data;
	}
};

class mahasiswa extends database{

	function __construct(){
		parent::__construct();

		//memulai session
    session_start();
    //belum login
    if(empty($_SESSION['username'])){
      $_SESSION['username'] = $data['username'];
      header('location: login.php?m=timeout');
    }
	}

	function select_data(){
		$qry = "SELECT m.*, j.nama_jurusan, d.nama_dosen
						FROM mahasiswa AS m
						INNER JOIN jurusan AS j
						ON m.kode_jurusan = j.kode_jurusan
						INNER JOIN dosen AS d
						ON m.nidn = d.nidn
						ORDER BY m.nim";
    $exec = mysqli_query($this->conn, $qry);
					
		while($tampil = mysqli_fetch_assoc($exec)){
			$data[] = $tampil;
		}
		return $data;
	}

	function search_data(){
		if(isset($_POST['submit-search'])) {
      $search = mysqli_real_escape_string($this->conn, $_POST['search']);
			$qry = "SELECT DISTINCT m.*, j.nama_jurusan, d.nama_dosen
						FROM mahasiswa AS m
						INNER JOIN jurusan AS j
						ON m.kode_jurusan = j.kode_jurusan
						INNER JOIN dosen AS d
						ON m.nidn = d.nidn
						WHERE
							m.nim           LIKE '%$search%' OR m.nama_mhs      LIKE '%$search%' OR
						  m.jenis_kelamin LIKE '%$search%' OR m.alamat        LIKE '%$search%' OR 
							m.no_hp         LIKE '%$search%' OR m.email         LIKE '%$search%' OR 
							j.nama_jurusan  LIKE '%$search%' OR d.nama_dosen    LIKE '%$search%'

						ORDER BY m.nim";
			$exec = mysqli_query($this->conn, $qry);
			$qryResult = mysqli_num_rows($exec);
						
			if ($qryResult > 0){
				while($tampil = mysqli_fetch_assoc($exec)){
					$data[] = $tampil;
				}
				return $data;
			} else {
				echo "<p style='color:white; font-size:larger;'> Data tidak ditemukan! </p>";
			}
		}
	}

	function insert_data($data){
		//Proses upload foto dan file
			$file = $_FILES['uploadFoto'];

			$fileName     = $_FILES['uploadFoto']['name'];
			$fileTmpName  = $_FILES['uploadFoto']['tmp_name'];
			$fileSize     = $_FILES['uploadFoto']['size'];
			$fileError    = $_FILES['uploadFoto']['error'];
			$fileType     = $_FILES['uploadFoto']['type'];

			$fileExt = explode('.', $fileName);
			$fileActualExt = strtolower(end($fileExt));

			$allowed = array('jpg', 'jpeg', 'png');

			if ($fileTmpName == NULL) {
			//kalo gk submit foto
				//Proses upload data ke database
				$qry = "INSERT INTO mahasiswa 
						VALUES ( 
							'".$data['nim']."' 				 	, '".$data['nama_mhs']."' 			,
							'".$data['kode_jurusan']."'	, '".$data['jenis_kelamin']."' 	,
							'".$data['alamat']."' 			, '".$data['no_hp']."' 					,
							'".$data['email']."' 				, '".$data['nidn']."'						,
							'". "'
						)" or die(mysqli_error($this->conn));
						$exec = mysqli_query($this->conn, $qry);
						return $exec;
			} else {
				//kalo submit foto
				if(in_array($fileActualExt, $allowed)) {
					if($fileError === 0) {
						if($fileSize < 500000) {
							$fileNewName = "Profile" . $data['nim'] . "." . $fileActualExt;
							$fileDestination = 'Assets/UploadFoto/' . $fileNewName;
							move_uploaded_file($fileTmpName, $fileDestination);
							//Proses upload data ke database
							$qry = "INSERT INTO mahasiswa 
							VALUES ( 
								'".$data['nim']."' 				 	, '".$data['nama_mhs']."' 			,
								'".$data['kode_jurusan']."'	, '".$data['jenis_kelamin']."' 	,
								'".$data['alamat']."' 			, '".$data['no_hp']."' 					,
								'".$data['email']."' 				, '".$data['nidn']."'						,
								'".$fileNewName."'
							)" or die(mysqli_error($this->conn));
							$exec = mysqli_query($this->conn, $qry);
							return $exec;
						} else {
							echo "Maaf, foto terlalu besar, maximal size 50 MB";
						}
					} else {
						echo "Maaf, terjadi error saat upload file!";
					}
				} else {
					echo "Maaf, type file ini tidak diijinkan!";
				}
		};	
	}

	function print_option_jurusan(){
		$qry = "SELECT * FROM jurusan";
    $exec = mysqli_query($this->conn, $qry);
					
		while($tampil = mysqli_fetch_assoc($exec)){
			$data[] = $tampil;
		}
		return $data;
	}

	function print_option_dosen(){
		$qry = "SELECT * FROM dosen";
    $exec = mysqli_query($this->conn, $qry);
					
		while($tampil = mysqli_fetch_assoc($exec)){
			$data[] = $tampil;
		}
		return $data;
	}

	function delete_data($nim){
		$qry = "DELETE FROM mahasiswa 
						WHERE nim = '$nim'" 
						or die(mysqli_error($this->conn));
		$exec = mysqli_query($this->conn, $qry);
		return $exec;
	}

	function edit($nim){
		$qry = "SELECT * FROM mahasiswa
						WHERE nim = '$nim'" 
						or die(mysqli_error($this->conn));
		$exec = mysqli_query($this->conn, $qry);
		$data= mysqli_fetch_assoc($exec);
		return $data;
	}

	function update_data($data){
		$file = $_FILES['uploadFoto'];

    $fileName     = $_FILES['uploadFoto']['name'];
    $fileTmpName  = $_FILES['uploadFoto']['tmp_name'];
    $fileSize     = $_FILES['uploadFoto']['size'];
    $fileError    = $_FILES['uploadFoto']['error'];
    $fileType     = $_FILES['uploadFoto']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if ($fileTmpName == NULL) {
      //kalo gk submit foto
      //Proses upload data ke database
        $qry = "UPDATE mahasiswa
          	SET nama_mhs 			= '".$data['nama_mhs']."' 			, kode_jurusan 	= '".$data['kode_jurusan']."'	,
								jenis_kelamin = '".$data['jenis_kelamin']."'  , alamat 				= '".$data['alamat']."' 			,
								no_hp 		 		= '".$data['no_hp']."' 		 			, email 				= '".$data['email']."' 				, 
								nidn 		 		= '".$data['nidn']."'							
          	WHERE nim = '".$data['nim']."' "
						or die(mysqli_error($this->conn));
				$exec = mysqli_query($this->conn, $qry);
				return $exec;
    } else {
      //kalo submit foto
      if(in_array($fileActualExt, $allowed)) {
        if($fileError === 0) {
          if($fileSize < 500000) {
            $fileNewName = "Profile" . $data['nim'] . "." . $fileActualExt;
            $fileDestination = 'Assets/UploadFoto/' . $fileNewName;
            move_uploaded_file($fileTmpName, $fileDestination);
            //Proses upload data ke database
            $qry = "UPDATE mahasiswa
          	SET nama_mhs 			= '".$data['nama_mhs']."' 			, kode_jurusan 	= '".$data['kode_jurusan']."'	,
								jenis_kelamin = '".$data['jenis_kelamin']."'  , alamat 				= '".$data['alamat']."' 			,
								no_hp 		 		= '".$data['no_hp']."' 		 			, email 				= '".$data['email']."' 				, 
								nidn 		 		= '".$data['nidn']."'							, foto          = '".$fileNewName."'
          	WHERE nim = '".$data['nim']."' "
						or die(mysqli_error($this->conn));
						$exec = mysqli_query($this->conn, $qry);
						return $exec;
          } else {
              echo "Maaf, foto terlalu besar, maximal size 50 MB";
            }
        } else {
            echo "Maaf, terjadi error saat upload file!";
          }
      } else {
          echo "Maaf, type file ini tidak diijinkan!";
      }
    }
	}
};

class jurusan extends database{

	function __construct(){
		parent::__construct();

		//memulai session
    session_start();
    //belum login
    if(empty($_SESSION['username'])){
      $_SESSION['username'] = $data['username'];
      header('location: login.php?m=timeout');
    }
	}

	function select_data(){
		$qry = "SELECT * FROM jurusan";
    $exec = mysqli_query($this->conn, $qry);
					
		while($tampil = mysqli_fetch_assoc($exec)){
			$data[] = $tampil;
		}
		return $data;
	}

	function search_data(){
		if(isset($_POST['submit-search'])) {
      $search = mysqli_real_escape_string($this->conn, $_POST['search']);
			$qry = "SELECT DISTINCT jurusan.*
          		FROM jurusan 
         		  WHERE
            		jurusan.kode_jurusan LIKE '%$search%' OR 
            		jurusan.nama_jurusan LIKE '%$search%'
          		ORDER BY jurusan.kode_jurusan";
			$exec = mysqli_query($this->conn, $qry);
			$qryResult = mysqli_num_rows($exec);
						
			if ($qryResult > 0){
				while($tampil = mysqli_fetch_assoc($exec)){
					$data[] = $tampil;
				}
				return $data;
			} else {
				echo "<p style='color:white; font-size:larger;'> Data tidak ditemukan! </p>";
			}
		}
	}

	function insert_data($data){
		$qry = "INSERT INTO jurusan 
						VALUES ('".$data['kode_jurusan']."' , '".$data['nama_jurusan']."')" 
						or die(mysqli_error($this->conn));
		$exec = mysqli_query($this->conn, $qry);
		return $exec;
	}

	function delete_data($kode_jurusan){
		$qry = "DELETE FROM jurusan 
						WHERE kode_jurusan = '$kode_jurusan'" 
						or die(mysqli_error($this->conn));
		$exec = mysqli_query($this->conn, $qry);
		return $exec;
	}

	function edit($kode_jurusan){
		$qry = "SELECT * FROM jurusan
						WHERE kode_jurusan = '$kode_jurusan'" 
						or die(mysqli_error($this->conn));
		$exec = mysqli_query($this->conn, $qry);
		$data= mysqli_fetch_assoc($exec);
		return $data;
	}

	function update_data($data){
		$qry = "UPDATE jurusan
          	SET nama_jurusan 	 = '".$data['nama_jurusan']."' 
          	WHERE kode_jurusan = '".$data['kode_jurusan']."' "
						or die(mysqli_error($this->conn));
		$exec = mysqli_query($this->conn, $qry);
		return $exec;
	}
};

class dosen extends database{

	function __construct(){
		parent::__construct();

		//memulai session
    session_start();
    //belum login
    if(empty($_SESSION['username'])){
      $_SESSION['username'] = $data['username'];
      header('location: login.php?m=timeout');
    }
	}

	function select_data(){
		$qry = "SELECT * FROM dosen";
    $exec = mysqli_query($this->conn, $qry);
					
		while($tampil = mysqli_fetch_assoc($exec)){
			$data[] = $tampil;
		}
		return $data;
	}

	function search_data(){
		if(isset($_POST['submit-search'])) {
      $search = mysqli_real_escape_string($this->conn, $_POST['search']);
			$qry = "SELECT DISTINCT dosen.*
            FROM dosen 
            WHERE
              dosen.nidn          LIKE '%$search%' OR dosen.nama_dosen  LIKE '%$search%' OR
              dosen.pendidikan    LIKE '%$search%' OR dosen.tgl_lahir   LIKE '%$search%' OR
              dosen.jenis_kelamin LIKE '%$search%' OR dosen.alamat      LIKE '%$search%' OR 
              dosen.no_hp         LIKE '%$search%' OR dosen.email       LIKE '%$search%'
            ORDER BY dosen.nidn";
			$exec = mysqli_query($this->conn, $qry);
			$qryResult = mysqli_num_rows($exec);
						
			if ($qryResult > 0){
				while($tampil = mysqli_fetch_assoc($exec)){
					$data[] = $tampil;
				}
				return $data;
			} else {
				echo "<p style='color:white; font-size:larger;'> Data tidak ditemukan! </p>";
			}
		}
	}

	function insert_data($data){
		$qry = "INSERT INTO dosen 
						VALUES ( 
							'".$data['nidn']."' 				 , '".$data['nama_dosen']."' 	,
							'".$data['pendidikan']."' 	 , '".$data['tgl_lahir']."' 	,
							'".$data['jenis_kelamin']."' , '".$data['alamat']."' 			,
							'".$data['no_hp']."' 				 , '".$data['email']."'
						)" or die(mysqli_error($this->conn));
		$exec = mysqli_query($this->conn, $qry);
		return $exec;
	}

	function delete_data($nidn){
		$qry = "DELETE FROM dosen 
						WHERE nidn = '$nidn'" 
						or die(mysqli_error($this->conn));
		$exec = mysqli_query($this->conn, $qry);
		return $exec;
	}

	function edit($nidn){
		$qry = "SELECT * FROM dosen
						WHERE nidn = '$nidn'" 
						or die(mysqli_error($this->conn));
		$exec = mysqli_query($this->conn, $qry);
		$data= mysqli_fetch_assoc($exec);
		return $data;
	}

	function update_data($data){
		$qry = "UPDATE dosen
          	SET nama_dosen = '".$data['nama_dosen']."' , pendidikan 	 = '".$data['pendidikan']."' 		,
								tgl_lahir  = '".$data['tgl_lahir']."'  , jenis_kelamin = '".$data['jenis_kelamin']."' ,
								alamat 		 = '".$data['alamat']."' 		 , no_hp 				 = '".$data['no_hp']."' 				, 
								email 		 = '".$data['email']."'
          	WHERE nidn = '".$data['nidn']."' "
						or die(mysqli_error($this->conn));
		$exec = mysqli_query($this->conn, $qry);
		return $exec;
	}
};

class mhsJadwal extends database{

	function __construct(){
		parent::__construct();

		//memulai session
    session_start();
    //belum login
    if(empty($_SESSION['username'])){
      $_SESSION['username'] = $data['username'];
      header('location: login.php?m=timeout');
    }
	}

	function select_data($nim){
		$qry = "SELECT mj.*, jk.*, mk.*, h.nama_hari
						FROM mhs_jadwal AS mj
						INNER JOIN jadwal_kuliah AS jk
						ON mj.kode_jadwal = jk.kode_jadwal
						INNER JOIN matakuliah AS mk
						ON mk.kode_matakuliah = jk.kode_matakuliah	
						INNER JOIN hari AS h
						ON jk.hari = h.kode_hari
						WHERE mj.nim = '$nim'
						ORDER BY jk.hari"
						or die(mysqli_error($this->conn));	;

		$exec = mysqli_query($this->conn, $qry);
		$qryResult = mysqli_num_rows($exec);
					
		if ($qryResult > 0){
			while($tampil = mysqli_fetch_assoc($exec)){
				$data[] = $tampil;
			}
			return $data;
		} else {
			echo "<p style='color:white; font-size:larger;'> Data tidak ditemukan! </p>";
		}
	}

	function auto_insert_nim($nim){
		$qry = "SELECT * FROM mahasiswa
						WHERE nim = '$nim'" 
						or die(mysqli_error($this->conn));
		$exec = mysqli_query($this->conn, $qry);
		$data= mysqli_fetch_assoc($exec);
		return $data;
	}

	function insert_data($data){
		$qry = "INSERT INTO mhs_jadwal 
						VALUES ('". "' , '".$data['nim']."' , '".$data['kode_jadwal']."')" 
						or die(mysqli_error($this->conn));
		$exec = mysqli_query($this->conn, $qry);
		return $exec;
	}

	function print_option_pertama(){
		$qry = "SELECT jk.*, mk.*, h.nama_hari
						FROM jadwal_kuliah AS jk
						INNER JOIN matakuliah AS mk
						ON mk.kode_matakuliah = jk.kode_matakuliah	
						INNER JOIN hari AS h
						ON jk.hari = h.kode_hari
						WHERE jk.kode_matakuliah = 1
						ORDER BY jk.kode_matakuliah";
    $exec = mysqli_query($this->conn, $qry);
					
		while($tampil = mysqli_fetch_assoc($exec)){
			$data[] = $tampil;
		}
		return $data;
	}

	function print_option_kedua(){
		$qry = "SELECT jk.*, mk.*, h.nama_hari
						FROM jadwal_kuliah AS jk
						INNER JOIN matakuliah AS mk
						ON mk.kode_matakuliah = jk.kode_matakuliah	
						INNER JOIN hari AS h
						ON jk.hari = h.kode_hari
						WHERE jk.kode_matakuliah = 2
						ORDER BY jk.kode_matakuliah";
    $exec = mysqli_query($this->conn, $qry);
					
		while($tampil = mysqli_fetch_assoc($exec)){
			$data[] = $tampil;
		}
		return $data;
	}

	function print_option_ketiga(){
		$qry = "SELECT jk.*, mk.*, h.nama_hari
						FROM jadwal_kuliah AS jk
						INNER JOIN matakuliah AS mk
						ON mk.kode_matakuliah = jk.kode_matakuliah	
						INNER JOIN hari AS h
						ON jk.hari = h.kode_hari
						WHERE jk.kode_matakuliah = 3
						ORDER BY jk.kode_matakuliah";
    $exec = mysqli_query($this->conn, $qry);
					
		while($tampil = mysqli_fetch_assoc($exec)){
			$data[] = $tampil;
		}
		return $data;
	}
};

class adminJadwal extends database{

	function __construct(){
		parent::__construct();

		//memulai session
    session_start();
    //belum login
    if(empty($_SESSION['username'])){
      $_SESSION['username'] = $data['username'];
      header('location: login.php?m=timeout');
    }
	}

	function select_data(){
		$qry = "SELECT DISTINCT jk.*, mk.*, h.nama_hari
						FROM jadwal_kuliah AS jk
						INNER JOIN matakuliah AS mk
						ON mk.kode_matakuliah = jk.kode_matakuliah	
						INNER JOIN hari AS h
						ON jk.hari = h.kode_hari
						ORDER BY jk.kode_matakuliah"
						or die(mysqli_error($this->conn));

		$exec = mysqli_query($this->conn, $qry);
		$qryResult = mysqli_num_rows($exec);
					
		if ($qryResult > 0){
			while($tampil = mysqli_fetch_assoc($exec)){
				$data[] = $tampil;
			}
			return $data;
		} else {
			echo "<p style='color:white; font-size:larger;'> Data tidak ditemukan! </p>";
		}
	}

	function insert_data($data){
		$qry = "INSERT INTO jadwal_kuliah 
						VALUES ( 
							'".$data['kode_jadwal']."' , '".$data['kode_matakuliah']."' ,
							'".$data['hari']."' 	 		 , '".$data['jam']."' 						,
							'".$data['kelas']."' 			 , '".$data['ruang']."' 			
						)" or die(mysqli_error($this->conn));
		$exec = mysqli_query($this->conn, $qry);
		return $exec;
	}

	function print_option_hari(){
		$qry = "SELECT * FROM hari";
    $exec = mysqli_query($this->conn, $qry);
					
		while($tampil = mysqli_fetch_assoc($exec)){
			$data[] = $tampil;
		}
		return $data;
	}

	function print_option_matakuliah(){
		$qry = "SELECT * FROM matakuliah";
    $exec = mysqli_query($this->conn, $qry);
					
		while($tampil = mysqli_fetch_assoc($exec)){
			$data[] = $tampil;
		}
		return $data;
	}

	function edit($kode_jadwal){
		$qry = "SELECT DISTINCT jk.*, mk.*, h.*
						FROM jadwal_kuliah AS jk
						INNER JOIN matakuliah AS mk
						ON mk.kode_matakuliah = jk.kode_matakuliah	
						INNER JOIN hari AS h
						ON jk.hari = h.kode_hari
						WHERE kode_jadwal = '$kode_jadwal'
						ORDER BY jk.kode_matakuliah"
						or die(mysqli_error($this->conn));
		$exec = mysqli_query($this->conn, $qry);
		$data= mysqli_fetch_assoc($exec);
		return $data;
	}

	function update_data($data){
		$qry = "UPDATE jadwal_kuliah
          	SET hari  			= '".$data['hari']."'  	, jam 	 = '".$data['jam']."' 	,
								ruang = '".$data['ruang']."' 
          	WHERE kode_jadwal = '".$data['kode_jadwal']."' "
						or die(mysqli_error($this->conn));
		$exec = mysqli_query($this->conn, $qry);
		return $exec;
	}

	function delete_data($kode_jadwal){
		$qry = "DELETE FROM jadwal_kuliah 
						WHERE kode_jadwal = '$kode_jadwal'" 
						or die(mysqli_error($this->conn));
		$exec = mysqli_query($this->conn, $qry);
		return $exec;
	}
};
?>