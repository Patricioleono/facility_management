function equipos(stl, data, flag = null) {
    var loader = new THREE.STLLoader();
    var dir = "equipos/";
    var formato = ".stl";
    var direccion = dir.concat(stl, formato);
    subid = data[8].substr(0, 2);

    if(subid == 'CL') {
        if(flag == 'BUENO'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0x009900,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else if(flag == 'FALLANDO'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0xFF9900,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else if(flag == 'SIN MANTENCION'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0xFF0000,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else if(flag == 'EN MANTENCION'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0x9933CC,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else {
            loader.load(direccion, function (geometry) {
                if (data[1] == "BUENO") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0x009900,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }
                else if (data[1] == "SIN MANTENCION") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0xFF0000,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }
                else if (data[1] == "FALLANDO") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0xFF9900,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }
                else if (data[1] == "EN MANTENCION") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0x9933CC,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
    else if(subid == 'EM') {
        if(flag == 'BUENO'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0x009900,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else if(flag == 'FALLANDO'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0xFF9900,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else if(flag == 'SIN MANTENCION'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0xFF0000,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else if(flag == 'EN MANTENCION'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0x9933CC,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else {
            loader.load(direccion, function (geometry) {
                if (data[1] == "BUENO") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0x009900,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }
                else if (data[1] == "SIN MANTENCION") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0xFF0000,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }
                else if (data[1] == "FALLANDO") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0xFF9900,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }
                else if (data[1] == "EN MANTENCION") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0x9933CC,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
    else if(subid == 'AS'){
        if(flag == 'BUENO'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0x009900,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else if(flag == 'FALLANDO'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0xFF9900,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else if(flag == 'SIN MANTENCION'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0xFF0000,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else if(flag == 'EN MANTENCION'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0x9933CC,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else {
            loader.load(direccion, function (geometry) {
                if (data[1] == "BUENO") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0x009900,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }
                else if (data[1] == "SIN MANTENCION") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0xFF0000,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }
                else if (data[1] == "FALLANDO") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0xFF9900,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }
                else if (data[1] == "EN MANTENCION") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0x9933CC,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
    else if(subid== 'AR'){
        if(flag == 'BUENO'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0x009900,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else if(flag == 'FALLANDO'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0xFF9900,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else if(flag == 'SIN MANTENCION'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0xFF0000,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else if(flag == 'EN MANTENCION'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0x9933CC,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else {
            loader.load(direccion, function (geometry) {
                if (data[1] == "BUENO") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0x009900,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }
                else if (data[1] == "SIN MANTENCION") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0xFF0000,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }
                else if (data[1] == "FALLANDO") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0xFF9900,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }
                else if (data[1] == "EN MANTENCION") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0x9933CC,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
    else if(subid== 'AL'){
        if(flag == 'BUENO'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0x009900,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else if(flag == 'FALLANDO'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0xFF9900,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else if(flag == 'SIN MANTENCION'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0xFF0000,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else if(flag == 'EN MANTENCION'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0x9933CC,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else {
            loader.load(direccion, function (geometry) {
                if (data[1] == "BUENO") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0x009900,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }
                else if (data[1] == "SIN MANTENCION") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0xFF0000,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }
                else if (data[1] == "FALLANDO") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0xFF9900,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }
                else if (data[1] == "EN MANTENCION") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0x9933CC,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
    else if(subid== 'AP'){
        if(flag == 'BUENO'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0x009900,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else if(flag == 'FALLANDO'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0xFF9900,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else if(flag == 'SIN MANTENCION'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0xFF0000,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else if(flag == 'EN MANTENCION'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0x9933CC,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else {
            loader.load(direccion, function (geometry) {
                if (data[1] == "BUENO") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0x009900,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }
                else if (data[1] == "SIN MANTENCION") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0xFF0000,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }
                else if (data[1] == "FALLANDO") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0xFF9900,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }
                else if (data[1] == "EN MANTENCION") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0x9933CC,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
    else if(subid== 'EI'){
        if(flag == 'BUENO'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0x009900,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else if(flag == 'FALLANDO'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0xFF9900,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else if(flag == 'SIN MANTENCION'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0xFF0000,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else if(flag == 'EN MANTENCION'){
            objects = [];
            loader.load(direccion, function (geometry) {
                stlequipos4 = new THREE.MeshLambertMaterial({
                    color: 0x9933CC,
                    transparent: true,
                    opacity: 1
                });
                stlequipos4.opacity = 1;

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
        else {
            loader.load(direccion, function (geometry) {
                if (data[1] == "BUENO") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0x009900,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }
                else if (data[1] == "SIN MANTENCION") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0xFF0000,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }
                else if (data[1] == "FALLANDO") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0xFF9900,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }
                else if (data[1] == "EN MANTENCION") {
                    stlequipos4 = new THREE.MeshLambertMaterial({
                        color: 0x9933CC,
                        transparent: true,
                        opacity: 1
                    });
                    stlequipos4.opacity = 1;

                }

                var mesh = new THREE.Mesh(geometry, stlequipos4);
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
    listaEquiposColor();
}

function correo() {
    $.ajax({
        url: 'notificaciones.php', //the script to call to get data
        data: "id=" + idglobal, //you can insert url argumnets here to pass to api.php
        //for example "id=5&parent=6"
        dataType: 'json', //data format
        success: function (data)          //on recieve of reply
        {
            console.log(data);
        },
        error: function (data) {
            console.log(data);
        }
    });

}

function estadoEquipo(estado, id = null) {
    console.log("Boton apretado");
    correo();
    $.ajax({
        url: 'updateestado.php', //the script to call to get data
        data: "id=" + (idglobal ? idglobal : id) + "&estado=" + estado, //you can insert url argumnets here to pass to api.php
        //for example "id=5&parent=6"
        dataType: 'json', //data format
        success: function (data)          //on recieve of reply
        {
            listaEquiposColor();
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
            console.log('datos desde  ajax------>')
            console.log(data)
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

                        var eid = dirEquipos2[j][8].substr(0,2);
                        if(eid=='CL'){
                            statsNode.innerHTML = "<a href='../fichas/ficha_equipos_instalaciones.php?id=" + dirEquipos2[j][8] + "' target='_blank'>Ficha Equipo ID: " + dirEquipos2[j][8] + "</a><br><br>Equipo: " + dirEquipos2[j][0] + "<br><br>Estado: " + dirEquipos2[j][1] + "<br><br>Instalacion: " + dirEquipos2[j][4] + "<br><br>Fabricante: " + dirEquipos2[j][5] + "<br><br>Modelo: " + dirEquipos2[j][6] + "<br><br>Proveedor: " + dirEquipos2[j][7] + "<br><br>Recinto: " + dirEquipos2[j][3] + "<br><br>Fecha instalaci車n: " + dirEquipos2[j][9] + "<br><br>Caducidad Garantia: " + dirEquipos2[j][10] + "<br><br>Categoria: " + dirEquipos2[j][11] + "<br><br><IMG  SRC=../mod_instalacion/elementos/" + dirEquipos2[j][12] + " height='180px' width='180px' border='1.5px'><br><br>";

                        }else if(eid=='EM'){
                            if(tipoUsuario == 2){
                                statsNode.innerHTML = "<p " + dirEquipos2[j][8] + ">Ficha Equipo ID: " + dirEquipos2[j][8] + "</a><br><br>Equipo: " + dirEquipos2[j][0] + "<br><br>Estado: " + dirEquipos2[j][1] + "<br><br>Instalacion: " + dirEquipos2[j][4] + "<br><br>Fabricante: " + dirEquipos2[j][5] + "<br><br>Modelo: " + dirEquipos2[j][6] + "<br><br>Proveedor: " + dirEquipos2[j][7] + "<br><br>Recinto: " + dirEquipos2[j][3] + "<br><br>Fecha instalaci車n: " + dirEquipos2[j][9] + "<br><br>Caducidad Garantia: " + dirEquipos2[j][10] + "<br><br>Categoria: " + dirEquipos2[j][11] + "<br><br><IMG  SRC=../mod_instalacion/elementos/" + dirEquipos2[j][12] + " height='180px' width='180px' border='1.5px'><br><br>";

                            }else{
                                statsNode.innerHTML = "<a href='../fichas/ficha_equipos_medicos.php?id=" + dirEquipos2[j][8] + "' target='_blank'>Ficha Equipo ID: " + dirEquipos2[j][8] + "</a><br><br>Equipo: " + dirEquipos2[j][0] + "<br><br>Estado: " + dirEquipos2[j][1] + "<br><br>Instalacion: " + dirEquipos2[j][4] + "<br><br>Fabricante: " + dirEquipos2[j][5] + "<br><br>Modelo: " + dirEquipos2[j][6] + "<br><br>Proveedor: " + dirEquipos2[j][7] + "<br><br>Recinto: " + dirEquipos2[j][3] + "<br><br>Fecha instalaci車n: " + dirEquipos2[j][9] + "<br><br>Caducidad Garantia: " + dirEquipos2[j][10] + "<br><br>Categoria: " + dirEquipos2[j][11] + "<br><br><IMG  SRC=../mod_inventario/elementos/" + dirEquipos2[j][12] + " height='180px' width='180px' border='1.5px'><br><br>";
                            }
                        }else if(eid=='AS'){
                            statsNode.innerHTML = "<a href='../fichas/ficha_equipos_instalaciones.php?id=" + dirEquipos2[j][8] + "' target='_blank'>Ficha Equipo ID: " + dirEquipos2[j][8] + "</a><br><br>Equipo: " + dirEquipos2[j][0] + "<br><br>Estado: " + dirEquipos2[j][1] + "<br><br>Instalacion: " + dirEquipos2[j][4] + "<br><br>Fabricante: " + dirEquipos2[j][5] + "<br><br>Modelo: " + dirEquipos2[j][6] + "<br><br>Proveedor: " + dirEquipos2[j][7] + "<br><br>Recinto: " + dirEquipos2[j][3] + "<br><br>Fecha instalaci車n: " + dirEquipos2[j][9] + "<br><br>Caducidad Garantia: " + dirEquipos2[j][10] + "<br><br>Categoria: " + dirEquipos2[j][11] + "<br><br><IMG  SRC=../mod_instalacion/elementos/" + dirEquipos2[j][12] + " height='180px' width='180px' border='1.5px'><br><br>";
                        }else if(eid=='AR'){
                            statsNode.innerHTML = "<a href='../fichas/ficha_artefactos.php?id=" + dirEquipos2[j][8] + "' target='_blank'>Ficha Equipo ID: " + dirEquipos2[j][8] + "</a><br><br>Equipo: " + dirEquipos2[j][0] + "<br><br>Estado: " + dirEquipos2[j][1] + "<br><br>Instalacion: " + dirEquipos2[j][4] + "<br><br>Fabricante: " + dirEquipos2[j][5] + "<br><br>Modelo: " + dirEquipos2[j][6] + "<br><br>Proveedor: " + dirEquipos2[j][7] + "<br><br>Recinto: " + dirEquipos2[j][3] + "<br><br>Fecha instalaci車n: " + dirEquipos2[j][9] + "<br><br>Caducidad Garantia: " + dirEquipos2[j][10] + "<br><br>Categoria: " + dirEquipos2[j][11] + "<br><br><IMG  SRC=../mod_servbas/elementos/" + dirEquipos2[j][12] + " height='180px' width='180px' border='1.5px'><br><br>";
                        }else if(eid=='AL'){
                            statsNode.innerHTML = "<a href='../fichas/ficha_equipos_instalaciones.php?id=" + dirEquipos2[j][8] + "' target='_blank'>Ficha Equipo ID: " + dirEquipos2[j][8] + "</a><br><br>Equipo: " + dirEquipos2[j][0] + "<br><br>Estado: " + dirEquipos2[j][1] + "<br><br>Instalacion: " + dirEquipos2[j][4] + "<br><br>Fabricante: " + dirEquipos2[j][5] + "<br><br>Modelo: " + dirEquipos2[j][6] + "<br><br>Proveedor: " + dirEquipos2[j][7] + "<br><br>Recinto: " + dirEquipos2[j][3] + "<br><br>Fecha instalaci車n: " + dirEquipos2[j][9] + "<br><br>Caducidad Garantia: " + dirEquipos2[j][10] + "<br><br>Categoria: " + dirEquipos2[j][11] + "<br><br><IMG  SRC=../mod_instalacion/elementos/" + dirEquipos2[j][12] + " height='180px' width='180px' border='1.5px'><br><br>";

                        }else if(eid=='AP'){
                            statsNode.innerHTML = "<a href='../fichas/ficha_equipos_instalaciones.php?id=" + dirEquipos2[j][8] + "' target='_blank'>Ficha Equipo ID: " + dirEquipos2[j][8] + "</a><br><br>Equipo: " + dirEquipos2[j][0] + "<br><br>Estado: " + dirEquipos2[j][1] + "<br><br>Instalacion: " + dirEquipos2[j][4] + "<br><br>Fabricante: " + dirEquipos2[j][5] + "<br><br>Modelo: " + dirEquipos2[j][6] + "<br><br>Proveedor: " + dirEquipos2[j][7] + "<br><br>Recinto: " + dirEquipos2[j][3] + "<br><br>Fecha instalaci車n: " + dirEquipos2[j][9] + "<br><br>Caducidad Garantia: " + dirEquipos2[j][10] + "<br><br>Categoria: " + dirEquipos2[j][11] + "<br><br><IMG  SRC=../mod_instalacion/elementos/" + dirEquipos2[j][12] + " height='180px' width='180px' border='1.5px'><br><br>";

                        }else if(eid=='EI'){
                            if(tipoUsuario == 2){
                                statsNode.innerHTML = "<p " + dirEquipos2[j][8] + ">Ficha Equipo ID: " + dirEquipos2[j][8] + "</a><br><br>Equipo: " + dirEquipos2[j][0] + "<br><br>Estado: " + dirEquipos2[j][1] + "<br><br>Instalacion: " + dirEquipos2[j][4] + "<br><br>Fabricante: " + dirEquipos2[j][5] + "<br><br>Modelo: " + dirEquipos2[j][6] + "<br><br>Proveedor: " + dirEquipos2[j][7] + "<br><br>Recinto: " + dirEquipos2[j][3] + "<br><br>Fecha instalaci車n: " + dirEquipos2[j][9] + "<br><br>Caducidad Garantia: " + dirEquipos2[j][10] + "<br><br>Categoria: " + dirEquipos2[j][11] + "<br><br><IMG  SRC=../mod_instalacion/elementos/" + dirEquipos2[j][12] + " height='180px' width='180px' border='1.5px'><br><br>";

                            }else{
                                statsNode.innerHTML = "<a href='../fichas/ficha_equipos_instalaciones.php?id=" + dirEquipos2[j][8] + "' target='_blank'>Ficha Equipo ID: " + dirEquipos2[j][8] + "</a><br><br>Equipo: " + dirEquipos2[j][0] + "<br><br>Estado: " + dirEquipos2[j][1] + "<br><br>Instalacion: " + dirEquipos2[j][4] + "<br><br>Fabricante: " + dirEquipos2[j][5] + "<br><br>Modelo: " + dirEquipos2[j][6] + "<br><br>Proveedor: " + dirEquipos2[j][7] + "<br><br>Recinto: " + dirEquipos2[j][3] + "<br><br>Fecha instalaci車n: " + dirEquipos2[j][9] + "<br><br>Caducidad Garantia: " + dirEquipos2[j][10] + "<br><br>Categoria: " + dirEquipos2[j][11] + "<br><br><IMG  SRC=../mod_instalacion/elementos/" + dirEquipos2[j][12] + " height='180px' width='180px' border='1.5px'><br><br>";

                            }
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
