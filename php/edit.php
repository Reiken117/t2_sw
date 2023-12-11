<?php
define("PG_DB"  , "t2   ");
define("PG_HOST", "localhost");
define("PG_USER", "postgres");
define("PG_PSWD", "p");
define("PG_PORT", "5432");

$conn = pg_connect("dbname=".PG_DB." host=".PG_HOST." user=".PG_USER ." password=".PG_PSWD." port=".PG_PORT."");
//Verificar conexión
if (!$conn) {
    echo "Error de conexión a la base de datos.";
    exit;
}
$id = $_POST['id'];
$barrio = $_POST['barrio'];
$categoria = $_POST['categoria'];
$lat = $_POST['lat'];
$long = $_POST['long'];

$conn = pg_connect("dbname=".PG_DB." host=".PG_HOST." user=".PG_USER." password=".PG_PSWD." port=".PG_PORT."");
if (!$conn) {
    $response = array('status' => 'error', 'message' => 'Error al conectar a la base de datos.');
} else {
    $query = "UPDATE dengue_2015 SET barrio='$barrio', categoria='$categoria', geom=ST_SetSRID(ST_MakePoint($long, $lat), 4326) WHERE id='$id'";
    $result = pg_query($conn, $query);
    
    if (!$result) {
        $response = array('status' => 'error', 'message' => 'Error al actualizar el registro.');
    } else {
        $response = array('status' => 'success', 'message' => 'Actualización exitosa.');
    }
    
    pg_close($conn);
}

echo json_encode($response);
?>
