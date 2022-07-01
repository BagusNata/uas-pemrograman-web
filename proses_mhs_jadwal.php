<?php
include "proses_class_system.php";
$cmhsJadwal = new mhsJadwal();


if ($_GET['q'] == "insert"){
	if (isset($_POST['submitInsert'])){
			$data = array(
				'nim' 				=> $_POST['nim'],
				'kode_jadwal' => $_POST['kode_jadwal'],
			);
													
		$exec = $cmhsJadwal->insert_data($data);
		if($exec){
			header('location: insertMhsJadwal.php?m=success');
		}else{
			echo "<script>alert('Data Gagal Disimpan!'); history.go(-1);</script>";
		}
	}

};
?>