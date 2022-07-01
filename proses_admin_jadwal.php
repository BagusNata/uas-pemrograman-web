<?php
include "proses_class_system.php";
$cadminJadwal = new adminJadwal();


if ($_GET['q'] == "insert"){
	if (isset($_POST['submitInsert'])){
			$data = array(
				'kode_jadwal' 		=> $_POST['kode_jadwal'],
				'kode_matakuliah' => $_POST['kode_matakuliah'],
				'hari' 						=> $_POST['hari'],
				'jam' 						=> $_POST['jam'],
				'kelas' 					=> $_POST['kelas'],
				'ruang' 					=> $_POST['ruang'],
			);
													
		$exec = $cadminJadwal->insert_data($data);
		if($exec){
			header('location: selectAdminJadwal.php?m=success');
		}else{
			echo "<script>alert('Data Gagal Disimpan!'); history.go(-1);</script>";
		}
	}
}else if($_GET['q'] == "update"){
	if (isset($_POST['submitUpdate'])){
		$data = array(
			'kode_jadwal' 		=> $_POST['kode_jadwal'],
				'kode_matakuliah' => $_POST['kode_matakuliah'],
				'hari' 						=> $_POST['hari'],
				'jam' 						=> $_POST['jam'],
				'kelas' 					=> $_POST['kelas'],
				'ruang' 					=> $_POST['ruang'],
		);
		
		$exec = $cadminJadwal->update_data($data);
		if($exec){
			header('location: selectAdminJadwal.php?m=updated');
		}else{
			echo "<script>alert('Data Gagal Diupdate!'); history.go(-1);</script>";
		}
	}

}else{
	$kode_jadwal = $_GET['kode_jadwal'];
	$cadminJadwal->delete_data($kode_jadwal);
	$exec = $cadminJadwal->delete_data($kode_jadwal);
		if($exec){
			header('location: selectAdminJadwal.php?m=deleted');
		}else{
			echo "<script>alert('Data Gagal Dihapus!'); history.go(-1);</script>";
		}
}
?>