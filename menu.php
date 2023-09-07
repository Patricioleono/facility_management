<?php
//$enlace = mysql_connect("localhost:3306","bimcl_calvo2017","bimcalvo2017");
//mysql_select_db("bimcl_cc", $enlace);

$enlace = mysql_connect("localhost:3306","root","");
mysql_select_db("bimcl_cc", $enlace);

$result = mysql_query("
SELECT X.cantidadEventos1, X.cantidadEventos2, X.cantidadEventos3, X.cantidadEventos4, X.cantidadEventos5,
 (X.cantidadEventos1 + X.cantidadEventos2 + X.cantidadEventos3 + X.cantidadEventos4 + X.cantidadEventos5) AS notificacionesTotales
FROM(
	SELECT COUNT(eventDate) AS cantidadEventos1
	, (SELECT COUNT(eventDate) FROM eventcalender2 WHERE checkbox = 0 AND eventDate NOT IN ( 'NULL', '') ) AS cantidadEventos2
	, (SELECT COUNT(eventDate) FROM eventcalenderestructura WHERE checkbox = 0 AND eventDate NOT IN ( 'NULL', '')) AS cantidadEventos3
	, (SELECT COUNT(eventDate) FROM eventcalenderinstalaciones WHERE checkbox = 0 AND eventDate NOT IN ( 'NULL', '')) AS cantidadEventos4
	, (SELECT COUNT(eventDate) FROM eventcalenderelementoarquitectonico WHERE checkbox = 0 AND eventDate NOT IN ( 'NULL', '')) AS cantidadEventos5
	FROM eventcalender 
	WHERE checkbox = 0 
	AND eventDate NOT IN ( 'NULL', '')
    ) X", $enlace);

$row = mysql_fetch_array($result);
?>
<?php
session_start(); 
include_once "conexion1.php";
if(!isset($_SESSION['userid']))
{
  header('location: logout.php'); 
}
$idusuario=$_SESSION["userid"];
$sql23 = "SELECT * FROM usuarios WHERE idusuario = '$idusuario'";
$rec1 = mysql_query($sql23);
$row123 = mysql_fetch_array($rec1);
$tipousuario=$row123['tipousuario'];
$rol = $row123['tipousuario'];

?>
<html>
<head>
  <meta charset="UTF-8">
  <title>Menú</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

   <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

   <link rel="stylesheet" href="css/menu.css">
   <link rel="stylesheet" href="css/fontello.css">


</head>
<body>
<style type="text/css">
.BTN_TRANS 
{ 
background:transparent; 

} 
</style> 
<script language="JavaScript" type="text/javascript">
function click(){
if(event.button==1){
alert('No está permitida esta función');
return false;
}
}
document.onmousedown=click
//-->
</script>
<script language="Javascript">
document.oncontextmenu = function(){return false}
</script>

  <ul id="accordion" class="accordion">
   <?php if($rol == 1){ ?>
       <li>
           <div class="link"><i class="icon-folder-open"></i> Administración <i class="icon-down-open"></i></div>
           <ul class="submenu">
               <!-- li><button type="button" class="accordion-content" onclick="window.open('edificio/piso.php','centro');" value="Pisos y Sectores" name="Pisos y Sectores" > Pisos y Sectores </button></li -->
               <li><button type="button" class="accordion-content" onclick="window.open('administrar_usuarios.php','centro');" value="Administrar Usuarios" name="Administrar Usuarios" > Administrar Usuarios </button></li>
           </ul>
       </li>
       <li>
          <div class="link"><i class="icon-chart-line"></i> Balance <i class="icon-down-open"></i></div>
          <ul class="submenu">
              <li><button type="button" class="accordion-content" onclick="window.open('year.php','centro');" value="Gastos" name="Gastos" > Historial de Gastos </button></li>
              <li><button type="button" class="accordion-content" onclick="window.open('presupuesto.php','centro');" value="Gastos" name="Gastos" > Presupuesto anual</button></li>
          </ul>
      </li>
       <li>
           <div class="link"><i class="icon-hospital"></i> Infraestructura <i class="icon-down-open"></i></div>
           <ul class="submenu">
               <li><button type="button" class="accordion-content" onclick="window.open('mod_e_arquitectonico/e_arquitectonicos.php','centro');" value="Elementos Arquitectónicos" name="Elementos Arquitectónicos" > Arquitectura </button></li>
               <li><button type="button" class="accordion-content" onclick="window.open('mod_estructura/estructura.php','centro');" value="Estructura" name="Estructura" > Estructura </button></li>
               <li><button type="button" class="accordion-content" onclick="window.open('mod_instalacion/mdins.php?tipo=<?php echo $tipousuario ?>','centro');" value="Instalaciones" name="Instalaciones" > Especialidades </button></li>
               <li><button type="button" class="accordion-content" onclick="window.open('mod_inventario/mdi.php','centro');" value="Gestión de Equipos Médicos" name="Gestión de Equipos Médicos">Equipos Médicos </button></li>
           </ul>
       </li>
      <li>
          <div class="link"><i class="icon-cog-alt"></i> Repuestos <i class="icon-down-open"></i></div>
          <ul class="submenu">
              <li><button type="button" class="accordion-content" onclick="window.open('mod_repuestos/mdr.php','centro');" title="mdr.php?tipo=<?php echo $tipousuario?>" value="Estructura" name="Estructura" > Repuestos Médicos </button></li>
          </ul>
      </li>
      <li>
          <div class="link"><i class="icon-folder-open"></i> Servicios generales <i class="icon-down-open"></i></div>
          <ul class="submenu">
              <li><button type="button" class="accordion-content" onclick="window.open('correo_servicios.php','centro');" value="Gastos" name="Gastos" > Correo Interno </button></li>
          </ul>
      </li>
      <li>
          <div class="link"><i class="icon-bell-1"></i> Notificaciones de Tareas (<?= $row['notificacionesTotales']; ?>)<i class="icon-down-open"></i></div>
          <ul class="submenu">
              <li><button type="button" class="accordion-content" onclick="window.open('notificaciones/notificaciones.php','centro');" value="Mantenimiento Equipos" name="Mantenimiento Equipos" > Mantenimiento Equipos Médicos (<?= $row['cantidadEventos1']; ?>) </button></li>
              <li><button type="button" class="accordion-content" onclick="window.open('notificaciones/notificaciones_e.php','centro');" value="Mantenimiento Equipos" name="Mantenimiento Equipos" > Mantenimiento Estructural (<?= $row['cantidadEventos3']; ?>) </button></li>
              <li><button type="button" class="accordion-content" onclick="window.open('notificaciones/notificaciones_e_a.php','centro');" value="Mantenimiento Equipos" name="Mantenimiento Equipos" > Mantenimiento Elementos Arquitectonicos (<?= $row['cantidadEventos5'];?>) </button></li>
              <li><button type="button" class="accordion-content" onclick="window.open('notificaciones/notificaciones_i.php','centro');" value="Mantenimiento Equipos" name="Mantenimiento Equipos" > Mantenimiento Instalaciones y Equipos (<?= $row['cantidadEventos4'];  ?>) </button></li>

          </ul>
      </li>
      <li>
          <div class="link"><button type="button" class="accordion-content" onclick="window.open('modelo3D/chch.php','_blank');" value="Modelo3D" name="Modelo3D" > Modelo 3D</button>

      </li>
   <?php } elseif($rol == 3){?>
       <li>
           <div class="link"><i class="icon-folder-open"></i> Servicios generales <i class="icon-down-open"></i></div>
           <ul class="submenu">
               <li><button type="button" class="accordion-content" onclick="window.open('correo_servicios.php','centro');" value="Gastos" name="Gastos" > Correo Interno </button></li>
           </ul>
       </li>
      <li>
          <div class="link"><button type="button" class="accordion-content" onclick="window.open('modelo3D/chch.php','_blank');" value="Modelo3D" name="Modelo3D" > Modelo 3D</button>

      </li>

  <?php } elseif($rol == 4){?>
       <li>
           <div class="link"><i class="icon-chart-line"></i> Balance <i class="icon-down-open"></i></div>
           <ul class="submenu">
               <li><button type="button" class="accordion-content" onclick="window.open('year.php','centro');" value="Gastos" name="Gastos" > Historial de Gastos </button></li>
               <li><button type="button" class="accordion-content" onclick="window.open('presupuesto.php','centro');" value="Gastos" name="Gastos" > Presupuesto anual</button></li>
           </ul>
       </li>
       <li>
           <div class="link"><i class="icon-folder-open"></i> Servicios generales <i class="icon-down-open"></i></div>
           <ul class="submenu">
               <li><button type="button" class="accordion-content" onclick="window.open('correo_servicios.php','centro');" value="Gastos" name="Gastos" > Correo Interno </button></li>
           </ul>
       </li>
       <li>
           <div class="link"><i class="icon-bell-1"></i> Notificaciones de Tareas (<?= $row['notificacionesTotales']; ?>)<i class="icon-down-open"></i></div>
           <ul class="submenu">
               <li><button type="button" class="accordion-content" onclick="window.open('notificaciones/notificaciones.php','centro');" value="Mantenimiento Equipos" name="Mantenimiento Equipos" > Mantenimiento Equipos Médicos (<?= $row['cantidadEventos1']; ?>) </button></li>
               <li><button type="button" class="accordion-content" onclick="window.open('notificaciones/notificaciones_e.php','centro');" value="Mantenimiento Equipos" name="Mantenimiento Equipos" > Mantenimiento Estructural (<?= $row['cantidadEventos3']; ?>) </button></li>
               <li><button type="button" class="accordion-content" onclick="window.open('notificaciones/notificaciones_e_a.php','centro');" value="Mantenimiento Equipos" name="Mantenimiento Equipos" > Mantenimiento Elementos Arquitectonicos (<?= $row['cantidadEventos5'];?>) </button></li>
               <li><button type="button" class="accordion-content" onclick="window.open('notificaciones/notificaciones_i.php','centro');" value="Mantenimiento Equipos" name="Mantenimiento Equipos" > Mantenimiento Instalaciones y Equipos (<?= $row['cantidadEventos4'];  ?>) </button></li>

           </ul>
       </li>
       <li>
           <div class="link"><button type="button" class="accordion-content" onclick="window.open('modelo3D/chch.php','_blank');" value="Modelo3D" name="Modelo3D" > Modelo 3D</button>
       </li>

  <?php }elseif ($rol == 2){ ?>

      <li>
          <div class="link"><button type="button" class="accordion-content" onclick="window.open('modelo3D/chch.php','_blank');" value="Modelo3D" name="Modelo3D" > Modelo 3D</button>
      </li>
   <?php echo "<script>window.open('modelo3D/chch.php')</script>";}?>
  </ul>

  <script src="js/jquery.min.js"></script>
  <script src="js/main.js"></script>

</body>
</html>