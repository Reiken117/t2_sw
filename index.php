<?php 
	define("PG_DB"  , "t2");
	define("PG_HOST", "localhost");
	define("PG_USER", "postgres");
	define("PG_PSWD", "p");
	define("PG_PORT", "5432");
	
	$conexion = pg_connect("dbname=".PG_DB." host=".PG_HOST." user=".PG_USER ." password=".PG_PSWD." port=".PG_PORT."");
  if (!$conexion) {
    echo "Error de conexión con la base de datos.";
    exit;
  }
?>


<!DOCTYPE html>
<html>
<meta charset="utf-8">
	<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>   <!-- plugin jquery -->
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.EasyButton/2.4.0/easy-button.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.EasyButton/2.4.0/easy-button.css" />
    <!-- CDN_Estilos -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <script src="Locate/L.Control.Locate.js"></script>
    <link rel="stylesheet" href="Locate/L.Control.Locate.css" />
    
    <script src="minimapa/Control.MiniMap.js"></script>
	  <link rel="stylesheet" href="minimapa/Control.MiniMap.css" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="SlideMenu/src/L.Control.SlideMenu.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>  
    <script src="SlideMenu/src/L.Control.SlideMenu.js"></script>
    <title>Casos de dengue 2015</title>
    
        
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Casos de dengue 2015</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.EasyButton/2.4.0/easy-button.css" />
    <link rel="stylesheet" href="SlideMenu/src/L.Control.SlideMenu.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>  
    <style>
        * {
            padding: 0%;
            margin: 0% 0%;		
        }
        html, body {
            height: 100%;
            width: 100% vw;
            font-family: 'Ubuntu', sans-serif;
        }
        #map {
            width: 100%;
            height: 100%;
        }
        #norte {
            position: relative;
            width: 2%;
            left: 700px;
            padding: 1.2%;
            top: 200px;
        }
        .content {
            margin: 0.25rem;
            border-top: 1px solid #000;
            padding-top: 0.5rem;
        }
        .header {
            font-size: 1.8rem;
            color: #7f7f7f;
        }
        .title {
            font-size: 1.1rem;
            color: #7f7f7f;
            font-weight: bold;
        }
        #form, #form2, #form3 {
            display: none;
            position: absolute;
            background-color: white;
            padding: 20px;
            border: 1px solid black;
            border-radius: 5px;
            z-index: 9999;
        }

        #form {
            left: 360px;
            top: 38%;
            transform: translate(0, -50%);
        }

        #form2 {
            left: 360px;
            top: 50%;
            transform: translate(0, -50%);
        }

        #form3 {
            left: 360px;
            top: 50%;
            transform: translate(0, -50%);
        }

        #form input, #form2 input, #form3 input {
            margin-top: 10px;
        }

        #form button, #form2 button, #form3 button {
            margin-top: 10px;
        }
        #info-box {
            position: absolute;
            top: 200px;
            left: 20px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            z-index: 1000;
            width: 300px;
        }
        #info-box h3 {
            font-size: 16px;
            margin-bottom: 5px;
        }
        #info-box p {
            font-size: 14px;
            line-height: 1.4;
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        .table thead tr {
            background-color: #035575;
            color: white;
        }
        .table tbody tr:nth-child(even) {
            background-color: #035575;
            color: white;
        }
        .table tbody tr:nth-child(odd) {
            background-color: #6c757d;
            color: white;
        }
    </style>
    <link rel="stylesheet" href="pag.css" />

	</head>	
  <body>
     <div id="info-box">
          <h4 style="text-align: center; font-weight: bold;">Información del Mapa</h4>
        <text style="text-align: justify">En el año 2015, la Comuna 1 de Cali se vio afectada por un preocupante aumento de casos de dengue, una enfermedad transmitida por mosquitos que se reproduce en áreas urbanas y suburbanas. Este incremento generó una creciente alarma en la comunidad y las autoridades sanitarias locales. La Comuna 1, caracterizada por su densidad poblacional y condiciones ambientales propicias para la proliferación del mosquito Aedes aegypti, vector del dengue, enfrentó desafíos significativos en la prevención y control de la enfermedad.</text>
    </div>
    <p style="font-size: 270%; font-weight: bold; color: white; text-align: center;">CASOS DE DENGUE 2015 EN LA COMUNA 1</p>
    <div class="details-on-map show-map">
        <div id="map" style="z-index:9999"></div>
        <img id="norte" src="norte.png">
        <div id="form" class="w3-container">
            <!-- Formulario ELIMINAR -->
            <h2>Eliminar Punto</h2>
            <form id="deleteForm">
                <label for="id">ID del Punto:</label>
                <input class="w3-input w3-border" type="text" id="id" placeholder="Identificador" required>
                <br>
                <button type="submit" class="w3-button w3-red">Eliminar</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="w3-button w3-black" type="button" onclick="cancelForm1()">Cancelar</button>
            </form>
        </div>
        <!-- Formulario EDITAR -->
        <div id="form2" class="w3-container">
            <h2>Editar Punto</h2>
            <form id="editForm" action="php/edit.php" method="POST">
                <input id="id" class="w3-input w3-border" name="id" placeholder="Identificador" required><br>
                <input id="barrio" class="w3-input w3-border" name="barrio" placeholder="barrio" required><br>
                <input id="categoria" class="w3-input w3-border" name="categoria" placeholder="Categoria" required>
                <label for="id">Latitud:</label>
                <input id="lat" class="w3-input w3-border" name="lat" placeholder="Latitud" required>
                <label for="id">Longitud:</label>
                <input id="long" class="w3-input w3-border" name="long" placeholder="Longitud" required><br>
                <input type="submit" class="w3-button w3-teal" value="Guardar">&nbsp;&nbsp;
                <button type="button" class="w3-button w3-black" id="cancelEditingBtn">Cancelar</button>
            </form>
        </div>
        <!-- Formulario AÑADIR -->
        <div id="form3" class="w3-container">
            <h2>Agregar Punto</h2>
            <form id="addForm" method="POST" action="php/add.php">
                <input type="text" class="w3-input w3-border" id="id" name="id" placeholder="Identificación" required>
                <br>
                <input type="text" class="w3-input w3-border" id="barrio" name="barrio" placeholder="barrio" required>
                <br>
                <input type="text" class="w3-input w3-border" id="categoria" name="categoria" placeholder="Categoria" required>
                <label for="id">Latitud:</label>
                <input type="text" id="latitude" class="w3-input w3-border" name="latitude" placeholder="Latitud" readonly>
                <label for="id">Longitud:</label>
                <input type="text" id="longitude" class="w3-input w3-border" name="longitude" placeholder="Longitud" readonly>
                <br>
                <button type="submit" class="w3-button w3-teal">Guardar</button>&nbsp;&nbsp;
                <button type="button" class="w3-button w3-black" onclick="cancelForm3()">Cancelar</button>
            </form>
        </div>
    </div>
      <script src="geosearch/leaflet-search.js"></script>
    </div> 
  </body>
	<script>
    //Mapa
    var map = L.map('map',
    {
      zoom: 10,
      minZoom:13,
        maxZoom: 16,
    }).setView([3.455160, -76.570641], 15);            
    
    //Mapas base
    var mapabase = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', 
    {
      maxZoom: 18,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    })
    var mapabase2 = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', 
    {
      minZoom:13,
      maxZoom: 16,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    });
    mapabase.addTo(map);
    function info_popup(feature, layer){
      layer.bindPopup("<h1>" + feature.properties.barrio + "</h1><hr>"+"<strong> Identificación: </strong>"+feature.properties.id+"<br/>"+"<strong> Edad: </strong>"+feature.properties.categoria+"<br/>");
    }
    var leyenda = L.control.layers({mapabase,mapabase2}).addTo(map);
