<?php
  include "proses_class_system.php";
  $cloginAdmin = new loginAdmin();

	if (isset($_POST['submitLogin'])){
		$data = array(
			'username'  => $_POST['username'],
			'password'  => $_POST['password'],
		);
		
		$exec = $cloginAdmin->login_admin($data);
		if($exec){
      //Memulai session
      session_start();
      $_SESSION['username'] = $data['username'];
			header('location: index.php');
		}else{
			header('location: login_admin.php?m=fail');
		}
	}
?>
