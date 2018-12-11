<!DOCTYPE html>
<html>
<head>
	<title>Agregar_Rutas</title>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbfC53EmWUkFjFc0jH3tW7zuhEhQ4GVUk"
    async defer></script>
	<?php require('../../librerias.php'); ?>
	<?php require('ctrl_rutas.php'); ?>
	<style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 85%;
   		width: 55%;
      }
    </style>
</head>
<body>
	<h1>Rutas / Agregar Rutas /</h1>
	<div id="map"></div>
	<?php $direccion = direccion(); ?>
	<script>initMap();</script>
	<script>changeCenterMap(<?php echo "'".$direccion[0][0]."'"; ?>);</script>
	<script>Marker(<?php echo "'".$direccion[0][0]."'"; ?>);</script>
</body>
</html>