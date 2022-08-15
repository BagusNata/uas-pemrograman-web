<?php
  include "proses_class_system.php";
  $clogin = new login();

	if (isset($_POST['submitLogin'])){
		$data = array(
			'username'  => $_POST['username'],
			'password'  => $_POST['password'],
		);
		
		$exec = $clogin->login_user($data);
		if($exec){
      //Memulai session
      session_start();
      $_SESSION['username'] = $data['username'];
			header('location: selectMhs.php?m=success');
		}else{
			header('location: login.php?m=fail');
		}
	}
?>
