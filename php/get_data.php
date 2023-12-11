<?php
define("PG_DB"  , "t2");
define("PG_HOST", "localhost");
define("PG_USER", "postgres");
define("PG_PSWD", "P");
define("PG_PORT", "5432");

$id = $_POST['id'];

$conn = pg_connect("dbname=".PG_DB." host=".PG_HOST." user=".PG_USER ." password=".PG_PSWD." port=".PG_PORT."");
if (!$conn) {
    echo json_encode(array('success' => false));
    exit;
}

$query = "SELECT id, barrio, categoria, ST_X(geom) AS long, ST_Y(geom) AS lat FROM dengue_2015 WHERE id='$id'";
$result = pg_query($conn, $query);

if (!$result) {
    echo json_encode(array('success' => false));
    exit;
}

$data = pg_fetch_assoc($result);
echo json_encode(array('success' => true, 'id' => $data['id'], 'barrio' => $data['barrio'], 'categoria' => $data['categoria'], 'lat' => $data['lat'], 'long' => $data['long']));

pg_close($conn);
?>
