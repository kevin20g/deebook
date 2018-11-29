<?php
// Define app routes

//GET DE TODOS LOS USUARIOS EN LA BASE DE DATOS
$app->get('/Usuarios', function ($request, $response, $args) {
     $db = new DB();
    $usuario = $db->query("SELECT idUsuario, UsuarioNombre, UsuarioPass FROM usuario");
    return $response->withJson($usuario);
});

//GET DE UN USUARIO EN SINGULAR
$app->get('/Usuarios/{id}', function ($request, $response, $args) {
     $db = new DB();
     $id = $args['id'];
     $usuario = $db->query('SELECT idUsuario, UsuarioNombre, UsuarioPass FROM usuario WHERE idUsuario=:id', array(':id'=>$id));
     return $response->withJson($usuario);
 });

//POST PARA REGISTRAR UN USUARIO
$app->post('/Usuarios', function ($request, $response, $args) {
   $postBody = file_get_contents("php://input");
   $postBody = json_decode($postBody);
   $nombre = $postBody->Nombre;
   $pass = $postBody->pass;
    
   $db = new DB();
   $usuario = $db->query('INSERT INTO usuario (UsuarioNombre, UsuarioPass) VALUES (:nombre,:pass)', array(':nombre'=>$nombre, ':pass'=>$pass));
   return $response->withJson('Usuario insertado correctamente');
});

//PUT PARA MODIFICAR UN USUARIO
$app->put('/Usuarios/{id}', function ($request, $response, $args) {
   $postBody = file_get_contents("php://input");
   $postBody = json_decode($postBody);
   $nombre = $postBody->Nombre;
   $pass = $postBody->pass;

   $db = new DB();
   $id = $args['id'];
   $usuario = $db->query('UPDATE usuario SET UsuarioNombre = :nombre, UsuarioPass = :pass WHERE idUsuario = :id', 
   						  array(':nombre'=>$nombre, ':pass'=>$pass, ':id'=>$id));
   return $response->withJson('Usuario modificado correctamente');
});

//DELTE PARA ELIMINAR UN USUARIO
$app->delete('/Usuarios/{id}', function ($request, $response, $args) {
   $db = new DB();
   $id = $args['id'];
   $usuario = $db->query('DELETE FROM usuario WHERE idUsuario=:id', array(':id'=>$id)); 
   return $response->withJson('Usuario eliminado correctamente');
});