function formulario(f) {
if (f.idunicaelemento.value   == '') { alert ('ID esta vacio');  
f.idunicaelemento.focus(); return false; } 
if (f.nombreelemento.value  == '') { alert ('Nombre del Elemento esta vacio'); 
f.nombreelemento.focus(); return false; }
if (f.tipoelemento.value  == '') { alert ('Tipo del Elemento esta vacio'); 
f.tipoelemento.focus(); return false; }
if (f.largo.value  == '') { alert ('Largo esta vacio'); 
f.largo.focus(); return false; }
if (f.alto.value  == '') { alert ('Alto esta vacio'); 
f.alto.focus(); return false; }
if (f.ancho.value  == '') { alert ('Ancho esta vacio'); 
f.ancho.focus(); return false; }