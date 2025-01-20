<?php
/**
 * Crear una API con GET y POST para
 * - ANIMES
 * - CONSOLAS
 * - FABRICANTES
 */

 error_reporting( E_ALL );
 ini_set( "display_errors", 1 );    

 header("Content-Type: application/json");
 include("conexion_anime_pdo.php");

 $metodo = $_SERVER["REQUEST_METHOD"];
 $entrada = json_decode(file_get_contents("php://input"), true);

 /**
  * $entrada["numero"] -> <input name="numero">
 */

 switch($metodo){

     case "GET":
         //echo json_encode(["metodo" => "get"]);
         manejarGet($_conexion);
         break;
     case "POST":
         manejarPost($_conexion, $entrada);
         break;
     case "PUT":
         echo json_encode(["metodo" => "put"]);
         break;
     case "DELETE":
         echo json_encode(["metodo" => "delete"]);
         break;
     default:
     echo json_encode(["metodo" => "otro"]);
         break;
 }

 function manejarGet($_conexion){

    if(isset($_GET["desde"]) && isset($_GET["hasta"]) && isset($_GET["nombre_estudio"])){

        $sql = "SELECT * FROM animes WHERE nombre_estudio = :nombre_estudio AND anno_estreno BETWEEN :desde AND :hasta";
        $stmt = $_conexion -> prepare($sql);
            $stmt -> execute([
                "nombre_estudio" => $_GET["nombre_estudio"],
                "desde" => $_GET["desde"],
                "hasta" => $_GET["hasta"]
            ]);


    }
    else if(isset($_GET["nombre_estudio"])){

        $sql = "SELECT * FROM animes WHERE nombre_estudio = :nombre_estudio";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            "nombre_estudio" => $_GET["nombre_estudio"]
        ]);

    } else if(isset($_GET["desde"]) && isset($_GET["hasta"])){

            $sql = "SELECT * FROM animes WHERE anno_estreno BETWEEN :desde AND :hasta";
            $stmt = $_conexion -> prepare($sql);
            $stmt -> execute([
                "desde" => $_GET["desde"],
                "hasta" => $_GET["hasta"]
            ]);
        
    } else {

        $sql = "SELECT * FROM animes";
        $stmt = $_conexion -> prepare($sql);
   
        $stmt -> execute();
   
    }
    
     $resultado = $stmt -> fetchALL(PDO::FETCH_ASSOC);
     echo json_encode($resultado);
 }

 function manejarPost($_conexion, $entrada){
     $sql = "INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas)
         VALUES (:titulo, :nombre_estudio, :anno_estreno, :num_temporadas)";

     $stmt = $_conexion -> prepare($sql);
     $stmt -> execute([
         "titulo" => $entrada["titulo"],
         "nombre_estudio" => $entrada["nombre_estudio"],
         "anno_estreno" => $entrada["anno_estreno"],
         "num_temporadas" => $entrada["num_temporadas"]
     ]);

     if($stmt) {
         echo json_encode(["mensaje" => "El anime se ha insertado correctamente"]);
     } else {
         echo json_encode(["mensaje" => "Error al insertar el estudio"]);
     }
 }


?>