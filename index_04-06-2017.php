<?php
/* To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header('Content-Type: text/html; charset=utf-8');
require 'vendor/autoload.php';

$app = new DRouter\App();

$container = $app->getContainer();

$container->pdo = $container->shared(function(){
    return new PDO('mysql:host=localhost;dbname=videoaula', 'root', '');
});

$app->get('/single/:slug', function($slug){
    echo 'Estou na página single do post <br />';
    echo 'O Slug é : <b>'.$slug.'</b>';
    
    echo '<form action="" method="post">'.'<input type="text" name="nome" placeholder="nome" /><br />'
	.'<textarea name="comentario"></textarea><br /><input type="submit" value="Enviar" />'
	.'</form>';
})->setName('single-post');

$app->post('/single/:slug', function($slug){
    $post = $this->request->getParsedBody();
    //Cadastro do comentário do usuario
    if(true){
	$this->router->redirectTo('single-post', [
	    'sucesso' => 1
	],[
	    'slug' => $slug
	]);
    }
    print_r($post);
});

$app->get('/:categoria/:subcategoria', function($categoria, $subcategoria){
    echo 'Estou na subcategoria<br />';
    echo 'Categoria: <b>'.$categoria.'</b><br />';
    echo 'Subcategoria: <b>'.$subcategoria.'</b><br />';
});

$app->get('/perfil/:id', function($id){
    $usuario = $this->pdo->prepare("SELECT * FROM `usuarios` WHERE `id` = ?");
    $usuario->execute([$id]);
    $usuario = $usuario->fetch();
    // print_r($usuario);
    $args = func_get_args();
    
    if(count($args) > 1 && $args[1] == 'system'){
	return $usuario;
    }else{
	echo '<h1>'.$usuario['nome'].'</h1>';
	echo '<p>'.$usuario['email'].'</p>';
    }
})->setName('perfil-usuario');

$app->get('/admin/editar-usuario/:id', function($id){
    $funcao = $this->router->getRouteCallable('perfil-usuario');
    
    $usuario = $funcao($id, 'system');
    var_dump($usuario);
});

$app->run();
