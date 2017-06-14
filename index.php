<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'vendor/autoload.php';

$app = new DRouter\App();

$app->get('/single/:slug', function($slug){
    echo 'Estou na página single do post <br />';
    echo 'O Slug é : <b>'.$slug.'</b>';
});

$app->run();


