
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
            #stats {
                position: absolute;
                right: 10px;
                top: 5px;
                color: #fff;
                text-align: left;
                background: rgba(0, 0, 0, 0.5);
                padding: 10px;
                width: 200px;
                height: 60px;
                border: solid 1px black;
                border-radius: 5px;
            }


            span.link {
                color: skyblue;
                cursor: pointer;
                text-decoration : underline;
            }

        </style>
    </head>

    <body>
        <div id="info">
            <span class="link" id="tech">Techumbre</span>,
            <span class="link" id="los">Losas</span>,
            <span class="link" id="mur">Muros</span>,
        </div>
        <div id="stats"></div>
        <script src="three.js"></script>
        <script src="OrbitControls.js"></script>
        <script src="Projector.js"></script>
        <script src="STLLoader.js"></script>
        <script>
            var container;
            var camera, scene, controls, renderer;
            var raycast, objects = [];
            var mouse, controls;
			var i = 1;
            var plane = new THREE.Plane();
            var statsNode = document.getElementById('stats');
            var techumbre, losas, muros;
            init();
            animate();
            function addGeometry() {
                var loader = new THREE.STLLoader();
                loader.load('stl/TECHUMBRE.stl', function (geometry) {
                    techumbre = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
                    techumbre.opacity = 1;

                    var mesh = new THREE.Mesh(geometry, techumbre);
                    mesh.position.set(0, 0, 0);
                    mesh.scale.set(0.2, 0.2, 0.2);
                    mesh.castShadow = true;
                    mesh.receiveShadow = true;
                    objects.push(mesh);
                    scene.add(mesh);

                });

                   loader.load('stl/MUROS.stl', function (geometry) {
                    muros = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
                    muros.opacity = 1;

                    var mesh = new THREE.Mesh(geometry, muros);
                    mesh.position.set(0, 0, 0);
                    mesh.scale.set(0.2, 0.2, 0.2);
                    mesh.castShadow = true;
                    mesh.receiveShadow = true;
                    objects.push(mesh);
                    scene.add(mesh);

                });


                loader.load('stl/LOSAS.stl', function (geometry) {
                    losas = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
                    losas.opacity = 1;

                    var mesh = new THREE.Mesh(geometry, losas);
                    mesh.position.set(0, 0, 0);
                    mesh.scale.set(0.2, 0.2, 0.2);
                    mesh.castShadow = true;
                    mesh.receiveShadow = true;
                    objects.push(mesh);
                    scene.add(mesh);

                });





        }
         function equipos(stl)
        {
            var loader = new THREE.STLLoader();
            var dir = "equipos/";
            var formato = ".stl";
            var direccion = dir.concat(stl,formato);
                    loader.load(direccion, function (geometry) {
                    stlequipos = new THREE.MeshLambertMaterial({color: 0xCCCCCC, transparent: true, opacity: 1});
                    stlequipos.opacity = 1;

                    var mesh = new THREE.Mesh(geometry, stlequipos);
                    mesh.position.set(0, 0, 0);
                    mesh.scale.set(0.2, 0.2, 0.2);
                    mesh.castShadow = true;
                    mesh.receiveShadow = true;
                    mesh.name = "stl";
                    objects.push(mesh);
                    scene.add(mesh);
                });     
        }

            function init() {
                container = document.createElement('div');
                document.body.appendChild(container);

                camera = new THREE.PerspectiveCamera(70, window.innerWidth / window.innerHeight, 1, 100000);
                camera.position.set(-11000,12000,3500);
                camera.up.set( 0, 0, 1 );
				

                scene = new THREE.Scene();

                scene.add(new THREE.HemisphereLight(0x443333, 0x111122));
                addShadowedLight(1, 1, 1, 0xffffff, 1.35);
                addShadowedLight(0.5, 1, -1, 0xffaa00, 1);


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
    echo'equipos('.$nombre_fichero.');';
   }
}
?>

                document.getElementById('tech').addEventListener('click', function () {
                    if (techumbre.opacity == 1) {
                        techumbre.opacity = 0;
                    } else {
                        techumbre.opacity = 1;
                    }
                });
                document.getElementById('los').addEventListener('click', function () {
                    if (losas.opacity == 1) {
                        losas.opacity = 0;
                    } else {
                        losas.opacity = 1;
                    }
                });
                document.getElementById('mur').addEventListener('click', function () {
                    if (muros.opacity == 1) {
                        muros.opacity = 0;
                    } else {
                        muros.opacity = 1;
                    }
                });

                raycast = new THREE.Raycaster();
                mouse = new THREE.Vector2();

                renderer = new THREE.WebGLRenderer();
                renderer.setClearColor(0xf0f0f0);
                renderer.setPixelRatio(window.devicePixelRatio);
                renderer.setSize(window.innerWidth, window.innerHeight);
                document.body.appendChild(renderer.domElement);
                
                controls = new THREE.OrbitControls(camera, renderer.domElement);
                controls.enableDamping = true;
                controls.dampingFactor = 0.25;
                controls.enableZoom = true;
				controls.target.set(-10863, -15420, 0);
                controls.maxPolarAngle = Math.PI/2;

                window.addEventListener('resize', onWindowResize, false);
                            document.addEventListener('mousedown', onDocumentMouseDown, false);
							document.addEventListener('touchstart', onDocumentMouseStart, false);
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
                            var intercepcion = raycast.intersectObjects ( objects );
                            if(intercepcion.length > 0){
                                
                                //intercepcion[ 0 ].object.material.color.setHex( Math.random() * 0xffffff );
                                var target = intercepcion[0].object;
                              statsNode.innerHTML = "<a href='https://www.youtube.com' target='_blank'>"+target.name+"</a>";
                            }
                        }

            function animate() {
                requestAnimationFrame(animate);
                render();
                controls.update();
            }

            function render() {
//statsNode.innerHTML = 'x: '+controls.target.x+' y: '+controls.target.y + ' z:'+controls.target.z;
				//statsNode.innerHTML = 'x: '+camera.position.x+' y: '+camera.position.y + ' z:'+camera.position.z;
                renderer.render(scene, camera);
            }
        </script>
    </body>
</html>
