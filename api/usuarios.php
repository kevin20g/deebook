<?php
// Define app routes
$app->get('/Usuarios', function ($request, $response, $args) {
     $db = new DB();
    $usuario = $db->query("SELECT idUsuario, UsuarioNombre, UsuarioPass FROM usuario");
    return $response->withJson($usuario);
});

$app->get('/Usuarios/{id}', function ($request, $response, $args) {
     $db = new DB();
     $id = $args['id'];
     $usuario = $db->query('SELECT idUsuario, UsuarioNombre, UsuarioPass FROM usuario WHERE idUsuario=:id', array(':id'=>$id));
     return $response->withJson($usuario);
 });

$app->post('/Usuarios', function ($request, $response, $args) {
   $postBody = file_get_contents("php://input");
   $postBody = json_decode($postBody);
   $nombre = $postBody->Nombre;
   $pass = $postBody->pass;
    
   $db = new DB();
   $usuario = $db->query('INSERT INTO usuario (UsuarioNombre, UsuarioPass) 
   							VALUES (:nombre,:pass)', array(':nombre'=>$nombre, ':pass'=>$pass));
   
   $usuario = $db->query("SELECT idUsuario, UsuarioNombre, UsuarioPass FROM usuario");
   return $response->withJson($usuario);
});

$app->put('/Usuarios/{id}', function ($request, $response, $args) {
 try{
   $postBody = file_get_contents("php://input");
   $postBody = json_decode($postBody);
   $nombre = $postBody->Nombre;
   $pass = $postBody->pass;
    
   $db = new DB();
   $id = $args['id'];
   $usuario = $db->query('UPDATE usuario 
   						  SET  UsuarioNombre = :nombre,
   						  WHERE idUsuario = :id', 
   						  array(':nombre'=>$nombre, ':id'=>$id);
  } catch (Exception $e){
  	 return $response->withJson($e->getMessage());
  } 
   // $usuario = $db->query("SELECT UsuarioNombre, UsuarioPass FROM usuario WHERE idUsuario = :id'", array(':id'=>$id);
   // return $response->withJson($usuario);
});