<?php
require_once"../script/verifSesion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<!-- Plantilla -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?= base_url('../css/template/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet') ?>">
	<link href="<?= base_url('../css/template/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet') ?>">
	<link href="<?= base_url('../css/template/dist/css/timeline.css" rel="stylesheet') ?>">
	<link href="<?= base_url('../css/template/dist/css/sb-admin-2.css" rel="stylesheet') ?>">
	<link href="<?= base_url('../css/template/bower_components/morrisjs/morris.css" rel="stylesheet') ?>">
	<link href="<?= base_url('../css/template/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css') ?>">
	<link href="<?= base_url('../css/template/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet') ?>">
	<link href="<?= base_url('../css/template/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet') ?>">
	<link href="<?= base_url('../css/template/bower_components/datepicker/css/bootstrap-datepicker3.standalone.min.css" rel="stylesheet') ?>">
	<script src="<?= base_url('../css/template/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- Fin plantilla -->

<!-- Inicio css Modulos Gestion Planificaion -->
	<link href="<?= base_url('../css/palete.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('../css/sigpa.css') ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('../css/popup.css') ?>" rel="stylesheet" type="text/css" />
<!-- fin css Modulos Gestion Planificaion -->

<!-- Inicio css Modulos Horarios -->
	<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css" />
	<script src="<?= base_url('assets/js/script.js') ?>"></script>
<!-- Fin css Modulos Horarios -->
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
					<li>
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Horario<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?= site_url('Schedule/index') ?>">Secciones</a></li>
							<li><a href="<?= site_url('Schedule/index') ?>">Profesores</a></li>
						</ul>
					</li>
					<li>
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Edificio<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?= site_url('Building/view') ?>">Ver</a></li>
							<li><a href="<?= site_url('Building/insert') ?>">Insertar</a></li>
						</ul>
					</li>

					<li>
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Salon<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="<?= site_url('Class_room/view') ?>">Ver</a></li>
							<li><a href="<?= site_url('Class_room/insert') ?>">Insertar</a></li>
						</ul>
					</li>

					<li>
						<a class="dropdown-toggle" data-toggle="dropdown" href="#"> Reportes <span class="caret"></span> </a>
						<ul class="dropdown-menu">
							<li><a href="<?= site_url('Reports/index') ?>">Salon</a></li>
							<li><a href="<?= site_url('Reports/index') ?>">Docente</a></li>
							<li><a href="<?= site_url('Reports/index') ?>">Edificio</a></li>
						</ul>
					</li>
				</ul>


				<style>
					.dropdown-menu
					{
						width: 100%;
					}
				</style>