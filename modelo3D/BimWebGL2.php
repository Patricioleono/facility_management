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
            #stats1 {
                position: absolute;
                right: 10px;
                top: 5px;
                bottom: 5%;
                color: #fff;
                text-align: left;
                background: rgba(0, 0, 0, 0.5);
                padding: 10px;
                width: 200px;
                display : none;
                height: 95%;
                border: solid 1px black;
                border-radius: 5px;
                font-family:Arial;
                font-size:12px;
                font-weight: normal;
                text-align: left;
                text-decoration:none;
            }

            #stats1 a:link, a:visited{
                text-decoration: none;
                color: #70DB93;
                font-weight: bold;
                font-size: 12px;
            }
            #stats1 a:hover {
                background: rgba(0, 0, 0, 0.5);
                Color: #70DB93;
                font-style: italic;
                font-size: 12px;
            }
            #stats1 a:active{
                background: #2A0A0A;
                Color: #70DB93;
                font-style: normal;
                font-size: 12px;
            }
        </style>
        <link rel="stylesheet" href="css/fontello.css">
        <link rel="stylesheet" href="css/css_mdi.css">

    </head>

    <body>
        <div id="info">
            <button id="Transparentar" onclick="transparent(techumbre);transparent(losas);transparent(muros);transparent(pilares);transparent(fund);transparent(p3_tabiques);transparent(bpc);transparent(cl);transparent(vigas2pp);transparent(vigas3pp);transparent(vigas4pp);transparent(vigas1p);transparent(vigas2p);transparent(vigas3p);transparent(vigas4p);transparent(vigas5p);">Transparentar</button>

        </div>
        <div id="pisos">
            <button id="p1" onclick="camarapiso(0)">Primer Piso</button>
            <button id="p2" onclick="camarapiso(1000)">Segundo Piso</button>
            <button id="p3" onclick="camarapiso(2000)">Tercer Piso</button>
            <button id="p4" onclick="camarapiso(2800)">Cuarto Piso</button>


        </div>

        <div id='stats1'>
            <div id='stats'></div>
            <input type=button value="Notificar Fallo" name="Enviar" id="boton1" onclick=estadoEquipo("PENDIENTE")> 
        </div>
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
    var techumbre, losas, muros, fund, pilares, vigas1p, vigas2p, vigas3p, vigas4p, vigas5p, vigas2pp, vigas3pp, vigas4pp;
    var dirEquipos = [], dirEquipos2 = [];
    init();
    animate();
    function addGeometry() {
        var loader = new THREE.STLLoader();
        loader.load('edificio/CUBIERTA.stl', function (geometry) {
            techumbre = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
            techumbre.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, techumbre);
            mesh.renderOrder = 2;
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
            muros.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, muros);
            mesh.renderOrder = 2;
            mesh.doubleSided = true;
            mesh.frustumCulled = false;
            mesh.position.set(0, 0, 0);
            mesh.scale.set(0.2, 0.2, 0.2);
            mesh.castShadow = true;
            //mesh.receiveShadow = true;
            mesh.name = "MUROS";
            scene.add(mesh);

        });


        loader.load('edificio/LOSAS.stl', function (geometry) {
            losas = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
            losas.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, losas);
            mesh.renderOrder = 2;
            mesh.doubleSided = true;
            mesh.frustumCulled = false;
            mesh.position.set(0, 0, 0);
            mesh.scale.set(0.2, 0.2, 0.2);
            mesh.castShadow = true;
            //mesh.receiveShadow = true;
            mesh.name = "LOSAS";
            objects2.push(mesh);
            scene.add(mesh);

        });

        loader.load('edificio/IMAGENOLOGIA.stl', function (geometry) {
            imagenologia = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
            imagenologia.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, imagenologia);
            mesh.renderOrder = 1;
            mesh.doubleSided = true;
            mesh.frustumCulled = false;
            mesh.position.set(0, 0, 0);
            mesh.scale.set(0.2, 0.2, 0.2);
            mesh.castShadow = true;
            //mesh.receiveShadow = true;
            mesh.name = "IMAGENOLOGIA";

            scene.add(mesh);

        });
        loader.load('edificio/P3_TABIQUES.stl', function (geometry) {
            p3_tabiques = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
            p3_tabiques.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, p3_tabiques);
            mesh.renderOrder = 1;
            mesh.doubleSided = true;
            mesh.frustumCulled = false;
            mesh.position.set(0, 0, 0);
            mesh.scale.set(0.2, 0.2, 0.2);
            mesh.castShadow = true;
            //mesh.receiveShadow = true;
            mesh.name = "P3_TABIQUES";

            scene.add(mesh);

        });
        loader.load('edificio/BIM6D.stl', function (geometry) {
            bim6d = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
            bim6d.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, bim6d);
            mesh.renderOrder = 1;
            mesh.doubleSided = true;
            mesh.frustumCulled = false;
            mesh.position.set(0, 0, 0);
            mesh.scale.set(0.2, 0.2, 0.2);
            mesh.castShadow = true;
            //mesh.receiveShadow = true;
            mesh.name = "BIM6D";

            scene.add(mesh);

        });
                loader.load('edificio/AF AC.stl', function (geometry) {
            afac = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
            afac.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, afac);
            mesh.renderOrder = 1;
            mesh.doubleSided = true;
            mesh.frustumCulled = false;
            mesh.position.set(0, 0, 0);
            mesh.scale.set(0.2, 0.2, 0.2);
            mesh.castShadow = true;
            //mesh.receiveShadow = true;
            mesh.name = "AFAC";

            scene.add(mesh);

        });
                        loader.load('edificio/ALC polimesh.stl', function (geometry) {
            alcp = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
            alcp.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, alcp);
            mesh.renderOrder = 1;
            mesh.doubleSided = true;
            mesh.frustumCulled = false;
            mesh.position.set(0, 0, 0);
            mesh.scale.set(0.2, 0.2, 0.2);
            mesh.castShadow = true;
            //mesh.receiveShadow = true;
            mesh.name = "alcp";

            scene.add(mesh);

        });
                                loader.load('edificio/CATRES CLINICOS.stl', function (geometry) {
            catresc = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
            catresc.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, catresc);
            mesh.renderOrder = 1;
            mesh.doubleSided = true;
            mesh.frustumCulled = false;
            mesh.position.set(0, 0, 0);
            mesh.scale.set(0.2, 0.2, 0.2);
            mesh.castShadow = true;
            //mesh.receiveShadow = true;
            mesh.name = "catresc";

            scene.add(mesh);

        });
                                        loader.load('edificio/CIELO LAMP.stl', function (geometry) {
            cielolamp = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
            cielolamp.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, cielolamp);
            mesh.renderOrder = 1;
            mesh.doubleSided = true;
            mesh.frustumCulled = false;
            mesh.position.set(0, 0, 0);
            mesh.scale.set(0.2, 0.2, 0.2);
            mesh.castShadow = true;
            //mesh.receiveShadow = true;
            mesh.name = "cielolamp";

            scene.add(mesh);

        });
                                                loader.load('edificio/GASS CLINIC_.stl', function (geometry) {
            gassclinic = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
            gassclinic.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, gassclinic);
            mesh.renderOrder = 1;
            mesh.doubleSided = true;
            mesh.frustumCulled = false;
            mesh.position.set(0, 0, 0);
            mesh.scale.set(0.2, 0.2, 0.2);
            mesh.castShadow = true;
            //mesh.receiveShadow = true;
            mesh.name = "gassclinic";

            scene.add(mesh);

        });
                                                        loader.load('edificio/SPK MESH.stl', function (geometry) {
            spkmesh = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
            spkmesh.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, spkmesh);
            mesh.renderOrder = 1;
            mesh.doubleSided = true;
            mesh.frustumCulled = false;
            mesh.position.set(0, 0, 0);
            mesh.scale.set(0.2, 0.2, 0.2);
            mesh.castShadow = true;
            //mesh.receiveShadow = true;
            mesh.name = "spkmesh";

            scene.add(mesh);

        });
                                                                loader.load('edificio/SPK.stl', function (geometry) {
            spk1 = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
            spk1.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, spk1);
            mesh.renderOrder = 1;
            mesh.doubleSided = true;
            mesh.frustumCulled = false;
            mesh.position.set(0, 0, 0);
            mesh.scale.set(0.2, 0.2, 0.2);
            mesh.castShadow = true;
            //mesh.receiveShadow = true;
            mesh.name = "spk1";

            scene.add(mesh);

        });
                                                                        loader.load('edificio/SPK____ACIS.stl', function (geometry) {
            spk2 = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
            spk2.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, spk2);
            mesh.renderOrder = 1;
            mesh.doubleSided = true;
            mesh.frustumCulled = false;
            mesh.position.set(0, 0, 0);
            mesh.scale.set(0.2, 0.2, 0.2);
            mesh.castShadow = true;
            //mesh.receiveShadow = true;
            mesh.name = "spk2";

            scene.add(mesh);

        });
                                                                                loader.load('edificio/SPK_1.stl', function (geometry) {
            spk2 = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
            spk2.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, spk2);
            mesh.renderOrder = 1;
            mesh.doubleSided = true;
            mesh.frustumCulled = false;
            mesh.position.set(0, 0, 0);
            mesh.scale.set(0.2, 0.2, 0.2);
            mesh.castShadow = true;
            //mesh.receiveShadow = true;
            mesh.name = "spk2";

            scene.add(mesh);

        });
        loader.load('edificio/catres.stl', function (geometry) {
            catres = new THREE.MeshLambertMaterial({color: 0x00CC00, transparent: true, opacity: 1});
            catres.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, catres);
            mesh.renderOrder = 1;
            mesh.doubleSided = true;
            mesh.frustumCulled = false;
            mesh.position.set(0, 0, 0);
            mesh.scale.set(0.2, 0.2, 0.2);
            mesh.castShadow = true;
            //mesh.receiveShadow = true;
            mesh.name = "CATRES";

            scene.add(mesh);

        });
        loader.load('edificio/BIM6D.stl', function (geometry) {
            bim6d = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
            bim6d.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, bim6d);
            mesh.renderOrder = 1;
            mesh.doubleSided = true;
            mesh.frustumCulled = false;
            mesh.position.set(0, 0, 0);
            mesh.scale.set(0.2, 0.2, 0.2);
            mesh.castShadow = true;
            //mesh.receiveShadow = true;
            mesh.name = "BIM6D";

            scene.add(mesh);

        });
        loader.load('edificio/CORREO NEUMATIC.stl', function (geometry) {
            correoneumatic = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
            correoneumatic.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, correoneumatic);
            mesh.renderOrder = 1;
            mesh.doubleSided = true;
            mesh.frustumCulled = false;
            mesh.position.set(0, 0, 0);
            mesh.scale.set(0.2, 0.2, 0.2);
            mesh.castShadow = true;
            //mesh.receiveShadow = true;
            mesh.name = "CORREONEUMATIC";

            scene.add(mesh);

        });
        loader.load('edificio/cl polimesh.stl', function (geometry) {
            cl = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
            cl.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, cl);
            mesh.renderOrder = 1;
            mesh.doubleSided = true;
            mesh.frustumCulled = false;
            mesh.position.set(0, 0, 0);
            mesh.scale.set(0.2, 0.2, 0.2);
            mesh.castShadow = true;
            //mesh.receiveShadow = true;
            mesh.name = "CL";

            scene.add(mesh);

        });

        loader.load('edificio/VIGAS DEFGHIJ_2P.stl', function (geometry) {
            vigas2pp = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
            vigas2pp.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, vigas2pp);
            mesh.renderOrder = 1;
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
            vigas3pp.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, vigas3pp);
            mesh.renderOrder = 1;
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
            vigas4pp.opacity = 0.3;

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
            fund.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, fund);
            mesh.renderOrder = 1;
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
            pilares.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, pilares);
            mesh.renderOrder = 1;
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
            vigas2p.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, vigas2p);
            mesh.renderOrder = 1;
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
            vigas3p.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, vigas3p);
            mesh.renderOrder = 1;
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
            vigas4p.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, vigas4p);
            mesh.renderOrder = 1;
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
            vigas5p.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, vigas5p);
            mesh.renderOrder = 1;
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
            vigas1p.opacity = 0.3;

            var mesh = new THREE.Mesh(geometry, vigas1p);
            mesh.renderOrder = 1;
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
    function equipos(stl, data)
    {

        var loader = new THREE.STLLoader();
        var dir = "equipos/";
        var formato = ".stl";
        var direccion = dir.concat(stl, formato);
        loader.load(direccion, function (geometry) {
            console.log(data);
            if (data[1] == "BUENO")
            {
                stlequipos = new THREE.MeshLambertMaterial({color: 0x00CC00, transparent: true, opacity: 1});
                stlequipos.opacity = 1;
            } else if (data[1] == "MALO")
            {
                stlequipos = new THREE.MeshLambertMaterial({color: 0x003366, transparent: true, opacity: 1});
                stlequipos.opacity = 1;
            } else if (data[1] == "PENDIENTE")
            {
                stlequipos = new THREE.MeshLambertMaterial({color: 0xFF0000, transparent: true, opacity: 1});
                stlequipos.opacity = 1;
            } else if (data[1] == "EN REPARACION")
            {
                stlequipos = new THREE.MeshLambertMaterial({color: 0x9933CC, transparent: true, opacity: 1});
                stlequipos.opacity = 1;
            }

            var mesh = new THREE.Mesh(geometry, stlequipos);
            mesh.frustumCulled = false;
            mesh.position.set(0, y, 0);
            mesh.scale.set(0.2, 0.2, 0.2);
            mesh.userData.nombreequipo = data[0];
            mesh.userData.estadoequipo = data[1];
            mesh.userData.codigoubicacion = data[3];
            mesh.userData.piso = (data[2] - 1) * 1000;
            mesh.userData.tipoequipo = data[4];
            mesh.userData.nombrefabricante = data[5];
            mesh.userData.numeromodelo = data[6];
            mesh.userData.nombreproveedor = data[7];
            mesh.userData.fechainstalacion = data[9];
            mesh.userData.fechacaducidadgarantia = data[10];
            mesh.userData.acreditacion = data[11];
            mesh.userData.imagen = data[12];
            //mesh.castShadow = true;
            //mesh.receiveShadow = true;
            mesh.name = stl;
            mesh.userData.piso = 2000;

            objects.push(mesh);
            scene.add(mesh);
        });
    }

    function estadoEquipo(estado) {
        console.log("Boton apretado");
        $.ajax({
            url: 'updateestado.php', //the script to call to get data          
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
            url: 'testajax.php', //the script to call to get data          
            data: "", //you can insert url argumnets here to pass to api.php
            //for example "id=5&parent=6"
            dataType: 'json', //data format      
            success: function (data)          //on recieve of reply
            {
                console.log(data)
                for (var x in data) {
                    dirEquipos.push(data[x]);
                }
                for (var j = 0; j < dirEquipos.length; j++)
                {
                    equipos(dirEquipos[j][8], dirEquipos[j]);
                    console.log(dirEquipos[j]);
                }
            },
            error: function (data) {
                console.log(data);
            }
        });

    }

    function listaEquiposColor() {

        $.ajax({
            url: 'testajax.php', //the script to call to get data          
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
                            statsNode.innerHTML = "<a href='http://http://www.bim.cl/BIM/hospital_arequipa/fichas/ficha_equipos_medicos.php?id=" + dirEquipos2[j][8] + "' target='_blank'>Ficha Equipo ID: " + dirEquipos2[j][8] + "</a><br><br>Nombre: " + dirEquipos2[j][0] + "<br><br>Estado: " + dirEquipos2[j][1] + "<br><br>Tipo: " + dirEquipos2[j][4] + "<br><br>Fabricante: " + dirEquipos2[j][5] + "<br><br>Modelo: " + dirEquipos2[j][6] + "<br><br>Proveedor: " + dirEquipos2[j][7] + "<br><br>Sector: " + dirEquipos2[j][3] + "<br><br>Fecha instalación: " + dirEquipos2[j][9] + "<br><br>Caducidad Garantia: " + dirEquipos2[j][10] + "<br><br>Categoria: " + dirEquipos2[j][11] + "<br><br><IMG  SRC=../mod_inventario/elementos/" + dirEquipos2[j][12] + " height='180px' width='180px' border='1.5px'><br><br>";
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
        if (objeto.opacity == 1) {
            objeto.opacity = 0.3;
        } else {
            objeto.opacity = 1;
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

    function init() {
        container = document.createElement('div');
        document.body.appendChild(container);

        camera = new THREE.PerspectiveCamera(70, window.innerWidth / window.innerHeight, 1, 450000);
        camera.position.set(-11000, 12000, 3500);
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

        dirLight.shadowMapWidth = 2048;
        dirLight.shadowMapHeight = 2048;

        var d = 500;

        dirLight.shadowCameraLeft = -d;
        dirLight.shadowCameraRight = d;
        dirLight.shadowCameraTop = d;
        dirLight.shadowCameraBottom = -d;

        dirLight.shadowCameraFar = 35000;
        dirLight.shadowBias = -0.0001;

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
        console.log(scene.children.length);
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

            statsNode1.style.display = 'block';
            statsNode.innerHTML = "<a href='http://http://www.bim.cl/BIM/hospital_arequipa/fichas/ficha_equipos_medicos.php?id=" + target.name + "' target='_blank'>Ficha Equipo ID: " + target.name + "</a><br><br>Nombre: " + target.userData.nombreequipo + "<br><br>Estado: " + target.userData.estadoequipo + "<br><br>Tipo: " + target.userData.tipoequipo + "<br><br>Fabricante: " + target.userData.nombrefabricante + "<br><br>Modelo: " + target.userData.numeromodelo + "<br><br>Proveedor: " + target.userData.nombreproveedor + "<br><br>Sector: " + target.userData.codigoubicacion + "<br><br>Instalacion: " + target.userData.fechainstalacion + "<br><br>Caducidad: " + target.userData.fechacaducidadgarantia + "<br><br>Categoria: " + target.userData.acreditacion + "<br><br><IMG  SRC=../mod_inventario/elementos/" + target.userData.imagen + " height='180px' width='180px' border='1.5px'><br><br>";

            if (event.which === 3) {
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
                    y: intercepcion[0].point.y, z: target.userData.piso +400},
                        1000).easing(TWEEN.Easing.Linear.None).onComplete(function () {
                    controls.enabled = true;
                }).start();



            }
        } else if (intercepcion2.length > 0 && event.which === 3) {

            statsNode1.style.display = 'none';
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
