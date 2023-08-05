<?php
session_start(); 
include_once "../../../conexion1.php";
require('pruebaportentaje.php');
if(!isset($_SESSION['userid']))
{
  header('location: ../../../logout2.php'); 
}
$idusuario=$_SESSION["userid"];
$sql23 = "SELECT * FROM usuarios WHERE idusuario = '$idusuario'";
$rec1 = mysql_query($sql23);
$row123 = mysql_fetch_array($rec1);
$tipousuario=$row123['tipousuario'];
?>

<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
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
                left: 1%;
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
                top: 65%;
                bottom: 12%;
                color: #fff;
                text-align: left;
                background: rgba(0, 0, 0, 0.5);
                padding: 1px;
                width: 120px;
                display : block;
                height: auto;
                border: solid 1px black;
                border-radius: 5px;
                font-family:Arial;
                font-size:75%;
                font-weight: normal;
                text-align: left;
                text-decoration:none;
            }
            #stats3 {
                position: absolute;
                left: 65%;
                top: 95%;
                bottom: 0;
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
                width: 200px;
                height: auto;
                border-radius: 5px;
                font-family:Arial;
                font-size:75%;
                font-weight: normal;
                text-align: left;
                text-decoration:none;
            }
/* Style The Dropdown Button */
.dropbtn {
    background-color: #3366ff;
    color: white;
    padding: 12px;
    font-size: 12px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background: rgba(0, 0, 0, 0.5);
    min-width: 160px;
    box-shadow: 0px 6px 12px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: white;
    padding: 8px 12px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color:    #8f99a3}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
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
        <link rel="stylesheet" href="../../css/fontello.css">
        <link rel="stylesheet" href="../../css/css_mdi.css">

    </head>

    <body>
        <div id="info">
            <img src="../../bim.png" align="left">
        </div>

<div id="filtro">
    <div class="dropdown">
      <button class="dropbtn">Filtros</button>
      <div class="dropdown-content">
        <a href="../../Edificio.php">SIN FILTRO</a>
        <a href="../equipo_medico/Edificio.php">EQUIPOS MEDICOS</a>
        <a href="../gases_clinicos/Edificio.php">GASES CLINICOS</a>
        <a href="../clima/Edificio.php">CLIMA</a>
        <a href="../ascensor/Edificio.php">ASCENSORES</a>
        <a href="../electricidad/Edificio.php">ELECTRICIDAD</a>
        <a href="#">ILUMINACIÒN</a>
        <a href="#">INCENDIO</a>
        <a href="#">CORREO NEUMATICO</a>
        <a href="Edificio.php">CORRIENTES DEBILES</a>
        <a href="../agua_potable/Edificio.php">AGUA POTABLE</a>
        <a href="../alcantarillado/Edificio.php">ALCANTARILLADO</a>
        <a href="../artefacto/Edificio.php">ARTEFACTOS</a>
        <a href="#">AGUAS LLUVIA</a>
     </div>
    </div>
<a>CORRIENTES DEBILES</a>
</div>

        <div id="pisos">
            <input type=text placeholder="Buscar por ID" id="search">
            <button onclick="buscador()">Buscar</button>
            </div>

        <div id="pisos2">
                            <button id="pi1" onclick="location='primer_piso.php'">PISO 1</button>
            <button id="pi2" onclick="location='segundo_piso.php'">PISO 2</button>
            <button id="pi3" onclick="location='tercer_piso.php'">PISO 3</button>
            <button id="pi4" onclick="location='cuarto_piso.php'">PISO 4</button>
            <button id="alle" onclick="location='Edificio.php'">EDIFICIO COMPLETO</button>

           </div>
    <?php if ($tipousuario=='1'){?>
        <div id='stats1'>
            <div id='stats'></div>
            <input type=button value="Notificar Fallo" name="Enviar" id="botoninput" onclick=estadoEquipo("FALLANDO")> 
        </div>

    <?php }else {?>
    <div id='stats1'>
        <div id="stats"></div>
    </div>

    <?php }?>

        <div id='stats2'>
            <div style="padding:10px;background-color:#000000;height:22px;width:135px;border:5px solid black;">
                Estado <?php echo $rowp1['totalp1'].' equipos'?> 
            </div>
            <div style="padding:10px;background-color:#00CC66;height:22px;width:135px;border:5px solid black;">
               <?php echo 'BUENO '. $row1p1['buenop1'].'%';?>
            </div>
            <div style="padding:10px;background-color:#FF0000;height:22px;width:135px;border:5px solid black;">
                <?php echo 'SIN MANTENCION '.$row4p1['sinmantencionp1'].'%';?>
            </div>
            <div style="padding:10px;background-color:#FF9900;height:22px;width:135px;border:5px solid black;">
                <?php echo  'FALLANDO ' .$row2p1['fallop1'].'%';?>
            </div>
            <div style="padding:10px;background-color:#9933CC;height:22px;width:135px;border:5px solid black;">
                <?php echo 'EN MANTENCION '. $row3p1['mantencionp1'].'%';?>
            </div>
        </div>
        
        <div id='stats3'>contacto@bim.cl</div>

        <script src="../../three.js"></script>
        <script src="../../OrbitControls.js"></script>
        <script src="../../Projector.js"></script>
        <script src="../../STLLoader.js"></script>
        <script src="../../jquery.js"></script>
        <script src="../../tween.min.js"></script>
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
        <script>
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
                var clima, piso1, piso2, piso3, piso4;
                var dirEquipos = [], dirEquipos2 = [];
                init();
                animate();

                function addGeometry() {
                    var loader = new THREE.STLLoader();


                  loader.load('../../edificiostl/MUROS PRIMER PISO.stl', function (geometry) {
                        piso1 = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
                        piso1.opacity = 0.2;

                        var mesh = new THREE.Mesh(geometry, piso1);
                        mesh.renderOrder = 0;
                        mesh.doubleSided = true;
                        mesh.frustumCulled = false;
                        mesh.position.set(0, 0, 0);
                        mesh.scale.set(0.2, 0.2, 0.2);
                        mesh.castShadow = true;
                        //mesh.receiveShadow = true;
                        mesh.name = "PISO 1";
                        scene.add(mesh);
                    });
                    
                    loader.load('../../edificiostl/LOSAS PRIMER PISO.stl', function (geometry) {
                        piso2 = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
                        piso2.opacity = 0.2;
                        var mesh = new THREE.Mesh(geometry, piso2);
                        mesh.renderOrder = 0;
                        mesh.doubleSided = true;
                        mesh.frustumCulled = false;
                        mesh.position.set(0, 0, 0);
                        mesh.scale.set(0.2, 0.2, 0.2);
                        mesh.castShadow = true;
                        mesh.name = "PISO 2";
                        scene.add(mesh);

                    });
                    loader.load('../../edificiostl/SISTEMA ALC GRAL.stl', function (geometry) {
                        alcgral = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
                        alcgral.opacity = 0.5;

                        var mesh = new THREE.Mesh(geometry, alcgral);
                        mesh.renderOrder = 0;
                        mesh.doubleSided = true;
                        mesh.frustumCulled = false;
                        mesh.position.set(0, 0, 0);
                        mesh.scale.set(0.2, 0.2, 0.2);
                        mesh.castShadow = true;
                        //mesh.receiveShadow = true;
                        mesh.name = "ALC GRAL";
                        scene.add(mesh);
                    });
                    loader.load('../../edificiostl/ESTANQUE SISTEMA.stl', function (geometry) {
                        estanque = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
                        estanque.opacity = 0.5;

                        var mesh = new THREE.Mesh(geometry, estanque);
                        mesh.renderOrder = 0;
                        mesh.doubleSided = true;
                        mesh.frustumCulled = false;
                        mesh.position.set(0, 0, 0);
                        mesh.scale.set(0.2, 0.2, 0.2);
                        mesh.castShadow = true;
                        //mesh.receiveShadow = true;
                        mesh.name = "ESTANQUE SISTEMA";
                        scene.add(mesh);    
                    });

                }

                function equipos(stl, data)
                {
                    var loader = new THREE.STLLoader();
                    var dir = "../../equipos/";
                    var formato = ".stl";
                    var direccion = dir.concat(stl, formato);
                    subid=data[8].substr(0,2);

                   if(subid=='CD'){
                  loader.load(direccion, function (geometry) {
                        //console.log(data);
                        if (data[1] == "BUENO")
                        {
                            stlequipos = new THREE.MeshLambertMaterial({color: 0x009900, transparent: true, opacity: 1});
                            stlequipos.opacity = 1;
                        } else if (data[1] == "SIN MANTENCION")
                        {
                            stlequipos = new THREE.MeshLambertMaterial({color: 0xFF6600, transparent: true, opacity: 1});
                            stlequipos.opacity = 1;
                        } else if (data[1] == "FALLANDO")
                        {
                            stlequipos = new THREE.MeshLambertMaterial({color: 0xFF9900, transparent: true, opacity: 1});
                            stlequipos.opacity = 1;
                        } else if (data[1] == "EN MANTENCION")
                        {
                            stlequipos = new THREE.MeshLambertMaterial({color: 0x9933CC, transparent: true, opacity: 1});
                            stlequipos.opacity = 1;
                        }
                        var mesh = new THREE.Mesh(geometry, stlequipos);
                        mesh.frustumCulled = false;
                        mesh.position.set(0, y, 0);
                        mesh.scale.set(0.2, 0.2, 0.2);
                        mesh.userData.equipo = data[0];
                        mesh.userData.estadoequipo = data[1];
                        mesh.userData.recinto = data[3];
                        mesh.userData.piso = data[2];
                        mesh.userData.nombreinstalacion = data[4];
                        mesh.userData.nombrefabricante = data[5];
                        mesh.userData.modelo = data[6];
                        mesh.userData.nombreproveedor = data[7];
                        mesh.userData.fechainstalacion = data[9];
                        mesh.userData.fechacaducidadgarantia = data[10];
                        mesh.userData.acreditacion = data[11];
                        mesh.userData.imagen = data[12];
                        mesh.userData.x = data[13];
                        mesh.userData.y = data[14];
                        mesh.userData.z = data[15];
                        mesh.name = stl;
                        objects.push(mesh);
                        scene.add(mesh);

                    });       
                }
                }

                
                function correo() {

                    $.ajax({
                        url: '../../notificaciones.php', //the script to call to get data          
                        data: "id=" + idglobal, //you can insert url argumnets here to pass to api.php
                        //for example "id=5&parent=6"
                        dataType: 'json', //data format      
                        success: function (data)          //on recieve of reply
                        {
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });

                }

                function estadoEquipo(estado) {
                    console.log("Boton apretado");
                    correo();
                    $.ajax({
                        url: '../../updateestado.php', //the script to call to get data          
                        data: "id=" + idglobal + "&estado=" + estado, //you can insert url argumnets here to pass to api.php
                        //for example "id=5&parent=6"
                        dataType: 'json', //data format      
                        success: function (data)          //on recieve of reply
                        {

                        },
                        error: function (data) {
                        }
                    });

                }
                function listaEquipos() {

                    $.ajax({
                        url: 'testajaxpiso1.php', //the script to call to get data          
                        data: "", //you can insert url argumnets here to pass to api.php
                        //for example "id=5&parent=6"
                        dataType: 'json', //data format      
                        success: function (data)          //on recieve of reply
                        {
                            //console.log(data)
                            for (var x in data) {
                                dirEquipos.push(data[x]);
                            }
                            for (var j = 0; j < dirEquipos.length; j++)
                            {
                                equipos(dirEquipos[j][8], dirEquipos[j]);
                                //console.log(dirEquipos[j]);
                            }
                        },
                        error: function (data) {
                            console.log(data);
                        }
                    });

                }

                function listaEquiposColor() {

                    $.ajax({
                        url: 'testajaxpiso1.php', //the script to call to get data          
                        data: "", //you can insert url argumnets here to pass to api.php
                        //for example "id=5&parent=6"
                        dataType: 'json', //data format      
                        success: function (data)          //on recieve of reply
                        {

                            dirEquipos2 = [];

                            for (var x in data) {
                                dirEquipos2.push(data[x]);
                            }
                            for (var j = 0; j < dirEquipos2.length; j++)
                            {
                                if (dirEquipos[j][1] != dirEquipos2[j][1])
                                {
                                    console.log("Estado Equipo " + dirEquipos[j][8] + " cambio de " + dirEquipos[j][1] + " a " + dirEquipos2[j][1]);
                                    var k = 0;
                                    while (dirEquipos[j][8] != objects[k].name)
                                    {
                                        k++;
                                    }
                                    objects.splice(k, 1);

                                    scene.remove(scene.getObjectByName(dirEquipos[j][8]));
                                    equipos(dirEquipos2[j][8], dirEquipos2[j]);
                                    if (target.name == dirEquipos2[j][8])
                                    {
                                        var eid = dirEquipos2[j][8].substr(0,2);
                                       if(eid=='CD'){
                                        statsNode.innerHTML = "<a href='../../../fichas/ficha_equipos_instalaciones.php?id=" + dirEquipos2[j][8] + "' target='_blank'>Ficha Equipo ID: " + dirEquipos2[j][8] + "</a><br><br>Equipo: " + dirEquipos2[j][0] + "<br><br>Estado: " + dirEquipos2[j][1] + "<br><br>Instalacion: " + dirEquipos2[j][4] + "<br><br>Fabricante: " + dirEquipos2[j][5] + "<br><br>Modelo: " + dirEquipos2[j][6] + "<br><br>Proveedor: " + dirEquipos2[j][7] + "<br><br>Recinto: " + dirEquipos2[j][3] + "<br><br>Fecha instalación: " + dirEquipos2[j][9] + "<br><br>Caducidad Garantia: " + dirEquipos2[j][10] + "<br><br>Categoria: " + dirEquipos2[j][11] + "<br><br><IMG  SRC=../../../mod_instalacion/" + dirEquipos2[j][12] + " height='180px' width='180px' border='1.5px'><br><br>";
                                        }
                                    }
                                }

                            }



                            dirEquipos = [];
                            for (var x in data) {
                                dirEquipos.push(data[x]);
                            }
                        },
                        error: function (data) {
                            console.log(data);
                        }
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
                     $.post("../../update_coordenadas.php",parametros);
                } 



                function init() {
                    container = document.createElement('div');
                    document.body.appendChild(container);

                    camera = new THREE.PerspectiveCamera(70, window.innerWidth / window.innerHeight, 1, 450000);
                    camera.position.set(7000, 22000, 12000);
                    camera.up.set(0, 0, 1);

                    scene = new THREE.Scene();

                    var hemiLight = new THREE.HemisphereLight(0xffffff, 0xffffff, 0.6);
                    hemiLight.color.setHSL(0.6, 1, 0.6);
                    hemiLight.groundColor.setHSL(0.095, 1, 0.75);
                    hemiLight.position.set(0, 0, 100000);
                    scene.add(hemiLight);

                    //

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
                    sky.rotation.y = -Math.PI / 4;
                    scene.add(sky);


                    addGeometry();
                    listaEquipos();
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
                    controls.target.set(-10863, -15420, 0);
                    controls.maxPolarAngle = Math.PI / 2;
document.getElementById("search").disabled=false;
document.getElementById("search").focus(3);
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
                        if(hola=='CD'){
                        statsNode1.style.display = 'block';
                                     statsNode.innerHTML = "<a href='../../../fichas/ficha_equipos_instalaciones.php?id=" + target.name + "' target='_blank'>Ficha Equipo ID: " + target.name + "</a><br><br>Nombre: " + target.userData.equipo + "<br><br>Estado: " + target.userData.estadoequipo + "<br><br>Instalacion: " + target.userData.nombreinstalacion + "<br><br>Fabricante: " + target.userData.nombrefabricante + "<br><br>Modelo: " + target.userData.modelo + "<br><br>Proveedor: " + target.userData.nombreproveedor + "<br><br>Recinto: " + target.userData.recinto + "<br><br>Fecha de Instalacion: " + target.userData.fechainstalacion + "<br><br>Caducidad: " + target.userData.fechacaducidadgarantia + "<br><br>Categoria: " + target.userData.acreditacion + "<br><br><IMG SRC=../../../mod_instalacion/" + target.userData.imagen + " height='180px' id='imagen1' width='180px' border='1.5px'><br><br>";
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
                            altura = target.userData.piso;
                            controls.enabled = false;
                            var vecCamera = new THREE.Vector2();
                            vecCamera.x = -intercepcion[0].point.x + camera.position.x;
                            vecCamera.y = -intercepcion[0].point.y + camera.position.y;
                            var moduloVecCamera = Math.pow(vecCamera.x * vecCamera.x + vecCamera.y * vecCamera.y, 0.5);
                            vecCamera.x = vecCamera.x / moduloVecCamera;
                            vecCamera.y = vecCamera.y / moduloVecCamera;
                            new TWEEN.Tween(camera.position).to({
                                x: intercepcion[0].point.x + vecCamera.x * 500,
                                y: intercepcion[0].point.y + vecCamera.y * 500, z: target.userData.piso + 500},
                                    1000).easing(TWEEN.Easing.Linear.None).start();

                            new TWEEN.Tween(controls.target).to({
                                x: intercepcion[0].point.x,
                                y: intercepcion[0].point.y, z: target.userData.piso + 400},
                                    1000).easing(TWEEN.Easing.Linear.None).onComplete(function () {
                                controls.enabled = true;
                            }).start();

                            updatePosicion(intercepcion[0].point.x, intercepcion[0].point.y, target.userData.piso, target.name);


                        }
                    } else if (intercepcion2.length > 0 && event.which === 3) {

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
console.log(id);
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
        if(subidd=='CD'){
                        statsNode.innerHTML = "<a href='http://www.bim.cl/BIM/hospital_calvo_mackenna/fichas/ficha_equipos_instalaciones.php?id=" + buscado.name + "' target='_blank'>Ficha Equipo ID: " +buscado.name + "</a><br><br>Nombre: " + buscado.userData.equipo + "<br><br>Estado: " + buscado.userData.estadoequipo + "<br><br>Tipo: " + buscado.userData.nombreinstalacion + "<br><br>Fabricante: " + buscado.userData.nombrefabricante + "<br><br>Modelo: " + buscado.userData.modelo + "<br><br>Proveedor: " + buscado.userData.nombreproveedor + "<br><br>Sector: " + buscado.userData.recinto + "<br><br>Instalacion: " + buscado.userData.fechainstalacion + "<br><br>Caducidad: " + buscado.userData.fechacaducidadgarantia + "<br><br>Categoria: " + buscado.userData.acreditacion + "<br><br><IMG SRC=../../../mod_instalacion/" + buscado.userData.imagen + " height='180px' id='imagen1' width='180px' border='1.5px'><br><br>";
                        }

                            vecCamera.x = -axisx + camera.position.x;
                            vecCamera.y = -axisy + camera.position.y;
                            var moduloVecCamera = Math.pow(vecCamera.x * vecCamera.x + vecCamera.y * vecCamera.y, 0.5);
                            vecCamera.x = vecCamera.x / moduloVecCamera;
                            vecCamera.y = vecCamera.y / moduloVecCamera;
                            new TWEEN.Tween(camera.position).to({
                                x: axisx+vecCamera.x * 500,
                                y: axisy+vecCamera.y * 500, z: axisz + 500},
                                    1000).easing(TWEEN.Easing.Linear.None).start();

                            new TWEEN.Tween(controls.target).to({
                                x: axisx,
                                y: axisy, z: axisz + 700},
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
        </script>
    </body>
</html>
