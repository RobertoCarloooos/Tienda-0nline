<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TiendaController extends AbstractController
{
    #[Route('/article')]
    public function getArticle()
    {
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

        return $this->render('articles/article.html.twig', ['article' => $article]);
    }

    #[Route('/articles')]
    public function articles()
    {
        $articles = [
            [
                'name' => 'Nintendo Switch',
                'type' => 'electronica',
                'image' => 'https://m.media-amazon.com/images/I/71U1R-V8+dL._AC_SX679_.jpg',
                'description' => 'La Nintendo Switch es una consola de videojuegos
     híbrida desarrollada por Nintendo, lanzada en marzo de 2017. Combina características
    de consolas portátiles y de sobremesa, permitiendo a los usuarios jugar
    tanto en casa como en movimiento.',
                'price' => '320'
            ],
            [
                'name' => 'espejo gotico',
                'type' => 'hogar',
                'image' => 'https://m.media-amazon.com/images/I/51gxDN17CVL._AC_.jpg',
                'description' => 'Espejo de pared ovalado negro mate
                 barroco antiguo retro gótico 50 x 76 espejo de baño ',
                'price' => '70'
            ],
            [
                'name' => 'Pelota de Baloncesto',
                'type' => 'electronica',
                'image' => 'https://m.media-amazon.com/images/I/71lY5Xr0GcL._AC_SX679_.jpg',
                'description' => 'Wilson NBA Team City Edition Los Angeles Lakers 2023/24,
                 Pelota de Baloncesto, Talla 7, Negro/Morado ,Marca: Wilson',
                'price' => '50'
            ]

        ];

        return $this->render('articles/articleList.html.twig', ['articles' => $articles]);
    }
};
