<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>LOGIN PENGGUNA</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" integrity="sha384-PmY9l28YgO4JwMKbTvgaS7XNZJ30MK9FAZjjzXtlqyZCqBY6X6bXIkM++IkyinN+" crossorigin="anonymous">

    <-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
     <html>{
  		position: relative;
  		min-height: 100%;
     }

    	body{
    		background: url(assets/img/bg.jpg) no-repeat center fixed;
    		-webkit-background-size: cover;	
    		-moz-background-size: cover;	
    		-o-background-size: cover;
    		background-size: cover;
    	}
    	body > .container{
    		margin-top: 60px;
    	}
    </style>
  </head>
  <body>
    <div class="container">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-primary">
    			<div class="panel-heading">
    				<h3><div class="panel-title"><span class="glyphicon glyphicon-lock"></span>   LOGIN APLIKASI PENGGAJIAN</h3>
    			</div>
    			<div class="panel-body">
    				<center>
    					<img src="assets/img/logorsupa.png"  alt="Logo" width="200px">
    				</center>
    				<hr>

    				<?php
    				if($_SERVER['REQUEST_METHOD']=='POST'){
    				   $user = $_POST['username'];
    				   $pass = $_POST['password'];
    				   $p    = md5($pass);

    				   if($user == '' || $pass ==''){
    				   	?>
    				   	<div class="alert alert-warning"><b>Peringatan!</b> Username dan Password Tidak Boleh Kosong!</div>
    				   	<?php
    				   }else{
    				   	include "koneksi.php";
    				   	$sqllogin = mysqli_query($konek, "SELECT * FROM admin WHERE username='$user' AND password='$p'");
    				   	$jml = mysqli_num_rows($sqllogin);
    				   	$d = mysqli_fetch_array($sqllogin);

    				   	if($jml > 0){
    				   		session_start();
    				   		$_SESSION['login']        = TRUE;
    				   		$_SESSION['id']           = $d['idadmin'];
    				   		$_SESSION['username']     = $d['username'];
    				   		$_SESSION['namalengkap']  = $d['namalengkap'];

 							header('location:./index.php');
 						 	}else{
 						 		?>
 						 		<div class="aler alert-danger"><b>ERROR</b> Ussername dan Password Anda Salah!</div>
 						 		<?php
 						 	}
    				   }	
    				}

    				?>

    				<form action="" method="post" role="form">
    					<div class="form-group">
    						<input type="text" class="form-control" name="username" placeholder="Username">
    					</div>
    					<div class="form-group">
    						<input type="password" class="form-control" name="password" placeholder="Password">	
    					</div>		
    					<div class="form-group">
    						<input type="submit" class="btn btn-primary  btn-lg btn-block" value="Login" ">
    					</div>
    				</form>
    		    </div>
    	    </div>
        </div>
   </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>