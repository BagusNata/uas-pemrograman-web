<?php
  include "proses_class_system.php";
  $csignup = new signup();

  if (isset($_POST['submitInsert'])){
      $data = array(
        'fullname' 	=> $_POST['fullname'],
        'username' 	=> $_POST['username'],
        'email' 		=> $_POST['email'],
        'password' 	=> $_POST['password'],
      );
      
      $exec = $csignup->new_user($data);
      if($exec){
        header('location: login.php');
      }else{
        echo "<script>alert('Data Gagal Disimpan!'); history.go(-1);</script>";
      }
    }
?>