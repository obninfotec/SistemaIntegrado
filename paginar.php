<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$pdo = new PDO('mysql:host=localhost;dbname=videoaulas', 'root', '');
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
    <head>
        <meta charset=UTF-8>
        <title>Paginação com quantidade de links fixos</title>
        <style type="text/css">a, span{float:left; padding:8px 10px;}</style>
    </head>

    <body bgcolor="#ebebeb">
        <ul>
            <?php
            $maxlinks = 4;
            $pagina = (isset($_GET['pagina'])) ? (int) $_GET['pagina'] : 1;
            $maximo = 1;
            $inicio = (($maximo * $pagina) - $maximo);

            $selecao = $pdo->prepare("SELECT * FROM `posts` ORDER BY id DESC LIMIT $inicio, $maximo");
            $selecao->execute();
            while ($posts = $selecao->fetchObject()):
                ?>
                <li><?php echo utf8_encode($posts->titulo); ?></li>
            <?php endwhile; ?>
        </ul>

        <?php
        $seleciona_2 = $pdo->prepare("SELECT * FROM `posts`");
        $seleciona_2->execute();
        $total = $seleciona_2->rowCount();
        $total_paginas = ceil($total / $maximo);


        if ($total > $maximo) {

            echo '<a href="?pagina=1">Primeira pagina</a>';
            for ($i = $pagina - $maxlinks; $i <= $pagina - 1; $i++) {
                if ($i >= 1) {
                    echo '<a href="?pagina=' . $i . '">' . $i . '</a>';
                }
            }
            echo '<span>' . $pagina . '</span>';
            for ($i = $pagina + 1; $i <= $pagina + $maxlinks; $i++) {
                if ($i <= $total_paginas) {
                    echo '<a href="?pagina=' . $i . '">' . $i . '</a>';
                }
            }
            echo '<a href="?pagina=' . $total_paginas . '">Ultima Página</a>';
        }
        ?>
    </body>
</html>