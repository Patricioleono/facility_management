function formulario(f) {
if (f.nombreequipo.value   == '') { alert ('Nombre del equipo esta vacio');  
f.nombreequipo.focus(); return false; } 
if (f.tipoequipo.value  == '') { alert ('Tipo de equipo esta vacio'); 
f.tipoequipo.focus(); return false; }
if (f.nombrefabricante.value  == '') { alert ('Nombre del fabricante esta vacio'); 
f.nombrefabricante.focus(); return false; }
if (f.numeromodelo.value  == '') { alert ('Numero del Modelo esta vacio'); 
f.numeromodelo.focus(); return false; }
if (f.numeroserie.value  == '') { alert ('Numero de serie esta vacio'); 
f.numeroserie.focus(); return false; }
if (f.nombreproveedor.value  == '') { alert ('Nombre de Proveedor esta vacio'); 
f.nombreproveedor.focus(); return false; }
if (f.codigoproveedor.value  == '') { alert ('Codigo de Proveedor esta vacio'); 
f.codigoproveedor.focus(); return false; }
if (f.descripcionubicacion.value  == '') { alert ('Descripcion de ubicacion esta vacio'); 
f.descripcionubicacion.focus(); return false; }
if (f.codigoubicacion.value  == '') { alert ('Codigo de ubicacion esta vacio'); 
f.codigoubicacion.focus(); return false; }
if (f.preciocompra.value  == '') { alert ('Precio de compra esta vacio'); 
f.preciocompra.focus(); return false; }
if (f.fechainstalacion.value  == '') { alert ('Fecha de instalacion esta vacio'); 
f.fechainstalacion.focus(); return false; }
if (f.fechacaducidadgarantia.value  == '') { alert ('Fecha de caducidad de la garantia esta vacio'); 
f.fechacaducidadgarantia.focus(); return false; }
if (f.responsablemantenimiento.value  == '') { alert ('Responsable del mantenimiento esta vacio'); 
f.responsablemantenimiento.focus(); return false; }
if (f.estadoequipo.value  == '') { alert ('Estado del equipo esta vacio'); 
f.estadoequipo.focus(); return false; } return true; }
