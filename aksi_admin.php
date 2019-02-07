<?php
session_start();
include "koneksi.php";

if(!isset($_SESSION['login'])){
	header('location:login.php');
}

if(isset($_GET['act'])){

	if($_GET['act']=='insert'){
		//simpan inputan form ke variable
		$username = $_POST['username'];
		$password  = md5($_POST['password']);
		$namalengkap = $_POST['namalengkap'];

		//apabila form belum lengkap
		if($username=='' || $_POST['password']=='' || $username==''){
			//header('location:data_admin.php?view=tambah&e=bl');
			echo "Data Anda belum lengkap...!";
		}else{
			//proses simpan data
			$simpan = mysqli_query($konek, "INSERT INTO admin(username,password,namalengkap)VALUES('$username','$password','$namalengkap')");

			if($simpan){
				header('location:data_admin.php?e=sukses');
			}else{
				header('location:data_admin.php?e=gagal');
			}
		}
		
	}elseif($_GET['act']=='update'){
		$idadmin = $_POST['idadmin'];
		$username = $_POST['username'];
		$password  = md5($_POST['password']);
		$namalengkap = $_POST['namalengkap'];

		//apabila form belum lengkap
		if($username== '' || $namalengkap==''){
			//header('location:data_admin.php?view=tambah&e=bl');
			echo "Data Anda belum lengkap...!";
		}else{

			if($_POST['password']==''){
				$update = mysqli_query($konek, "UPDATE admin SET username='$username',
							namalengkap='$namalengkap'
							WHERE idadmin='$idadmin'");
			}else{
				$update = mysqli_query($konek, "UPDATE admin SET username='$username',
							password='$password',
							namalengkap='$namalengkap'
							WHERE idadmin='$idadmin'");
			}

			if($update){
				header('location:data_admin.php?e=sukses');
			}else{
				header('location:data_admin.php?e=gagal');
			}

		}

	}elseif($_GET['act']=='delete'){
		$hapus = mysqli_query($konek, "DELETE FROM admin WHERE idadmin='$_GET[id]' AND idadmin!='1'");

		if($hapus){
			header('location:data_admin.php?e=sukses');
		}else{
			header('location:data_admin.php?e=gagal');
		}
	}else{
		header('location:data_admin.php');
	}

}else{
	header('location:data_admin.php');
}	
?>