<?php
/* To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 06-06-2017_DRouter-Agrupamento de rotas e lidando com views.mp4
 */
header('Content-Type: text/html; charset=utf-8');
require 'vendor/autoload.php';

class Helper {
    public function teste(){
	echo 'deu-certo';
    }
}

$app = new DRouter\App();
$app->render->setViewsFolder(__DIR__.'/Views/');
$app->render->setHf('header.php', 'footer.php');

$container = $app->getContainer();

$container->pdo = $container->shared(function(){
    return new PDO('mysql:host=localhost;dbname=videoaula', 'root', '');
});

$container->helper = $container->shared(function(){
    return new Helper();
});

$app->render->setAsGlobal([
    'helper' => $container->helper
]);

$app->get('/', function(){
    // echo 'Estou na HOME';
    $this->render->load('home.php', [
	'teste' => 'Frase de teste'
    ],
	false
    );
});

$app->group('/admin', function() use($app){
    $app->get('/cadastrar-post', function(){
	echo 'Estou no admin/cadastrar-post';
	$this->render->load('cadastrar-post.php', []);
    });
    $app->get('/cadastrar-usuario', function(){
	echo 'Estou na página admin/cadastrar-usuario';
    });
});

$app->group('/cliente', function() use($app){
    $app->get('/meus-pedidos', function(){
	echo '/clientes/meus-pedidos';
    });
    
});
$app->run();

