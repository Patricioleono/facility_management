<?php require('../phpscript/logigin.php'); ?>
<?php

class ubigeo
{

	public function __construct(){
		$cn= mysql_connect('localhost','root','');
		mysql_select_db('sistema');
	}
	public function cargardepartamentos(){
		$sql= "SELECT id j, piso descri FROM edificio";
		$this->listaroptions($sql);
	}
	public function cargarprovincias($coddep){
		$sql= "SELECT id,sector j, sector descri FROM edificio_sec
		WHERE id = $coddep";
		$this->listaroptions1($sql);

	}
	private function listaroptions($sql)
	{
		
		$id=$_GET['id1'];

	
		$rs= mysql_query($sql);
		while($reg = mysql_fetch_assoc($rs)){
			if($id==$reg['descri']){
						echo "<option value='{$reg['j']}' selected>{$reg['descri']}</option>";}
						else{echo "<option value='{$reg['j']}' >{$reg['descri']}</option>";}
		}
	}
		private function listaroptions1($sql)
	{
		
		$id=urldecode($_GET['id']);
               
		$rs= mysql_query($sql);
			while($reg = mysql_fetch_assoc($rs)){
			if($id==$reg['descri']){
						echo "<option value='{$reg['j']}' selected>{$reg['descri']}</option>";}
						else{echo "<option value='{$reg['j']}' >{$reg['descri']}</option>";}
		}
	}
}
$obubigeo = new ubigeo();
switch ($_GET['accion']){
	case 'carga_dpto';
    $obubigeo->cargardepartamentos();
	break;
	case 'carga_prov';
	$obubigeo->cargarprovincias($_GET['cd']);
	break;
}
?>