// cargar datos 
    var dengue_2015 = L.geoJSON();
    $.post("php/conect.php",{
      peticion: 'cargar',
    },function (data, status, feature){
      if(status=='success'){
        dengue_2015 = eval('('+data+')');
        var dengue_2015 = L.geoJSON(dengue_2015, {
          onEachFeature: info_popup
        });
        dengue_2015.eachLayer(function (layer) {
          layer.setZIndexOffset(1000);
        });
        leyenda.addOverlay(dengue_2015, 'Dengue 2015');
      }
    });
    var homeButton = L.easyButton({
      states: [{
        stateName: 'home',
        icon: '<img src="icon/regresar.png" align="absmiddle" height="16px">',
        title: 'Vista principal',
        onClick: function (control) {
          map.setView([3.455160, -76.570641], 15); 
        }
      }]
    });
    homeButton.addTo(map); 

    var lc = L.control.locate({
      position: 'topleft',
      strings: {
        title: "Mostrar tu ubicación",
        popup: "Estás a {distance} {unit} de este punto",
        outsideMapBoundsMsg: "Estás fuera del límite del mapa"
      },
    }).addTo(map);

// add data
    var clickedLatLng;
    var marker;
    var isFormOpened = false;

    function toggleForm3() {
      $('#form3').toggle();
      isFormOpened = !isFormOpened; 

      if (isFormOpened) {
        map.on('click', onMapClick);
      } else {
        map.off('click', onMapClick);
        if (marker) {
          map.removeLayer(marker);
        }
      }
    }


    function onMapClick(a) {
      if (isFormOpened) { 
        if (marker) {
          map.removeLayer(marker);
        }
        clickedLatLng = a.latlng;
        document.getElementById('latitude').value = clickedLatLng.lat;
        document.getElementById('longitude').value = clickedLatLng.lng;
        marker = L.marker(clickedLatLng).addTo(map);
      }
    }

    function resetForm3() {
      document.getElementById('addForm').reset();
    }
    function cancelForm3() {
      $('#form3').hide();
      isFormOpened = false; 
      map.off('click', onMapClick);
      if (marker) {
        map.removeLayer(marker);
      }
      resetForm3();
    }

      $('#addForm').submit(function(e) {
          e.preventDefault();
          $.ajax({
              url: $(this).attr('action'),
              type: 'POST',
              data: $(this).serialize(),
              success: function(response) {
                  if (response.includes("Éxito")) {
                      swal("Éxito", "El punto ha sido guardado.", "success");
                  } else {
                      swal("Éxito", "El punto ha sido guardado.", "success");
                  }
                  resetForm3();
              },
              error: function() {

                  swal("Error", "Error al guardar el punto.", "error");
              }
          });
      });
    var easyButton = L.easyButton('fa fa-user-plus', function() {
        toggleForm3();
    },'Añadir punto').addTo(map);
