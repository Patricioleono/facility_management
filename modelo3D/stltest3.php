<?php
    require('../conexion.php');
   

?>
<html>
    <head>
        <title>WebGL</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
                font-family: Monospace;
                background-color: #000000;
                margin: 0px;
                overflow: hidden;
            }

            #info {
                color: #fff;
                position: absolute;
                width: 100%;
                display: block;
            }
           #pisos {
                color: #fff;
                 position: fixed;
                 bottom: 0;
                 right: 0;
                width: 100%;
                display: block;
            }
            #stats {
                position: absolute;
                right: 10px;
                top: 5px;
                bottom: 5%;
                color: #fff;
                text-align: left;
                background: rgba(0, 0, 0, 0.5);
                padding: 10px;
                width: 200px;
                height: 95%;
                border: solid 1px black;
                border-radius: 5px;
            }
#stats a:link, a:visited{
text-decoration: none;
color: #70DB93;
font-weight: bold;
}
#stats a:hover {
background: rgba(0, 0, 0, 0.5);
Color: #70DB93;
font-style: italic;
}
#stats a:active{
background: #2A0A0A;
Color: #70DB93;
font-style: normal;
}

        </style>
    </head>

    <body>
        <div id="info">
            <button id="tech" onclick="transparent(techumbre)">Techumbre</button>
            <button id="los" onclick="transparent(losas)">Losas</button>
            <button id="mur" onclick="transparent(muros)">Muros</button>
        </div>
      <div id="pisos">
            <button id="p1" onclick="camarapiso(0)">Primer Piso</button>
            <button id="p2" onclick="camarapiso(1000)">Segundo Piso</button>
            <button id="p3" onclick="camarapiso(2000)">Tercer Piso</button>
            <button id="p4" onclick="camarapiso(3000)">Cuarto Piso</button>

        </div>
        <div id="stats"></div>
        <script src="three.js"></script>
        <script src="OrbitControls.js"></script>
        <script src="Projector.js"></script>
        <script src="STLLoader.js"></script>
        <script src="tween.min.js"></script>
        <script>
            var container;
            var camera, scene, controls, renderer, INTERSECTED;
            var raycast, objects = [], objects2 = [];
            var mouse, controls;
			var i = 1;
            var plane = new THREE.Plane();
            var statsNode = document.getElementById('stats');
            var techumbre, losas, muros, fund, pilares, vigas1p, vigas2p, vigas3p, vigas4p, vigas5p, vigas2pp, vigas3pp, vigas4pp;
			var dirEquipos = [];
            init();
            animate();
            function addGeometry() {
                var loader = new THREE.STLLoader();
                loader.load('edificio/CUBIERTA.stl', function (geometry) {
                    techumbre = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
                    techumbre.opacity = 1;

                    var mesh = new THREE.Mesh(geometry, techumbre);
                    mesh.renderOrder = 1
                    mesh.doubleSided = true;
                    mesh.frustumCulled = false;
                    mesh.position.set(0, 0, 0);
                    mesh.scale.set(0.2, 0.2, 0.2);
                    mesh.castShadow = true;
                    mesh.receiveShadow = true;
					mesh.name = "TECHUMBRE";
                    
                  
                    scene.add(mesh);

                });

                   loader.load('edificio/MUROS.stl', function (geometry) {
                    muros = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
                    muros.opacity = 1;

                    var mesh = new THREE.Mesh(geometry, muros);
                    mesh.renderOrder = 1
                    mesh.doubleSided = true;
                    mesh.frustumCulled = false;
                    mesh.position.set(0, 0, 0);
                    mesh.scale.set(0.2, 0.2, 0.2);
                    mesh.castShadow = true;
                    mesh.receiveShadow = true;
                    mesh.name = "MUROS";                  
                    scene.add(mesh);

                });


                loader.load('edificio/LOSAS.stl', function (geometry) {
                    losas = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
                    losas.opacity = 1;

                    var mesh = new THREE.Mesh(geometry, losas);
                    mesh.renderOrder = 1
                    mesh.doubleSided = true;
                    mesh.frustumCulled = false;
                    mesh.position.set(0, 0, 0);
                    mesh.scale.set(0.2, 0.2, 0.2);
                    mesh.castShadow = true;
                    mesh.receiveShadow = true;
					mesh.name = "LOSAS";
                    objects2.push(mesh);                   
                    scene.add(mesh);

                });
                loader.load('edificio/VIGAS DEFGHIJ_2P.stl', function (geometry) {
                    vigas2pp = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
                    vigas2pp.opacity = 1;

                    var mesh = new THREE.Mesh(geometry, vigas2pp);
                    mesh.renderOrder = 1
                    mesh.doubleSided = true;
                    mesh.frustumCulled = false;
                    mesh.position.set(0, 0, 0);
                    mesh.scale.set(0.2, 0.2, 0.2);
                    mesh.castShadow = true;
                    mesh.receiveShadow = true;
                    mesh.name = "VIGAS DEFGHIJ_2P";                  
                    scene.add(mesh);

                });
                loader.load('edificio/VIGAS DEFGHIJKLM_3P.stl', function (geometry) {
                    vigas3pp = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
                    vigas3pp.opacity = 1;

                    var mesh = new THREE.Mesh(geometry, vigas3pp);
                    mesh.doubleSided = true;
                    mesh.frustumCulled = false;
                    mesh.position.set(0, 0, 0);
                    mesh.scale.set(0.2, 0.2, 0.2);
                    mesh.castShadow = true;
                    mesh.receiveShadow = true;
                    mesh.name = "VIGAS DEFGHIJKLM_3P";                
                    scene.add(mesh);

                });
                loader.load('edificio/VIGAS DEFGHIJKLM_4P.stl', function (geometry) {
                    vigas4pp = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
                    vigas4pp.opacity = 1;

                    var mesh = new THREE.Mesh(geometry, vigas4pp);
                    mesh.renderOrder = 1;
                    mesh.doubleSided = true;
                    mesh.frustumCulled = false;
                    mesh.position.set(0, 0, 0);
                    mesh.scale.set(0.2, 0.2, 0.2);
                    mesh.castShadow = true;
                    mesh.receiveShadow = true;
                    mesh.name = "VIGAS DEFGHIJKLM_4P";                  
                    scene.add(mesh);

                });

loader.load('edificio/FUND.stl', function (geometry) {
                    fund = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
                    fund.opacity = 1;

                    var mesh = new THREE.Mesh(geometry, fund);
                    mesh.renderOrder = 1
                    mesh.doubleSided = true;
                    mesh.frustumCulled = false;
                    mesh.position.set(0, 0, 0);
                    mesh.scale.set(0.2, 0.2, 0.2);
                    mesh.castShadow = true;
                    mesh.receiveShadow = true;
                    mesh.name = "FUND";               
                    scene.add(mesh);

                });

loader.load('edificio/PILARES.stl', function (geometry) {
                    pilares = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
                    pilares.opacity = 1;

                    var mesh = new THREE.Mesh(geometry, pilares);
                    mesh.renderOrder = 1
                    mesh.doubleSided = true;
                    mesh.frustumCulled = false;
                    mesh.position.set(0, 0, 0);
                    mesh.scale.set(0.2, 0.2, 0.2);
                    mesh.castShadow = true;
                    mesh.receiveShadow = true;
                    mesh.name = "PILARES";                  
                    scene.add(mesh);

                });

loader.load('edificio/VIGAS ABC 2P.stl', function (geometry) {
                    vigas2p = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
                    vigas2p.opacity = 1;

                    var mesh = new THREE.Mesh(geometry, vigas2p);
                    mesh.renderOrder = 1
                    mesh.doubleSided = true;
                    mesh.frustumCulled = false;
                    mesh.position.set(0, 0, 0);
                    mesh.scale.set(0.2, 0.2, 0.2);
                    mesh.castShadow = true;
                    mesh.receiveShadow = true;
                    mesh.name = "VIGAS ABC 2P";                
                    scene.add(mesh);

                });

loader.load('edificio/VIGAS ABC 3P.stl', function (geometry) {
                    vigas3p = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
                    vigas3p.opacity = 1;

                    var mesh = new THREE.Mesh(geometry, vigas3p);
                    mesh.renderOrder = 1
                    mesh.doubleSided = true;
                    mesh.frustumCulled = false;
                    mesh.position.set(0, 0, 0);
                    mesh.scale.set(0.2, 0.2, 0.2);
                    mesh.castShadow = true;
                    mesh.receiveShadow = true;
                    mesh.name = "VIGAS ABC 3P";                  
                    scene.add(mesh);

                });

loader.load('edificio/VIGAS ABC 4P.stl', function (geometry) {
                    vigas4p = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
                    vigas4p.opacity = 1;

                    var mesh = new THREE.Mesh(geometry, vigas4p);
                    mesh.renderOrder = 1
                    mesh.doubleSided = true;
                    mesh.frustumCulled = false;
                    mesh.position.set(0, 0, 0);
                    mesh.scale.set(0.2, 0.2, 0.2);
                    mesh.castShadow = true;
                    mesh.receiveShadow = true;
                    mesh.name = "VIGAS ABC 4P";                  
                    scene.add(mesh);

                });

loader.load('edificio/VIGAS ABC 5P.stl', function (geometry) {
                    vigas5p = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
                    vigas5p.opacity = 1;

                    var mesh = new THREE.Mesh(geometry, vigas5p);
                    mesh.renderOrder = 1
                    mesh.doubleSided = true;
                    mesh.frustumCulled = false;
                    mesh.position.set(0, 0, 0);
                    mesh.scale.set(0.2, 0.2, 0.2);
                    mesh.castShadow = true;
                    mesh.receiveShadow = true;
                    mesh.name = "VIGAS ABC 5P";               
                    scene.add(mesh);

                });

loader.load('edificio/VIGAS ABC 1P.stl', function (geometry) {
                    vigas1p = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
                    losas.opacity = 1;

                    var mesh = new THREE.Mesh(geometry, vigas1p);
                    mesh.renderOrder = 1
                    mesh.doubleSided = true;
                    mesh.frustumCulled = false;
                    mesh.position.set(0, 0, 0);
                    mesh.scale.set(0.2, 0.2, 0.2);
                    mesh.castShadow = true;
                    mesh.receiveShadow = true;
                    mesh.name = "VIGAS ABC 1P";
                    scene.add(mesh);

                });





        }
         function equipos(stl,nombreequipo,estadoequipo,piso,tipoequipo,nombrefabricante,numeromodelo,nombreproveedor,codigoubicacion)
        {
          
            var loader = new THREE.STLLoader();
            var dir = "equipos/";
            var formato = ".stl";
            var direccion = dir.concat(stl,formato);
                    loader.load(direccion, function (geometry) {
                    if(estadoequipo=="BUENO")
                    {
                    stlequipos = new THREE.MeshLambertMaterial({color: 0x0000FF, transparent: true, opacity: 1});
                    stlequipos.opacity = 1;
                    }
                    else
                    {
                    stlequipos = new THREE.MeshLambertMaterial({color: 0xFF0000, transparent: true, opacity: 1});
                    stlequipos.opacity = 1;
                    }
                    var mesh = new THREE.Mesh(geometry, stlequipos);
                    mesh.frustumCulled = false;
                    mesh.position.set(0, 0, 0);
                    mesh.scale.set(0.2, 0.2, 0.2);
                    //mesh.castShadow = true;
                    //mesh.receiveShadow = true;
                    mesh.name = stl;
                    mesh.userData.nombreequipo = nombreequipo;
                    mesh.userData.estadoequipo = estadoequipo;
                    mesh.userData.tipoequipo = tipoequipo;
                    mesh.userData.nombrefabricante = nombrefabricante;
                    mesh.userData.numeromodelo = numeromodelo;
                    mesh.userData.nombreproveedor = nombreproveedor;
                    mesh.userData.codigoubicacion = codigoubicacion;
                    mesh.userData.piso = (piso-1)*1000;
                    objects.push(mesh);
                    scene.add(mesh);
                });     
        }
