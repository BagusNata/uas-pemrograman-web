<?php

include "proses_class_system.php";
$cdosen = new dosen();

if ($_GET['q'] == "insert"){
	if (isset($_POST['submitInsert'])){
		$data = array(
			'nidn' 					=> $_POST['nidn'],
			'nama_dosen' 		=> $_POST['nama_dosen'],
			'pendidikan' 		=> $_POST['pendidikan'],
			'tgl_lahir' 		=> $_POST['tgl_lahir'],
			'jenis_kelamin' => $_POST['gender'],
			'alamat' 				=> $_POST['alamat'],
			'no_hp' 				=> $_POST['phone_number'],
			'email' 				=> $_POST['email'],
		);
		
		$exec = $cdosen->insert_data($data);
		if($exec){
			header('location: selectDosen.php?m=new');
		}else{
			echo "<script>alert('Data Gagal Disimpan!'); history.go(-1);</script>";
		}
	}

}else if($_GET['q'] == "update"){
	if (isset($_POST['submitUpdate'])){
		$data = array(
			'nidn' 					=> $_POST['nidn'],
			'nama_dosen' 		=> $_POST['nama_dosen'],
			'pendidikan' 		=> $_POST['pendidikan'],
			'tgl_lahir' 		=> $_POST['tgl_lahir'],
			'jenis_kelamin' => $_POST['gender'],
			'alamat' 				=> $_POST['alamat'],
			'no_hp' 				=> $_POST['phone_number'],
			'email' 				=> $_POST['email'],
		);
		
		$exec = $cdosen->update_data($data);;
		if($exec){
			header('location: selectDosen.php?m=update');
		}else{
			echo "<script>alert('Data Gagal Diupdate!'); history.go(-1);</script>";
		}
	}

}else{
	$nidn = $_GET['nidn'];
	$cdosen->delete_data($nidn);
	$exec = $cdosen->delete_data($nidn);
		if($exec){
			header('location: selectDosen.php?m=delete');
		}else{
			echo "<script>alert('Data Gagal Dihapus!'); history.go(-1);</script>";
		}
}
?>