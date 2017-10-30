<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Sistem Pendukung Keputusan Makanan</title>
		<link rel="shortcut icon" href="<?php echo base_url("image/favicon.ico"); ?>"/>
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css"); ?>">
	   	
	   	<script type="text/javascript" src="<?php echo base_url("assets/bootstrap/js/jquery-3.2.1.min.js"); ?>"></script>
	   	<script type="text/javascript" src="<?php echo base_url("assets/bootstrap/js/dataTables.bootstrap4.min.js"); ?>"></script>
	   	<script type="text/javascript" src="<?php echo base_url("assets/bootstrap/js/jquery.dataTables.min.js"); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js"); ?>"></script>

	</head>

	<body class="container-fluid">
		<ul>
			<li><h4><a href="<?php echo base_url('index.php/kriteria')?>">Kriteria</a></h4>
			</li>

			<li><h4><a href="<?php echo base_url('index.php/alternatif')?>">Alternatif</a></h4>
			</li>

			<li><h4><a href="<?php echo base_url('index.php/nilai')?>">Nilai</a></h4>
		</ul>
			
	</body>
	<script type="text/javascript">

	</script>
</html>