//eliminar datos
    function toggleForm() {
      $('#form').toggle();
    }

    function eliminarPunto(id) {
        $.ajax({
            url: 'php/delete.php',
            type: 'POST',
            data: { id: id },
            success: function (response) {

                if (response.includes("Éxito")) {

                    swal("Éxito", "El punto ha sido eliminado.", "success");
                } else if (response.includes("no existe")) {

                    swal("Información", "El punto con ID " + id + " no existe.", "info");
                } else {
                    swal("Éxito", "El punto ha sido eliminado.", "success");
                }
            },
            error: function () {

                swal("Error", "Error al ejecutar la consulta.", "error");
            }
        });
    }

    $('#deleteForm').on('submit', function (event) {
        event.preventDefault();
        var id = $('#id').val();
        eliminarPunto(id);
    });

    function cancelForm1() {
      $('#form').hide();
      isFormOpened = false; 
      resetForm3(); 
    }

    var eliminarButton = L.easyButton('fa-trash', function() {
      toggleForm();
    }, 'Eliminar Punto').addTo(map);
//slide formulario
    var marker2; 

    function toggleForm2() {
        $('#form2').toggle();
        if ($('#form2').is(':visible')) {
            map.on('click', onMapClick2);

            var id = prompt("Ingrese el ID a editar:");

            $.ajax({
                url: 'php/get_data.php', 
                type: 'POST',
                data: { id: id },
                success: function(response) {
                    var data = JSON.parse(response);
                    if (data.success) {
                        
                        $('#id').val(data.id);
                        $('#barrio').val(data.barrio);
                        $('#categoria').val(data.categoria);
                        $('#lat').val(data.lat);
                        $('#long').val(data.long);
                    } else {
                        alert('Error al obtener datos del servidor.');
                    }
                },
                error: function() {
                    alert('Error al obtener datos del servidor.');
                }
            });
        } else {
            
            map.off('click', onMapClick2);
            if (marker2) {
                map.removeLayer(marker2);
                marker2 = null; 
            }
        }
    }

    function onMapClick2(e) {
      if ($('#form2').is(':visible')) {

        if (marker2) {
          map.removeLayer(marker2);
        }
        var lat = e.latlng.lat;
        var long = e.latlng.lng;
        marker2 = L.marker([lat, long]).addTo(map);
        document.getElementById('lat').value = lat;
        document.getElementById('long').value = long;
      }
    }

    function cancelForm() {
      document.getElementById('form2').style.display = 'none';
    }
    var formContainer = document.getElementById('formContainer');

    var cancelEditingBtn = document.getElementById('cancelEditingBtn');
    cancelEditingBtn.addEventListener('click', function() {
      toggleForm2();
    });
    var editButton = L.easyButton('fa-pencil', function() {
      toggleForm2();
    }, 'Editar Punto').addTo(map);
