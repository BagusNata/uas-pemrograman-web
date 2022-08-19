<?php

include "proses_class_system.php";
$cmahasiswa = new mahasiswa();

if ($_GET['q'] == "insert"){
	if (isset($_POST['submitInsert'])){
		$data = array(
			'nim'           => $_POST['nomorIndukMahasiswa'],
			'nama_mhs'      => $_POST['namaMahasiswa'],
			'kode_jurusan'  => $_POST['jurusan'],
			'jenis_kelamin' => $_POST['gender'],
			'alamat'        => $_POST['alamat'],
			'no_hp'         => $_POST['phoneNumber'],
			'email'         => $_POST['email'],
			'nidn'          => $_POST['dosen'],
			'foto'          => $_POST['uploadFoto'],
		);
		
		$exec = $cmahasiswa->insert_data($data);
		if($exec){
			header('location: insertMhs.php?m=new');
		}else{
			echo "<script>alert('Data Gagal Disimpan!'); history.go(-1);</script>";
		}
	}

}else if($_GET['q'] == "update"){
	if (isset($_POST['submitUpdate'])){
		$data = array(
			'nim'           => $_POST['nomorIndukMahasiswa'],
			'nama_mhs'      => $_POST['namaMahasiswa'],
			'kode_jurusan'  => $_POST['jurusan'],
			'jenis_kelamin' => $_POST['gender'],
			'alamat'        => $_POST['alamat'],
			'no_hp'         => $_POST['phoneNumber'],
			'email'         => $_POST['email'],
			'nidn'          => $_POST['dosen'],
			'foto'          => $_POST['uploadFoto'],
		);
		
		$exec = $cmahasiswa->update_data($data);
		if($exec){
			header('location: index.php?m=update');
		}else{
			echo "<script>alert('Data Gagal Diupdate!'); history.go(-1);</script>";
		}
	}

}else{
	$nim = $_GET['nim'];
	$cmahasiswa->delete_data($nim);
	$exec = $cmahasiswa->delete_data($nim);
		if($exec){
			header('location: index.php?m=update');
		}else{
			echo "<script>alert('Data Gagal Dihapus!'); history.go(-1);</script>";
		}
}
?>