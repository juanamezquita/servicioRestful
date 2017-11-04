<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

// get sensores
$app->get('/api/sensores', function(Request $request, Response $response){
$sql= "SELECT*FROM datos";
try{
//get db object
$db= new db();
//connect
$db=$db->connect();
$stmt= $db->query($sql);
$estudiantes =  $stmt->fetchAll(PDO::FETCH_OBJ);
$db=null;
echo json_encode($estudiantes);
}catch(PDOException $e){
echo '{"error":"text":'.$e->getMessage().'}';
}
});

// get sensor en particular
$app->get('/api/sensores/{id}', function(Request $request, Response $response){
$id= $request->getAttribute('id');

$sql= "SELECT*FROM datos where nodo_idnodo=$id";
try{
//get db object
$db= new db();
//connect
$db=$db->connect();
$stmt= $db->query($sql);
$estudiante =  $stmt->fetchAll(PDO::FETCH_OBJ);
$db=null;
echo json_encode($estudiante);
}catch(PDOException $e){
echo '{"error":"text":'.$e->getMessage().'}';
}
});

// add adiciona datos de variables a la base de datos servicio post.
$app->post('/api/sensores/add', function(Request $request, Response $response){
$id = $request->getParam('id');
$fecha= $request->getParam('fecha');
$hora= $request->getParam('hora');
$variable= $request->getParam('variable');
$valor= $request->getParam('valor');
$unidad= $request->getParam('unidad');
$sql= "INSERT INTO  sensores.datos (nodo_idnodo, fecha, hora, variable, valor, unidad) values (:id,:fecha,:hora,:variable,:valor,:unidad)";
try{
//get db object
$db= new db();
//connect
$db=$db->connect();
$stmt= $db->prepare($sql);
$stmt-> bindParam(':id',$id);
$stmt->bindParam(':fecha',$fecha);
$stmt->bindParam(':hora',$hora);
$stmt->bindParam(':variable',$variable);
$stmt->bindParam(':valor',$valor);
$stmt->bindParam(':unidad',$unidad);

$stmt->execute();

}catch(PDOException $e){
echo '{"error":"text":'.$e->getMessage().'}';
}
});
