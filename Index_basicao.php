<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'vendor/autoload.php';

$app = new DRouter\App();

// daqui
$container = $app->getContainer();
// var_dump($container);
$container->pdo = $container->shared(function(){
    return new PDO('mysql:host=localhost;dbname=shop', 'root', '');
});

$container->joao = $container->shared(function(){
    $outracoisa = new OutraCoisa();
    return new helper($outracoisa);
});

$container->dependencia = $container->shared(function() use ($container){
    return new Dependencia($container->pdo);
});
// ate aqui
$app->get('/', function(){
    var_dump($this->pdo);
    echo 'Estou aqui, na Home';
});

$app->get('/contato', function(){
    var_dump($this->pdo);
    echo '<form action="" method="post">';
    echo '<input type="text" name="titulo" placeholder="titulo" /><br />';
    echo '<input type="text" name="valor" placeholder="valor" /><br />';
    echo '<input type="submit" value="Enviar" />';
    echo '</form>';
});

$app->post('/contato', function(){
    // $request = $_POST;
    // print_r($request);
    $request = $this->request->getParsedBody();
    var_dump($request);
});

$app->delete('/contato', function(){
    echo "Tipo DELETE";
    $request = $this->request->getParsedBody();
    var_dump($request);
});
$app->run();

