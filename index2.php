<?php 
session_start(); 
//include_once "conexion1.php";
include_once "conexion2.php";

function verificar_login($user,$password,&$result,&$tipousuario)
{
    try{
        $sql = "SELECT * FROM usuarios WHERE usuario = ? and password = ?";

        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", trim(preg_replace('/[0-9][=]/', $user)));
        $stmt->bind_param("s", trim(preg_replace('/[0-9][=]/', $password)));
        $stmt->execute();

        $count = 0;
        while ($row = mysqli_fetch_object($stmt)) {
            $count++;
            $result = $row;
        }

        if ($count == 1) {
            return 1;

        } else {
            return 0;
        }
    }catch (Exception $e){
        var_dump($e);
    }

} 
  
if(!isset($_SESSION['userid'])) 
{ 
    if(isset($_POST['Ingresar'])) 
    { 
        if(verificar_login($_POST['user'],$_POST['password'],$result,$tipousuario) == 1) 
        {   
            $_SESSION['userid'] = $result->idusuario;
            echo '<script language="javascript">window.location="modelo3D/Edificio.php"</script>'; 
        } 
        else 
        { 
            echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>'; 
        } 
    } 
?>  
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
  
  <title>Sistema Hospital</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

   <link rel="stylesheet" href="css/login.css">
   <link rel="stylesheet" href="css/fontello.css">

</head>
<body>
<form action="" method="post" class="login">
    <fieldset>

<div align="center"><br>
  <span class="legend"><img src="images/oms.png"  alt="" width="143" height="126" align="left"/><br>
  <img src="images/logobbim.png"  alt="" width="261" height="63" align="right"/></span>

</div>
 
 <div>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>

<div class="input">
    <div>   <span><i class="icon-user"></i></span> Usuario <input name="user" type="text" ></div> 
</div>
<div class="input">
    <div><span><i class="icon-key-inv"></i></span> Password <input name="password" type="password"></div> 
</div>
<div><input name="Ingresar" type="submit" value="Ingresar" class="box"></div> 
    </form> 
<!-- <div class="forgot">
    <div><a href="#">Has olvidado tu contrase���a?</a></div> -->
<div class="forgot">Contactanos para mas informacion a contacto@bim.cl</div>
    </fieldset>
</body>
</html>
<?php
}else{
echo 'Su cuenta ha sido ingresada correctamente.';
echo'<script language="javascript">window.location="logout.php"</script>';
//header('location: logout.php');
}
?>