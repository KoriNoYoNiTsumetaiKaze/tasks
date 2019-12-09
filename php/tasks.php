<?php
function __autoload( $className ) {
  $className = str_replace("..", "", $className);
  require_once("$className.php");
}

$db = new db_tasks();
echo json_encode($db->selectAll());
?>
