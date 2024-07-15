<?php

namespace App\Controller;

use App\Entity\Articulo;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TiendaController extends AbstractController
{
    #[Route('/article/{id}',name:'getArticle')]
    public function getArticle(EntityManagerInterface $doctrine, $id)
    {
      
        $repository = $doctrine -> getRepository(Articulo::class);
        $article = $repository -> find($id);
        return $this->render('articles/article.html.twig', ['article' => $article]);
    }

    #[Route('/articles',name:'listArticle')]
    public function articles(EntityManagerInterface $doctrine)
    {
    $repository = $doctrine -> getRepository(Articulo::class);

    $articles =  $repository -> findAll();
        return $this->render('articles/articleList.html.twig', ['articles' => $articles]);
    }

    #[Route('/new/articles')]
    public function newArticles(EntityManagerInterface $doctrine)
    {

        $article = new Articulo();
        $article->setName('Pelota de Baloncesto');
        $article->setType('electronica');
        $article->setImage('https://m.media-amazon.com/images/I/71lY5Xr0GcL._AC_SX679_.jpg');
        $article->setDescription('Wilson NBA Team City Edition Los Angeles Lakers 2023/24,
                                   Pelota de Baloncesto, Talla 7, Negro/Morado ,Marca: Wilson');
        $article->setPrice(50);

        $article2 = new Articulo();
        $article2->setName('Nintendo Switch');
        $article2->setType('electronica');
        $article2->setImage('https://m.media-amazon.com/images/I/71U1R-V8+dL._AC_SX679_.jpg');
        $article2->setDescription('La Nintendo Switch es una consola de videojuegos
     híbrida desarrollada por Nintendo, lanzada en marzo de 2017. Combina características
    de consolas portátiles y de sobremesa, permitiendo a los usuarios jugar
    tanto en casa como en movimiento.');
        $article2->setPrice(320);

        $article3 = new Articulo();
        $article3->setName('espejo gotico');
        $article3->setType('hogar');
        $article3->setImage('https://m.media-amazon.com/images/I/51gxDN17CVL._AC_.jpg');
        $article3->setDescription('Espejo de pared ovalado negro mate
                 barroco antiguo retro gótico 50 x 76 espejo de baño ');
        $article3->setPrice(70);

        $doctrine->persist($article);
        $doctrine->persist($article2);
        $doctrine->persist($article3);
        $doctrine->flush();


        return new Response('Articulos insertados correctamente');
    }
};
