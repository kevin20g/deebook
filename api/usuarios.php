<?php
// Define app routes
$app->get('/Usuarios', function ($request, $response, $args) {
     $db = new DB();
    $usuario = $db->query("SELECT IdUsuario FROM usuario");
    return $response->withJson($usuario);
});
// $app->get('/Usuarios/{id}', function ($request, $response, $args) {
//     $db = new DB();
//     $id = $args['id'];
//     $usuario = $db->query('SELECT * FROM usuario WHERE IdUsuario=:id', array(':id'=>$id));
//     return $response->withJson($usuario);
// });
// $app->post('/Usuarios', function ($request, $response, $args) {
//     $postBody = file_get_contents("php://input");
//     $postBody = json_decode($postBody);
//     $nombre = $postBody->Nombre;
//     $pass = $postBody->pass;
    
//     $db = new DB();
//     $usuario = $db->query('INSERT INTO usuario (Nombre, pass) VALUES (:nombre,:pass)', array(':nombre'=>$nombre, ':pass'=>$pass));
//     $usuario = $db->query("SELECT Idusuario, Nombre, pass FROM usuario");
//     return $response->withJson($usuario);
// });