<?php
session_start(); 
include_once "../conexion1.php";
require('pruebaportentaje.php');
if(!isset($_SESSION['userid']))
{
  header('location: ../logout2.php'); 
}
$idusuario=$_SESSION["userid"];
$sql23 = "SELECT * FROM usuarios WHERE idusuario = '$idusuario'";
$rec1 = mysql_query($sql23);
$row123 = mysql_fetch_array($rec1);
$tipousuario=$row123['tipousuario'];


?>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=big5">
        <title>Edificio</title>
        
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
                bottom: 1%;
                left: 43%;
                right: 0;
                width: 100%;
                display: block;
            }
            #stats1 {
                position: absolute;
                right: 1%;
                top: 1%;
                bottom: 1%;
                color: #fff;
                text-align: left;
                background: rgba(0, 0, 0, 0.5);
                padding: 10px;
                width: 200px;
                display : none;
                height: auto;
                border: solid 1px black;
                border-radius: 5px;
                font-family:Arial;
                font-size:75%;
                font-weight: normal;
                text-align: left;
                text-decoration:none;
            }
            #stats2 {
                position: absolute;
                left: 1%;
                top: 57%;
                bottom: 12%;
                color: #fff;
                text-align: left;
                background: rgba(0, 0, 0, 0.5);
                padding: 0px;
                width: 120px;
                display : block;
                height: auto;
                font-family:Arial;
                font-size:75%;
                font-weight: normal;
                text-align: left;
                text-decoration:none;
            }
            #stats3 {
                position: absolute;
                left: 85%;
                top: 95%;
                bottom: 2%;
                color: #fff;
                text-align: center;
                background: rgba(0, 0, 0, 0.5);
                padding: 1px;
                width: 200px;
                display : block;
                height: auto;
                border: solid 1px black;
                border-radius: 5px;
                font-family:Arial;
                font-size:75%;
                font-weight: normal;
                text-align: center;
                text-decoration:none;
            }

            #stats1 a:link, a:visited{
                text-decoration: none;
                color: #70DB93;
                font-weight: bold;
                font-size: 110%;
            }
            #stats1 a:hover {
                background: rgba(0, 0, 0, 0.5);
                Color: #70DB93;
                font-style: italic;
                font-size: 110%;
            }
            #stats1 a:active{
                background: #2A0A0A;
                Color: #70DB93;
                font-style: normal;
                font-size: 110%;
            }
            button {
                border: none;
                background: #3a7999;
                color: #f2f2f2;
                padding: 10px;
                font-size: 14px;
                border-radius: 3px;
                position: relative;
                box-sizing: border-box;
                transition: all 500ms ease;
            }
            button:hover {
                background: rgba(0,0,0,255);
                color: #3a7999;
                box-shadow: inset 0 0 0 3px #3a7999;
            }
            input {
                border: none;
                background: #B22222;
                color: #f2f2f2;
                padding: 10px;
                font-size: 14px;
                border-radius: 3px;
                position: relative;
                box-sizing: border-box;
                transition: all 500ms ease;
            }
            input:hover {
                background: rgba(0,0,0,255);
                color: #B22222;
                box-shadow: inset 0 0 0 3px #B22222;
            }
            #imagen1 { border:5px solid green}

            #filtro {
                position: absolute;
                left: 1%;
                top: 10%;
                bottom: 12%;
                color: #fff;
                text-align: center;
                padding: 1px;
                width: 120px;
                height: auto;
                border-radius: 5px;
                font-family:Arial;
                font-size:75%;
                font-weight: normal;
                text-align: left;
                text-decoration:none;
                
            }

.dropbtn {
    background-color: #3366ff;
    color: white;
    padding: 12px;
    font-size: 12px;
    border: none;
    cursor: pointer;
}


.dropdown {
    position: relative;
    display: inline-block;
}


.dropdown-content {
    display: none;
    position: absolute;
    background: rgba(0, 0, 0, 0.5);
    min-width: 160px;
    box-shadow: 0px 6px 12px 0px rgba(0,0,0,0.2);
    z-index: 1;
}


.dropdown-content a {
    color: white;
    padding: 8px 12px;
    text-decoration: none;
    display: block;
}