function transparent(objeto) {
                    if (objeto.opacity == 1) {
                        objeto.opacity = 0.6;
                    } else {
                        objeto.opacity = 1;
                    }
                }
function camarapiso(punto){
var actual, final;
actual=controls.target.z;
final=actual-punto;
if(final>0)
{
actual=camera.position.z;
camera.position.z=actual-final;
}
else
{
actual=camera.position.z;
camera.position.z=actual+final;
}
controls.target.z=punto;
}

            function init() {
                container = document.createElement('div');
                document.body.appendChild(container);

                camera = new THREE.PerspectiveCamera(70, window.innerWidth / window.innerHeight, 1, 100000);
                camera.position.set(-11000,12000,3500);
                camera.up.set( 0, 0, 1 );
				

                scene = new THREE.Scene();

                scene.add(new THREE.HemisphereLight(0x443333, 0x111122));
                addShadowedLight(0, 0, 1, 0x404040, 3);
                addShadowedLight(1, 1, -1, 0x404040, 4);
                addShadowedLight(-1, -1, -1, 0x404040, 3);

                addGeometry();
                <?php
$directorio = "equipos";
$gestor_dir = opendir($directorio);
while (false !== ($nombre_fichero = readdir($gestor_dir))) {
;
    $nombre_fichero=substr($nombre_fichero, 0, -4);
    $ficheros[] = $nombre_fichero;
   
 if(strlen ($nombre_fichero ) > 1)
   {
   
     //$id=$_POST['id'];
    //$id=$_GET['id'];
    $query="SELECT * FROM equipos WHERE idunica='$nombre_fichero'";
    //$query="SELECT * FROM equipos";
    $resultado=$mysqli->query($query);
    $row=$resultado->fetch_assoc();
    
    echo'equipos("'.$nombre_fichero.'","'.utf8_encode($row['nombreequipo']).'","'.utf8_encode($row['estadoequipo']).'","'.utf8_encode($row['descripcionubicacion']).'","'.utf8_encode($row['tipoequipo']).'","'.utf8_encode($row['nombrefabricante']).'","'.utf8_encode($row['numeromodelo']).'","'.utf8_encode($row['nombreproveedor']).'","'.utf8_encode($row['codigoubicacion']).'");';
   }
}
?>

                raycast = new THREE.Raycaster();
                mouse = new THREE.Vector2();

                renderer = new THREE.WebGLRenderer();
                renderer.setClearColor(0xf0f0f0);
                renderer.setPixelRatio(window.devicePixelRatio);
                renderer.setSize(window.innerWidth, window.innerHeight);
                document.body.appendChild(renderer.domElement);
                
                controls = new THREE.OrbitControls(camera, renderer.domElement);
                controls.enablePan = false;
                controls.enableDamping = true;
                controls.dampingFactor = 0.25;
                controls.enableZoom = true;
                //controls.mouseButtons = { ORBIT: THREE.MOUSE.RIGHT, ZOOM: THREE.MOUSE.MIDDLE, PAN: THREE.MOUSE.LEFT };
				controls.target.set(-10863, -15420, 0);
                controls.maxPolarAngle = Math.PI/2;

                window.addEventListener('resize', onWindowResize, false);
                            document.addEventListener('mousedown', onDocumentMouseDown, false);
							document.addEventListener('touchstart', onDocumentMouseStart, false);
                            document.addEventListener( 'mousemove', onDocumentMouseMove, false );
            }

            function addShadowedLight(x, y, z, color, intensity) {

                var directionalLight = new THREE.DirectionalLight(color, intensity);
                directionalLight.position.set(x, y, z);
                scene.add(directionalLight);

                directionalLight.castShadow = true;

                var d = 1;
                directionalLight.shadow.camera.left = -d;
                directionalLight.shadow.camera.right = d;
                directionalLight.shadow.camera.top = d;
                directionalLight.shadow.camera.bottom = -d;

                directionalLight.shadow.camera.near = 1;
                directionalLight.shadow.camera.far = 4;

                directionalLight.shadow.mapSize.width = 1024;
                directionalLight.shadow.mapSize.height = 1024;

                directionalLight.shadow.bias = -0.005;

            }

            function onWindowResize(){
                            camera.aspect = window.innerWidth / window.innerHeight;
                            camera.updateProjectionMatrix();
                            renderer.setSize(window.innerWidth, window.innerHeight);
                        } 
                        
                        
                        function onDocumentMouseMove( event ) {

							event.preventDefault();

							mouse.x = ( event.clientX / window.innerWidth ) * 2 - 1;
							mouse.y = - ( event.clientY / window.innerHeight ) * 2 + 1;
							raycast.setFromCamera( mouse, camera );

				var intersects = raycast.intersectObjects( objects);

				if ( intersects.length > 0 ) {

					if ( INTERSECTED != intersects[ 0 ].object ) {

						if ( INTERSECTED ) INTERSECTED.material.emissive.setHex( INTERSECTED.currentHex );

						INTERSECTED = intersects[ 0 ].object;
						INTERSECTED.currentHex = INTERSECTED.material.emissive.getHex();
						INTERSECTED.material.emissive.setHex( 0xff0000 );

					}

				} else {

					if ( INTERSECTED ) INTERSECTED.material.emissive.setHex( INTERSECTED.currentHex );

					INTERSECTED = null;

				}
							

						}
						function onDocumentMouseStart(event){
                            event.preventDefault();
                            event.clientX = event.touches[0].clientX;
                            event.clientY = event.touches[0].clientY;
                            onDocumentMouseDown(event);
                        }
                        
                        function onDocumentMouseDown(event){
                            event.preventDefault();
                            mouse.x = (event.clientX / renderer.domElement.clientWidth) *2 -1;
                            mouse.y = -(event.clientY / renderer.domElement.clientHeight) *2 +1;
                            raycast.setFromCamera(mouse, camera);
                            var intercepcion2 = raycast.intersectObjects ( objects2 );
                            var intercepcion = raycast.intersectObjects ( objects );

                            if(intercepcion.length > 0){
                                
                                //intercepcion[ 0 ].object.material.color.setHex( Math.random() * 0xffffff );
                                var target = intercepcion[0].object;
                              statsNode.innerHTML = "<a href='../fichas/ficha_equipos_medicos.php?id="+target.name+"' target='_blank'>Ficha Equipo ID: "+target.name+"</a><br><br>Nombre: "+target.userData.nombreequipo+"<br><br>Estado: "+target.userData.estadoequipo+"<br><br>Tipo: "+target.userData.tipoequipo+"<br><br>Fabricante: "+target.userData.nombrefabricante+"<br><br>Modelo: "+target.userData.numeromodelo+"<br><br>Proveedor: "+target.userData.nombreproveedor+"<br><br>Sector: "+target.userData.codigoubicacion;

                              if(event.which === 3){
                              controls.enabled = false;
          var vecCamera = new THREE.Vector2();
vecCamera.x = -intercepcion[0].point.x+camera.position.x;
vecCamera.y = -intercepcion[0].point.y+camera.position.y;
var moduloVecCamera = Math.pow(vecCamera.x*vecCamera.x+vecCamera.y*vecCamera.y,0.5);
vecCamera.x = vecCamera.x/moduloVecCamera;
vecCamera.y = vecCamera.y/moduloVecCamera;
                          new TWEEN.Tween( camera.position ).to( {
						x: intercepcion[0].point.x+vecCamera.x*1500,
						y: intercepcion[0].point.y+vecCamera.y*1500, z: target.userData.piso+500},
						 1000).easing( TWEEN.Easing.Linear.None).start();

new TWEEN.Tween( controls.target ).to( {
						x: intercepcion[0].point.x,
						y: intercepcion[0].point.y, z: target.userData.piso},
						 1000).easing( TWEEN.Easing.Linear.None).onComplete(function() {controls.enabled = true;}).start();
                              
                            
                        
                            }}

                            else if(intercepcion2.length > 0 && event.which === 3){
                              
                             
                              controls.enabled = false;
          var vecCamera = new THREE.Vector2();
vecCamera.x = -intercepcion2[0].point.x+camera.position.x;
vecCamera.y = -intercepcion2[0].point.y+camera.position.y;
var moduloVecCamera = Math.pow(vecCamera.x*vecCamera.x+vecCamera.y*vecCamera.y,0.5);
vecCamera.x = vecCamera.x/moduloVecCamera;
vecCamera.y = vecCamera.y/moduloVecCamera;
                          new TWEEN.Tween( camera.position ).to( {
						x: intercepcion2[0].point.x+vecCamera.x*1500,
						y: intercepcion2[0].point.y+vecCamera.y*1500, z: controls.target.z+500},
						 1000).easing( TWEEN.Easing.Linear.None).start();

new TWEEN.Tween( controls.target ).to( {
						x: intercepcion2[0].point.x,
						y: intercepcion2[0].point.y},
						 1000).easing( TWEEN.Easing.Linear.None).onComplete(function() {controls.enabled = true;}).start();
                              
                            }
                              
                        }

            function animate() {
                requestAnimationFrame(animate);
                render();
                controls.update();
            }

            function render() {
             TWEEN.update();
//statsNode.innerHTML = 'x: '+controls.target.x+' y: '+controls.target.y + ' z:'+controls.target.z;
				//statsNode.innerHTML = 'x: '+camera.position.x+' y: '+camera.position.y + ' z:'+camera.position.z;
                renderer.render(scene, camera);
            }
        </script>
    </body>
</html>
