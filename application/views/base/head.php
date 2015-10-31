<?php
require_once"../script/verifSesion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<!-- Plantilla -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?= base_url('assets/css/template/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet') ?>">
	<link href="<?= base_url('assets/css/template/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet') ?>">
	<link href="<?= base_url('assets/css/template/dist/css/timeline.css" rel="stylesheet') ?>">
	<link href="<?= base_url('assets/css/template/dist/css/sb-admin-2.css" rel="stylesheet') ?>">
	<link href="<?= base_url('assets/css/template/bower_components/morrisjs/morris.css" rel="stylesheet') ?>">
	<link href="<?= base_url('assets/css/template/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css') ?>">
	<link href="<?= base_url('assets/css/template/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet') ?>">
	<link href="<?= base_url('assets/css/template/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet') ?>">
	<link href="<?= base_url('assets/css/template/bower_components/datepicker/css/bootstrap-datepicker3.standalone.min.css" rel="stylesheet') ?>">
	<!-- Fin plantilla -->
	<link href="/css/popup.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css" />
	<script src="<?= base_url('assets/lib/dinamico.js') ?>"></script>
</head>
<body>
	<div id="wrapper">
		<!-- Contenido -->
		<div id="page-wrapper" style="margin: 0px; border-left: none;">
			<div>
				<!--inicio de pestañas-->
				<div class="col-lg-12">
					<h1 class="page-header">Horarios</h1><br>
				</div>

				<ul class="nav nav-tabs nav-justified nav-pills">
					<li class="<?= $schedule ?>"><a href="<?= site_url('schedule/index') ?>">Horarios</a></li>
					<li class="<?= $physicalPlant ?>" ><a href="<?= site_url('PhysicalPlant/index') ?>">Edificio/Salon</a></li>
					<li class="dropdown <?= $reports ?>">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"> Reportes <span class="caret"></span> </a>
						<ul class="dropdown-menu">
							<li><a href="<?= site_url('Reports/index') ?>">Salon</a></li>
							<li><a href="<?= site_url('Reports/index') ?>">Docente</a></li>
							<li><a href="<?= site_url('Reports/index') ?>">Edificio</a></li>
						</ul>
					</li>
				</ul>