//escala
    L.control.scale({position:'bottomleft'}).addTo(map);
//minimapa
    var urlminimap = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {attribution: 'Univalle',subdomains: '2023',maxZoom: 24});
    var minimap = new L.Control.MiniMap(urlminimap,{
      toggleDisplay: true,
      minimized: true,
      width: 150,
      height: 150,
      position: "bottomleft",
      strings: {hideText: 'Ocultar MiniMapa', showText: 'Mostrar MiniMapa'}
    }).addTo(map);
//control de busqueda
    map.addControl(L.control.search({ position: 'topright' }));
//tabla 
    const right = '<div class="header">TABLA DE DATOS</div>';
    let contentsright = `<div class="content">
      <h6>Este menu corresponde a la tabla con los datos de los datos del dengue del 2015 de la Comuna 01, además le permite la visualizacion de la ubicacion especifica 
      de los registros mediante el boton "Ir a..." </h6>
      <!-- Agrega la tabla dentro del panel -->
      <table class="table" id="locationsTable">
        <!-- Encabezado de tabla -->
        <thead>
          <tr>
            <th>Id</th>
            <th>Barrio</th>
            <th>Categoría</th>
            <th>Acercar</th>
          </tr>
        </thead>
        <tbody>
          <?php
            // Consulta SQL para obtener los puntos
            $query = "SELECT id, barrio, categoria,ST_X(geom) as lng, ST_Y(geom) as lat FROM dengue_2015";
            $result = pg_query($conexion, $query);
            if (!$result) {
              echo "Error al obtener los puntos.";
              exit;
            }
            // Array para almacenar marcadores
            $markers = [];
            // Iterar resultados, generar las filas de la tabla y marcadores
            while ($row = pg_fetch_assoc($result)) {
              $id = $row['id'];
              $barrio = $row['barrio'];
              $categoria = $row['categoria'];
              $lat = $row['lat'];
              $lng = $row['lng'];
              echo "<tr>";
              echo "<td>$id</td>";
              echo "<td>$barrio</td>";
              echo "<td>$categoria</td>";
              echo "<td><button onclick=\"zoomToLocation($lat, $lng)\"> Ir a...</button></td>";
              echo "</tr>";
            }
          ?>
        </tbody>
      </table>
    </div>`;
    var currentMarker;
    // Funcion para acercamiento a puntos individuales
    function zoomToLocation(lat, lng, barrio) {
      if (currentMarker) {
        map.removeLayer(currentMarker);
      }
      // Creación de marcador en el punto 
      currentMarker = L.marker([lat, lng]).addTo(map);
      map.flyTo([lat, lng], 18);
    }
    /* SLIDEMENU RIGTHT */
    const slideMenu = L.control.slideMenu("", {
      position: "topright",
      menuposition: "topright",
      width: "40%",
      height: "500px",
      delay: "10",
      icon: "fa fa-table",
    }).addTo(map);
    slideMenu.setContents(right + contentsright);
    //---------------------------------------------------------------CAPA WMS---------------------------------------------------------------//	
    var comuna3 = L.tileLayer.wms('http://ws-idesc.cali.gov.co:8081/geoserver/wms?service=WMS&version=1.1.0',{
      layers: 'idesc:mc_comunas',
      format: 'image/png',
      transparent: true,
      CQL_FILTER: "nombre='Comuna 1'",
    });
    map.addLayer(comuna3);
    leyenda.addOverlay(comuna3, 'Comuna 01');

        // Manejador de eventos para el formulario de editar punto
        $('#editForm').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    swal("Éxito", "El punto a sido Actualizado");
                    toggleForm2(); // Cerrar el formulario después de editar
                },
                error: function () {
                    swal("Error", 'Error al editar el punto.', "error");
                }
            });
        });
    
	</script>
</html> 