.dropdown-content a:hover {background-color:    #8f99a3}


.dropdown:hover .dropdown-content {
    display: block;
}


.dropdown:hover .dropbtn {
    background-color: #3333ff;
}
#pisos2 {
                color: #fff;
                position: fixed;
                bottom: 1%;
                left: 18%;
                right: 0;
                width: 100%;
                display: block;
            }
        </style>
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/css_mdi.css">

    </head>

    <body>

        <div id="info">
            <img src="bim.png" align="left">
        </div>
        

        <div id="pisos">
            <input type="text" placeholder="Buscar por ID" id="search">
            <button onclick="buscador()">Buscar</button>
        </div>

        <div id='stats1'>
            <div id='stats'></div>
            <?php if($tipousuario == 1 || $tipousuario == 3){?>
                <input type=button value="Notificar Fallo" name="Enviar" id="botoninput" onclick=estadoEquipo("FALLANDO")>
            <?php }elseif ($tipousuario == 4 || $tipousuario == 2){ }?>
        </div>
        <div id='stats2'>
            <div style="padding:10px;background-color:#000000;height:22px;width:135px;border:5px solid black;">
                Total de Equipos <?php echo $row['total']?>
            </div>
            <div style="padding:10px;background-color:#000000;height:22px;width:135px;border:5px solid black;">
                Nivel de Servicio <?php echo number_format($row1['bueno'], '0',',','.').'%'?>
            </div>
            <div style="padding:10px;background-color:#00CC66;height:22px;width:135px;border:5px solid black;cursor: pointer;"
                 onclick="filtro( 'BUENO')">
               <?php echo 'BUENO '. $row1['bueno'].'%';?>
            </div>
            <div style="padding:10px;background-color:#FF0000;height:22px;width:135px;border:5px solid black;cursor: pointer;"
                 onclick="filtro( 'SIN MANTENCION')">
                <?php echo 'SIN MANTENCION '.$row4['mantencion2'].'%';?>
            </div>
            <div style="padding:10px;background-color:#FF9900;height:22px;width:135px;border:5px solid black;cursor: pointer;"
                 onclick="filtro( 'FALLANDO')">
                <?php echo  'FALLANDO ' .$row2['fallo'].'%';?>
            </div>
            <div style="padding:10px;background-color:#9933CC;height:22px;width:135px;border:5px solid black;cursor: pointer;"
                 onclick="filtro( 'EN MANTENCION')">
                <?php echo 'EN MANTENCION '. $row3['mantencion'].'%';?>
            </div>
        </div>

        <div id='stats3'>contacto@bim.cl</div>
        <script src="three.js"></script>
        <script src="OrbitControls.js"></script>
        <script src="Projector.js"></script>
        <script src="STLLoader.js"></script>
        <script src="jquery.js"></script>
        <script src="tween.min.js"></script>
        <script type="x-shader/x-vertex" id="vertexShader">

            varying vec3 vWorldPosition;

            void main() {

            vec4 worldPosition = modelMatrix * vec4( position, 1.0 );
            vWorldPosition = worldPosition.xzy;

            gl_Position = projectionMatrix * modelViewMatrix * vec4( position, 1.0 );

            }

        </script>

        <script type="x-shader/x-fragment" id="fragmentShader">

            uniform vec3 topColor;
            uniform vec3 bottomColor;
            uniform float offset;
            uniform float exponent;

            varying vec3 vWorldPosition;

            void main() {

            float h = normalize( vWorldPosition + offset ).y;
            gl_FragColor = vec4( mix( bottomColor, topColor, max( pow( max( h , 0.0), exponent ), 0.0 ) ), 1.0 );

            }

        </script>
        <script type="application/javascript" src="funcionesGeneral.js"></script>
        <script>
                var tipoUsuario = <?php echo $tipousuario; ?>;
                var container;
                var altura = 0, idglobal;
                var selectedText;
                var camera, scene, controls, renderer, INTERSECTED, target;
                var raycast, objects = [], objects2 = [];
                var mouse, controls;
                var i = 1, y = 0;
                var plane = new THREE.Plane();
                var statsNode = document.getElementById('stats');
                var statsNode1 = document.getElementById('stats1');
                var cajaPrincipal, losap1, losap2, losap3, losap4,losap5,losasub,murosp1,murosp2,murosp3,murosp4;
                var dirEquipos = [], dirEquipos2 = [];
                init();
                animate();

                function addGeometry() {
                    var loader = new THREE.STLLoader();

                    loader.load('edificiostl/BIM_FM_TOTAL CAJA_rhino.stl', function (geometry) {
                        cajaPrincipal = new THREE.MeshLambertMaterial({color: 0xFFFFFF, transparent: true, opacity: 1});
                        cajaPrincipal.opacity = 0.3;

                        var mesh = new THREE.Mesh(geometry, cajaPrincipal);
                        mesh.renderOrder = 3;
                        mesh.doubleSided = true;
                        mesh.frustumCulled = false;
                        mesh.position.set(0, 0, 0);// izquerda derecha, lejania cercania, Altura
                        mesh.scale.set(0.2, 0.2, 0.2);
                        mesh.castShadow = true;
                        //mesh.receiveShadow = true;
                        mesh.name = "CAJA";
                        objects2.push(mesh);
                        scene.add(mesh);
                    });

                    loader.load('edificiostl/BIM_FM_PISO MECANICO.stl', function (geometry) {
                        losap4 = new THREE.MeshLambertMaterial({color: 0xFFFFCC, transparent: true, opacity: 1.5});
                        losap4.opacity =0.2;
                        var mesh = new THREE.Mesh(geometry, losap4);
                        mesh.renderOrder = 3;
                        mesh.doubleSided = true;
                        mesh.frustumCulled = false;
                        mesh.position.set(0, 0, 0);
                        mesh.scale.set(0.2, 0.2, 0.2);
                        mesh.castShadow = true;
                        mesh.name = "PM";
                        scene.add(mesh);

                    });

                    
                }

                function transparent(objeto) {
                    if (objeto.opacity == 0.2) {
                        objeto.opacity = 0;
                    } else {
                        objeto.opacity = 0.2;
                    }
                }

                function camarapiso(punto) {
                    var actual, final;
                    actual = controls.target.z;
                    final = actual - punto;
                    if (final > 0)
                    {
                        actual = camera.position.z;
                        camera.position.z = actual - final;
                        altura = actual - final;
                    } else
                    {
                        actual = camera.position.z;
                        camera.position.z = actual + final;
                        altura = actual - final;
                    }
                    controls.target.z = punto + 400;
                    altura = punto;
                }

                function updatePosicion(x, y, z, id) {
                    var parametros = {
                        "x": x,
                        "y": y,
                        "z": z,
                        "id": id
                    };
                    console.log(parametros);
                     $.post("update_coordenadas.php",parametros);
                }

                function cameraPositionInitial(){
                    container = document.createElement('div');
                    document.body.appendChild(container);

                    camera = new THREE.PerspectiveCamera(10, window.innerWidth / window.innerHeight,1, 450000); //profundidad, centro,1,
                    camera.position.set(-50000, 90000, 27700); //izquerda derecha, profundidad, altura
                    camera.up.set(0, 0, 1);
                }

                function newScene(){
                    scene = new THREE.Scene();
                    var hemiLight = new THREE.HemisphereLight(0xffffff, 0xffffff, 0.6);
                    hemiLight.color.setHSL(0.6, 1, 0.6);
                    hemiLight.groundColor.setHSL(0.095, 1, 0.75);
                    hemiLight.position.set(0, 0, 100000);
                    scene.add(hemiLight);

                    //direccion luz

                    var dirLight = new THREE.DirectionalLight(0xffffff, 1.4);
                    dirLight.color.setHSL(0.1, 1, 0.95);
                    dirLight.position.set(-1, 1, 1.75);
                    dirLight.position.multiplyScalar(50);
                    scene.add(dirLight);

                    dirLight.castShadow = true;

                    dirLight.shadow.mapSize.width = 2048;
                    dirLight.shadow.mapSize.height = 2048;

                    var d = 500;

                    dirLight.shadow.camera.left = -d;
                    dirLight.shadow.camera.right = d;
                    dirLight.shadow.camera.top = d;
                    dirLight.shadow.camera.bottom = -d;

                    dirLight.shadow.camera.far = 35000;
                    dirLight.shadow.bias = -0.0001;

                    var vertexShader = document.getElementById('vertexShader').textContent;
                    var fragmentShader = document.getElementById('fragmentShader').textContent;
                    var uniforms = {
                        topColor: {value: new THREE.Color(0x0077ff)},
                        bottomColor: {value: new THREE.Color(0x000000)},
                        offset: {value: 33},
                        exponent: {value: 0.6}
                    };
                    uniforms.topColor.value.copy(hemiLight.color);



                    var skyGeo = new THREE.SphereGeometry(200000, 32, 15);
                    var skyMat = new THREE.ShaderMaterial({vertexShader: vertexShader, fragmentShader: fragmentShader, uniforms: uniforms, side: THREE.BackSide});

                    var sky = new THREE.Mesh(skyGeo, skyMat);
                    sky.rotation.y = -Math.PI / 6;
                    scene.add(sky);
                }

                function init() {
                    cameraPositionInitial();

                    newScene();

                    addGeometry();

                    listaEquipos();

                   //listaEquiposColor();
                    setInterval("listaEquiposColor();", 10000);
                    statsNode.innerHTML = dirEquipos;
                    raycast = new THREE.Raycaster();
                    mouse = new THREE.Vector2();
                    //console.log(scene.children.length);
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
                    controls.maxDistance = 80000;
                    //controls.mouseButtons = { ORBIT: THREE.MOUSE.RIGHT, ZOOM: THREE.MOUSE.MIDDLE, PAN: THREE.MOUSE.LEFT };
                    controls.target.set(window.innerWidth * 4, window.innerHeight, 3000 ); //angulo inicio
                    controls.maxPolarAngle = Math.PI / 2;
                    document.getElementById("search").disabled=false;
                    document.getElementById("search").focus();
                    window.addEventListener('resize', onWindowResize, false);
                    document.addEventListener('mousedown', onDocumentMouseDown, false);
                    document.addEventListener('touchstart', onDocumentMouseStart, false);
                    document.addEventListener('mousemove', onDocumentMouseMove, false);
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

                function onWindowResize() {
                    camera.aspect = window.innerWidth / window.innerHeight;
                    camera.updateProjectionMatrix();
                    renderer.setSize(window.innerWidth, window.innerHeight);
                }

                function onDocumentMouseMove(event) {

                    event.preventDefault();

                    mouse.x = (event.clientX / window.innerWidth) * 2 - 1;
                    mouse.y = -(event.clientY / window.innerHeight) * 2 + 1;
                    raycast.setFromCamera(mouse, camera);

                    var intersects = raycast.intersectObjects(objects);

                    if (intersects.length > 0) {

                        if (INTERSECTED != intersects[ 0 ].object) {

                            if (INTERSECTED)
                                INTERSECTED.material.emissive.setHex(INTERSECTED.currentHex);

                            INTERSECTED = intersects[ 0 ].object;
                            INTERSECTED.currentHex = INTERSECTED.material.emissive.getHex();
                            INTERSECTED.material.emissive.setHex(0xff0000);

                        }

                    } else {

                        if (INTERSECTED)
                            INTERSECTED.material.emissive.setHex(INTERSECTED.currentHex);

                        INTERSECTED = null;

                    }


                }

                function onDocumentMouseStart(event) {
                    event.preventDefault();
                    event.clientX = event.touches[0].clientX;
                    event.clientY = event.touches[0].clientY;
                    onDocumentMouseDown(event);
                }

                function onDocumentMouseDown(event) {
                    event.preventDefault();
                    mouse.x = (event.clientX / renderer.domElement.clientWidth) * 2 - 1;
                    mouse.y = -(event.clientY / renderer.domElement.clientHeight) * 2 + 1;
                    raycast.setFromCamera(mouse, camera);
                    var intercepcion2 = raycast.intersectObjects(objects2);
                    var intercepcion = raycast.intersectObjects(objects);

                    if (intercepcion.length > 0) {

                        //intercepcion[ 0 ].object.material.color.setHex( Math.random() * 0xffffff );
                        target = intercepcion[0].object;
                        idglobal = target.name;
                        hola = idglobal.substr(0,2);
                        if(hola=='CL'){
                        statsNode1.style.display = 'block';
                                     statsNode.innerHTML = "<a href='../fichas/ficha_equipos_instalaciones.php?id=" + target.name + "' target='_blank'>Ficha Equipo ID: " + target.name + "</a><br><br>Nombre: " + target.userData.equipo + "<br><br>Estado: " + target.userData.estadoequipo + "<br><br>Instalacion: " + target.userData.nombreinstalacion + "<br><br>Fabricante: " + target.userData.nombrefabricante + "<br><br>Modelo: " + target.userData.modelo + "<br><br>Proveedor: " + target.userData.nombreproveedor + "<br><br>Recinto: " + target.userData.recinto + "<br><br>Fecha de Instalacion: " + target.userData.fechainstalacion + "<br><br>Caducidad: " + target.userData.fechacaducidadgarantia + "<br><br>Categoria: " + target.userData.acreditacion + "<br><br><IMG SRC=../mod_instalacion/elementos/" + target.userData.imagen + " height='180px' id='imagen1' width='180px' border='1.5px'><br><br>";
                            }else if(hola=='EM'){
                        statsNode1.style.display = 'block';
                                     statsNode.innerHTML = "<a href='../fichas/ficha_equipos_medicos.php?id=" + target.name + "' target='_blank'>Ficha Equipo ID: " + target.name + "</a><br><br>Nombre: " + target.userData.equipo + "<br><br>Estado: " + target.userData.estadoequipo + "<br><br>Instalacion: " + target.userData.nombreinstalacion + "<br><br>Fabricante: " + target.userData.nombrefabricante + "<br><br>Modelo: " + target.userData.modelo + "<br><br>Proveedor: " + target.userData.nombreproveedor + "<br><br>Recinto: " + target.userData.recinto + "<br><br>Fecha de Instalacion: " + target.userData.fechainstalacion + "<br><br>Caducidad: " + target.userData.fechacaducidadgarantia + "<br><br>Categoria: " + target.userData.acreditacion + "<br><br><IMG SRC=../mod_inventario/elementos/" + target.userData.imagen + " height='180px' id='imagen1' width='180px' border='1.5px'><br><br>";
                            }else if(hola=='AS'){
                        statsNode1.style.display = 'block';
                                     statsNode.innerHTML = "<a href='../fichas/ficha_equipos_instalaciones.php?id=" + target.name + "' target='_blank'>Ficha Equipo ID: " + target.name + "</a><br><br>Nombre: " + target.userData.equipo + "<br><br>Estado: " + target.userData.estadoequipo + "<br><br>Instalacion: " + target.userData.nombreinstalacion + "<br><br>Fabricante: " + target.userData.nombrefabricante + "<br><br>Modelo: " + target.userData.modelo + "<br><br>Proveedor: " + target.userData.nombreproveedor + "<br><br>Recinto: " + target.userData.recinto + "<br><br>Fecha de Instalacion: " + target.userData.fechainstalacion + "<br><br>Caducidad: " + target.userData.fechacaducidadgarantia + "<br><br>Categoria: " + target.userData.acreditacion + "<br><br><IMG SRC=../mod_instalacion/elementos/" + target.userData.imagen + " height='180px' id='imagen1' width='180px' border='1.5px'><br><br>";
                            }else if(hola=='AR'){
                        statsNode1.style.display = 'block';
                                     statsNode.innerHTML = "<a href='../fichas/ficha_artefactos.php?id=" + target.name + "' target='_blank'>Ficha Equipo ID: " + target.name + "</a><br><br>Nombre: " + target.userData.nombreequipo + "<br><br>Estado: " + target.userData.estadoequipo + "<br><br>Instalacion: " + target.userData.tipoequipo + "<br><br>Fabricante: " + target.userData.nombrefabricante + "<br><br>Modelo: " + target.userData.numeromodelo + "<br><br>Proveedor: " + target.userData.nombreproveedor + "<br><br>Recinto: " + target.userData.recinto + "<br><br>Fecha de Instalacion: " + target.userData.fechainstalacion + "<br><br>Caducidad: " + target.userData.fechacaducidadgarantia + "<br><br>Categoria: " + target.userData.acreditacion + "<br><br><IMG SRC=../mod_servbas/elementos/" + target.userData.imagen + " height='180px' id='imagen1' width='180px' border='1.5px'><br><br>";
                            }else if(hola=='AL'){
                        statsNode1.style.display = 'block';
                                     statsNode.innerHTML = "<a href='../fichas/ficha_equipos_instalaciones.php?id=" + target.name + "' target='_blank'>Ficha Equipo ID: " + target.name + "</a><br><br>Nombre: " + target.userData.equipo + "<br><br>Estado: " + target.userData.estadoequipo + "<br><br>Instalacion: " + target.userData.nombreinstalacion + "<br><br>Fabricante: " + target.userData.nombrefabricante + "<br><br>Modelo: " + target.userData.modelo + "<br><br>Proveedor: " + target.userData.nombreproveedor + "<br><br>Recinto: " + target.userData.recinto + "<br><br>Fecha de Instalacion: " + target.userData.fechainstalacion + "<br><br>Caducidad: " + target.userData.fechacaducidadgarantia + "<br><br>Categoria: " + target.userData.acreditacion + "<br><br><IMG SRC=../mod_instalacion/elementos/" + target.userData.imagen + " height='180px' id='imagen1' width='180px' border='1.5px'><br><br>";
                            }else if(hola=='AP'){
                        statsNode1.style.display = 'block';
                                     statsNode.innerHTML = "<a href='../fichas/ficha_equipos_instalaciones.php?id=" + target.name + "' target='_blank'>Ficha Equipo ID: " + target.name + "</a><br><br>Nombre: " + target.userData.equipo + "<br><br>Estado: " + target.userData.estadoequipo + "<br><br>Instalacion: " + target.userData.nombreinstalacion + "<br><br>Fabricante: " + target.userData.nombrefabricante + "<br><br>Modelo: " + target.userData.modelo + "<br><br>Proveedor: " + target.userData.nombreproveedor + "<br><br>Recinto: " + target.userData.recinto + "<br><br>Fecha de Instalacion: " + target.userData.fechainstalacion + "<br><br>Caducidad: " + target.userData.fechacaducidadgarantia + "<br><br>Categoria: " + target.userData.acreditacion + "<br><br><IMG SRC=../mod_instalacion/elementos/" + target.userData.imagen + " height='180px' id='imagen1' width='180px' border='1.5px'><br><br>";
                            }else if(hola=='EI'){
                        statsNode1.style.display = 'block';
                                if(tipoUsuario == 2){
                                    statsNode.innerHTML = "<p " + target.name + ">Ficha Equipo ID: " + target.name + "</p><br><br>Nombre: " + target.userData.equipo + "<br><br>Estado: " + target.userData.estadoequipo + "<br><br>Instalacion: " + target.userData.nombreinstalacion + "<br><br>Fabricante: " + target.userData.nombrefabricante + "<br><br>Modelo: " + target.userData.modelo + "<br><br>Proveedor: " + target.userData.nombreproveedor + "<br><br>Recinto: " + target.userData.recinto + "<br><br>Fecha de Instalacion: " + target.userData.fechainstalacion + "<br><br>Caducidad: " + target.userData.fechacaducidadgarantia + "<br><br>Categoria: " + target.userData.acreditacion + "<br><br><IMG SRC=../mod_instalacion/elementos/" + target.userData.imagen + " height='180px' id='imagen1' width='180px' border='1.5px'><br><br>";

                                }else{
                                    statsNode.innerHTML = "<a href='../fichas/ficha_equipos_instalaciones.php?id=" + target.name + "' target='_blank'>Ficha Equipo ID: " + target.name + "</a><br><br>Nombre: " + target.userData.equipo + "<br><br>Estado: " + target.userData.estadoequipo + "<br><br>Instalacion: " + target.userData.nombreinstalacion + "<br><br>Fabricante: " + target.userData.nombrefabricante + "<br><br>Modelo: " + target.userData.modelo + "<br><br>Proveedor: " + target.userData.nombreproveedor + "<br><br>Recinto: " + target.userData.recinto + "<br><br>Fecha de Instalacion: " + target.userData.fechainstalacion + "<br><br>Caducidad: " + target.userData.fechacaducidadgarantia + "<br><br>Categoria: " + target.userData.acreditacion + "<br><br><IMG SRC=../mod_instalacion/elementos/" + target.userData.imagen + " height='180px' id='imagen1' width='180px' border='1.5px'><br><br>";

                                }
                            }

                        if (event.which === 3) {
                            if (intercepcion[0].point.z < 854)
                            {
                                target.userData.piso = -16;
                            } else if (intercepcion[0].point.z < 1754)
                            {
                                target.userData.piso = 884;
                            } else if (intercepcion[0].point.z < 2654)
                            {
                                target.userData.piso = 1784;
                            } else
                            {
                                target.userData.piso = 2684;
                            }
                            //segundo click zoom
                            altura = target.userData.piso;
                            controls.enabled = false;
                            var vecCamera = new THREE.Vector2();
                            vecCamera.x = -intercepcion[0].point.x + camera.position.x;
                            vecCamera.y = -intercepcion[0].point.y + camera.position.y;
                            var moduloVecCamera = Math.pow(vecCamera.x * vecCamera.x + vecCamera.y * vecCamera.y, 0.5);
                            vecCamera.x = vecCamera.x / moduloVecCamera;
                            vecCamera.y = vecCamera.y / moduloVecCamera;
                            new TWEEN.Tween(camera.position).to({
                                x: intercepcion[0].point.x + vecCamera.x * 1650,
                                y: intercepcion[0].point.y + vecCamera.y * -1100,
                                z: target.userData.piso + 3300},
                                    1000).easing(TWEEN.Easing.Linear.None).start();

                            new TWEEN.Tween(controls.target).to({
                                x: intercepcion[0].point.x,
                                y: intercepcion[0].point.y, z: target.userData.piso},
                                    1000).easing(TWEEN.Easing.Linear.None).onComplete(function () {
                                controls.enabled = true;
                            }).start();

                            updatePosicion(intercepcion[0].point.x, intercepcion[0].point.y, target.userData.piso, target.name);


                        }
                    }
                    else if (intercepcion2.length > 0 && event.which === 3) {

                        statsNode1.style.display = 'none';
//statsNode.innerHTML = "X: "+intercepcion2[0].point.x+" Y: "+intercepcion2[0].point.y+"Z: "+intercepcion2[0].point.z;
                        controls.enabled = false;
                        var vecCamera = new THREE.Vector2();
                        vecCamera.x = -intercepcion2[0].point.x + camera.position.x;
                        vecCamera.y = -intercepcion2[0].point.y + camera.position.y;
                        var moduloVecCamera = Math.pow(vecCamera.x * vecCamera.x + vecCamera.y * vecCamera.y, 0.5);
                        vecCamera.x = vecCamera.x / moduloVecCamera;
                        vecCamera.y = vecCamera.y / moduloVecCamera;
                        new TWEEN.Tween(camera.position).to({
                            x: intercepcion2[0].point.x + vecCamera.x * 500,
                            y: intercepcion2[0].point.y + vecCamera.y * 500, z: controls.target.z},
                                1000).easing(TWEEN.Easing.Linear.None).start();

                        new TWEEN.Tween(controls.target).to({
                            x: intercepcion2[0].point.x,
                            y: intercepcion2[0].point.y, z: altura + 400},
                                1000).easing(TWEEN.Easing.Linear.None).onComplete(function () {
                            controls.enabled = true;
                        }).start();

                    }

                }

                function buscador(){
        var id = document.getElementById("search").value;
        var buscado = scene.getObjectByName(id);
        var axisx = new Number(buscado.userData.x);
        axisx.toFixed(3);
        var axisy = new Number(buscado.userData.y);
        axisy.toFixed(3);
        var axisz = new Number(buscado.userData.z);
        axisz.toFixed(1);

        if(buscado != null){
            controls.enabled = false;
            var vecCamera = new THREE.Vector2();
            statsNode1.style.display = 'block';
                var subidd=id.substr(0,2);
                if(subidd=='CL'){

                statsNode.innerHTML = "<a href='../fichas/ficha_equipos_instalaciones.php?id=" + buscado.name + "' target='_blank'>Ficha Equipo ID: " + buscado.name + "</a><br><br>Nombre: " + buscado.userData.equipo + "<br><br>Estado: " + buscado.userData.estadoequipo + "<br><br>Tipo: " + buscado.userData.nombreinstalacion + "<br><br>Fabricante: " + buscado.userData.nombrefabricante + "<br><br>Modelo: " + buscado.userData.modelo + "<br><br>Proveedor: " + buscado.userData.nombreproveedor + "<br><br>Sector: " + buscado.userData.recinto + "<br><br>Instalacion: " + buscado.userData.fechainstalacion + "<br><br>Caducidad: " + buscado.userData.fechacaducidadgarantia + "<br><br>Categoria: " + buscado.userData.acreditacion + "<br><br><IMG SRC=../mod_instalacion/elementos/" + buscado.userData.imagen + " height='180px' id='imagen1' width='180px' border='1.5px'><br><br>";
                    }
                else if(subidd=='EM'){
                    statsNode.innerHTML = "<a href='../fichas/ficha_equipos_instalaciones.php?id=" + buscado.name + "' target='_blank'>Ficha Equipo ID: " + buscado.name + "</a><br><br>Nombre: " + buscado.userData.nombreequipo + "<br><br>Estado: " + buscado.userData.estadoequipo + "<br><br>Tipo: " + buscado.userData.tipoequipo + "<br><br>Fabricante: " + buscado.userData.nombrefabricante + "<br><br>Modelo: " + buscado.userData.numeromodelo + "<br><br>Proveedor: " + buscado.userData.nombreproveedor + "<br><br>Sector: " + buscado.userData.recinto + "<br><br>Instalacion: " + buscado.userData.fechainstalacion + "<br><br>Caducidad: " + buscado.userData.fechacaducidadgarantia + "<br><br>Categoria: " + buscado.userData.acreditacion + "<br><br><IMG SRC=../mod_inventario/elementos/" + buscado.userData.imagen + " height='180px' id='imagen1' width='180px' border='1.5px'><br><br>";
                    }
                else if(subidd=='AS'){
                statsNode.innerHTML = "<a href='../fichas/ficha_equipos_instalaciones.php?id=" + buscado.name + "' target='_blank'>Ficha Equipo ID: " + buscado.name + "</a><br><br>Nombre: " + buscado.userData.equipo + "<br><br>Estado: " + buscado.userData.estadoequipo + "<br><br>Tipo: " + buscado.userData.nombreinstalacion + "<br><br>Fabricante: " + buscado.userData.nombrefabricante + "<br><br>Modelo: " + buscado.userData.modelo + "<br><br>Proveedor: " + buscado.userData.nombreproveedor + "<br><br>Sector: " + buscado.userData.recinto + "<br><br>Instalacion: " + buscado.userData.fechainstalacion + "<br><br>Caducidad: " + buscado.userData.fechacaducidadgarantia + "<br><br>Categoria: " + buscado.userData.acreditacion + "<br><br><IMG SRC=../mod_instalacion/elementos/" + buscado.userData.imagen + " height='180px' id='imagen1' width='180px' border='1.5px'><br><br>";
                    }
                else if(subidd=='AR'){
                    statsNode.innerHTML = "<a href='../fichas/ficha_equipos_instalaciones.php?id=" + buscado.name + "' target='_blank'>Ficha Equipo ID: " + buscado.name + "</a><br><br>Nombre: " + buscado.userData.nombreequipo + "<br><br>Estado: " + buscado.userData.estadoequipo + "<br><br>Tipo: " + buscado.userData.tipoequipo + "<br><br>Fabricante: " + buscado.userData.nombrefabricante + "<br><br>Modelo: " + buscado.userData.numeromodelo + "<br><br>Proveedor: " + buscado.userData.nombreproveedor + "<br><br>Sector: " + buscado.userData.recinto + "<br><br>Instalacion: " + buscado.userData.fechainstalacion + "<br><br>Caducidad: " + buscado.userData.fechacaducidadgarantia + "<br><br>Categoria: " + buscado.userData.acreditacion + "<br><br><IMG SRC=../mod_servbas/elementos/" + buscado.userData.imagen + " height='180px' id='imagen1' width='180px' border='1.5px'><br><br>";
                    }
                if(subidd=='AL'){
                statsNode.innerHTML = "<a href='../fichas/ficha_equipos_instalaciones.php?id=" + buscado.name + "' target='_blank'>Ficha Equipo ID: " + buscado.name + "</a><br><br>Nombre: " + buscado.userData.equipo + "<br><br>Estado: " + buscado.userData.estadoequipo + "<br><br>Tipo: " + buscado.userData.nombreinstalacion + "<br><br>Fabricante: " + buscado.userData.nombrefabricante + "<br><br>Modelo: " + buscado.userData.modelo + "<br><br>Proveedor: " + buscado.userData.nombreproveedor + "<br><br>Sector: " + buscado.userData.recinto + "<br><br>Instalacion: " + buscado.userData.fechainstalacion + "<br><br>Caducidad: " + buscado.userData.fechacaducidadgarantia + "<br><br>Categoria: " + buscado.userData.acreditacion + "<br><br><IMG SRC=../mod_instalacion/elementos/" + buscado.userData.imagen + " height='180px' id='imagen1' width='180px' border='1.5px'><br><br>";
                    }
                if(subidd=='AP'){
                statsNode.innerHTML = "<a href='../fichas/ficha_equipos_instalaciones.php?id=" + buscado.name + "' target='_blank'>Ficha Equipo ID: " + buscado.name + "</a><br><br>Nombre: " + buscado.userData.equipo + "<br><br>Estado: " + buscado.userData.estadoequipo + "<br><br>Tipo: " + buscado.userData.nombreinstalacion + "<br><br>Fabricante: " + buscado.userData.nombrefabricante + "<br><br>Modelo: " + buscado.userData.modelo + "<br><br>Proveedor: " + buscado.userData.nombreproveedor + "<br><br>Sector: " + buscado.userData.recinto + "<br><br>Instalacion: " + buscado.userData.fechainstalacion + "<br><br>Caducidad: " + buscado.userData.fechacaducidadgarantia + "<br><br>Categoria: " + buscado.userData.acreditacion + "<br><br><IMG SRC=../mod_instalacion/elementos/" + buscado.userData.imagen + " height='180px' id='imagen1' width='180px' border='1.5px'><br><br>";
                    }
                if(subidd=='EI'){
                    if(tipoUsuario == 2){
                        statsNode.innerHTML = "<p" + buscado.name + ">Ficha Equipo ID: " + buscado.name + "</a><br><br>Nombre: " + buscado.userData.equipo + "<br><br>Estado: " + buscado.userData.estadoequipo + "<br><br>Tipo: " + buscado.userData.nombreinstalacion + "<br><br>Fabricante: " + buscado.userData.nombrefabricante + "<br><br>Modelo: " + buscado.userData.modelo + "<br><br>Proveedor: " + buscado.userData.nombreproveedor + "<br><br>Sector: " + buscado.userData.recinto + "<br><br>Instalacion: " + buscado.userData.fechainstalacion + "<br><br>Caducidad: " + buscado.userData.fechacaducidadgarantia + "<br><br>Categoria: " + buscado.userData.acreditacion + "<br><br><IMG SRC=../mod_instalacion/elementos/" + buscado.userData.imagen + " height='180px' id='imagen1' width='180px' border='1.5px'><br><br>";
                    }else{
                        statsNode.innerHTML = "<a href='../fichas/ficha_equipos_instalaciones.php?id=" + buscado.name + "' target='_blank'>Ficha Equipo ID: " + buscado.name + "</a><br><br>Nombre: " + buscado.userData.equipo + "<br><br>Estado: " + buscado.userData.estadoequipo + "<br><br>Tipo: " + buscado.userData.nombreinstalacion + "<br><br>Fabricante: " + buscado.userData.nombrefabricante + "<br><br>Modelo: " + buscado.userData.modelo + "<br><br>Proveedor: " + buscado.userData.nombreproveedor + "<br><br>Sector: " + buscado.userData.recinto + "<br><br>Instalacion: " + buscado.userData.fechainstalacion + "<br><br>Caducidad: " + buscado.userData.fechacaducidadgarantia + "<br><br>Categoria: " + buscado.userData.acreditacion + "<br><br><IMG SRC=../mod_instalacion/elementos/" + buscado.userData.imagen + " height='180px' id='imagen1' width='180px' border='1.5px'><br><br>";
                    }
                }

                    vecCamera.x = -axisx + camera.position.x;
                    vecCamera.y = -axisy + camera.position.y;
                    var moduloVecCamera = Math.pow(vecCamera.x * vecCamera.x + vecCamera.y * vecCamera.y, 0.54);
                    //Posicion y zoom de camara al buscar, velocidad de zoom
                    vecCamera.x = vecCamera.x / moduloVecCamera;
                    vecCamera.y = vecCamera.y / moduloVecCamera;
                    new TWEEN.Tween(camera.position).to({
                        x: axisx+vecCamera.x * 1600,
                        y: axisy+vecCamera.y * 1000,
                        z: axisz + 1600},
                            1000).easing(TWEEN.Easing.Linear.None).start();

                    new TWEEN.Tween(controls.target).to({
                        x: axisx,
                        y: axisy, z: axisz + 300},//ZOOM OUT
                            1000).easing(TWEEN.Easing.Linear.None).onComplete(function () {
                        controls.enabled = true;
                    }).start();
                }
        }

                function animate() {
                    requestAnimationFrame(animate);
                    render();
                    controls.update();
                }

                function render() {
                    TWEEN.update();
//statsNode.innerHTML = 'x: '+controls.target.x+' y: '+controls.target.y + ' z:'+controls.target.z+ ' altura '+altura;
                    //statsNode.innerHTML = 'x: '+camera.position.x+' y: '+camera.position.y + ' z:'+camera.position.z;
                    renderer.render(scene, camera);
                }

                function filtro(estado){
                    $.ajax({
                        url: 'testajax.php',
                        method: 'POST',
                        data: {estado: estado},
                        dataType: 'JSON',
                        success: function (data) {
                            clearScene();
                            addGeometry();
                            newScene();

                            for (var j = 0; j < data.length; j++)
                            {
                                equipos(data[j][8], data[j]);
                            }
                        },
                        error: function (data) {
                            console.log('error ')
                            console.log(data);
                        }
                    });
                }

                function clearScene() {

                    var to_remove = [];

                    scene.traverse ( function( child ) {
                        if ( child instanceof THREE.Mesh && !child.userData.keepMe === true ) {
                            to_remove.push( child );
                        }
                    } );

                    for (var i = 0; i < to_remove.length; i++)
                        scene.remove( to_remove[i] );
                }

        </script>
    </body>
</html>
