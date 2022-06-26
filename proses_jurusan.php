<?php

include "proses_class_system.php";
$cjurusan = new jurusan();

if ($_GET['q'] == "insert"){
	if (isset($_POST['submitInsert'])){
		$data = array(
			'kode_jurusan' => $_POST['kode_jurusan'],
			'nama_jurusan' => $_POST['nama_jurusan'],
		);
		
		$exec = $cjurusan->insert_data($data);
		if($exec){
			header('location: selectJurusan.php?m=new');
		}else{
			echo "<script>alert('Data Gagal Disimpan!'); history.go(-1);</script>";
		}
	}

}else if($_GET['q'] == "update"){
	if (isset($_POST['submitUpdate'])){
		$data = array(
			'kode_jurusan' => $_POST['kode_jurusan'],
			'nama_jurusan' => $_POST['nama_jurusan'],
		);
		
		$exec = $cjurusan->update_data($data);;
		if($exec){
			header('location: selectJurusan.php?m=update');
		}else{
			echo "<script>alert('Data Gagal Diupdate!'); history.go(-1);</script>";
		}
	}

}else{
	$kode_jurusan = $_GET['kode_jurusan'];
	$cjurusan->delete_data($kode_jurusan);
	$exec = $cjurusan->delete_data($kode_jurusan);
		if($exec){
			header('location: selectJurusan.php?m=delete');
		}else{
			echo "<script>alert('Data Gagal Dihapus!'); history.go(-1);</script>";
		}
}
?>