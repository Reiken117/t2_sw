<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener los datos enviados por el formulario
  $id = $_POST['id'];
  $barrio = $_POST['barrio'];
  $categoria = $_POST['categoria'];
  $latitude = $_POST['latitude'];
  $longitude = $_POST['longitude'];

  // Crear la conexión a la base de datos
  define("PG_DB"  , "t2");
define("PG_HOST", "localhost");
define("PG_USER", "postgres");
define("PG_PSWD", "p");
define("PG_PORT", "5432");
  
  $conn = pg_connect("dbname=".PG_DB." host=".PG_HOST." user=".PG_USER ." password=".PG_PSWD." port=".PG_PORT."");
	//Verificar conexion
	if (!$conn) {
		echo "Error de conexión a la base de datos.";
		exit;
	}
  // Crear la geometría del punto
  $point = "POINT($longitude $latitude)";

  // Insertar los datos del punto en la base de datos
  $query = "INSERT INTO dengue_2015 (id, barrio, categoria, geom) VALUES ('$id','$barrio','$categoria', ST_GeomFromText('$point', 4326))";
  $result = pg_query($conn, $query);

  // Verificar el resultado de la consulta
  if ($result) {
    if (pg_affected_rows($result) > 0) {
        echo "El punto $id se agregó a la base de datos.";
    } else {
        echo "No se encontró un punto con el ID $id.";
    }
  } else {
    echo "Error al ejecutar la consulta.";
  }
}
?>
