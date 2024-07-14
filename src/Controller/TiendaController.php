<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TiendaController extends AbstractController{
    #[Route('/article')]
   public function getArticle(){
$article = [
    'name' => 'Nintendo Switch',
    'type' => 'electronica',
    'image' => 'https://m.media-amazon.com/images/I/71U1R-V8+dL._AC_SX679_.jpg',
    'description' => 'La Nintendo Switch es una consola de videojuegos
     híbrida desarrollada por Nintendo, lanzada en marzo de 2017. Combina características
    de consolas portátiles y de sobremesa, permitiendo a los usuarios jugar
    tanto en casa como en movimiento.',
    'price' => '320'
];

return $this -> render('articles/article.html.twig', ['article' => $article]);
   }
};