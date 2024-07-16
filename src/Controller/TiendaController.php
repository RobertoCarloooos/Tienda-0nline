<?php

namespace App\Controller;

use App\Entity\Articulo;
use App\Entity\Category;
use App\Form\ArticleType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
        $article->setImage('https://m.media-amazon.com/images/I/71lY5Xr0GcL._AC_SX679_.jpg');
        $article->setDescription('Wilson NBA Team City Edition Los Angeles Lakers 2023/24,
                                   Pelota de Baloncesto, Talla 7, Negro/Morado ,Marca: Wilson');
        $article->setPrice(50);

        $article2 = new Articulo();
        $article2->setName('Nintendo Switch');
        $article2->setImage('https://m.media-amazon.com/images/I/71U1R-V8+dL._AC_SX679_.jpg');
        $article2->setDescription('La Nintendo Switch es una consola de videojuegos
     híbrida desarrollada por Nintendo, lanzada en marzo de 2017. Combina características
    de consolas portátiles y de sobremesa, permitiendo a los usuarios jugar
    tanto en casa como en movimiento.');
        $article2->setPrice(320);

        $article3 = new Articulo();
        $article3->setName('espejo gotico');
        $article3->setImage('https://m.media-amazon.com/images/I/51gxDN17CVL._AC_.jpg');
        $article3->setDescription('Espejo de pared ovalado negro mate
                 barroco antiguo retro gótico 50 x 76 espejo de baño ');
        $article3->setPrice(70);

        $category = new Category();
        $category -> setType('Electrónica');

        $category2 = new Category();
        $category2 -> setType('Moda');

        $category3 = new Category();
        $category3 -> setType('Deportes y Aire Libre');

        $category4 = new Category();
        $category4 -> setType('Hogar y Cocina');

        $category5 = new Category();
        $category5 -> setType('Herramientas');

        $category6 = new Category();
        $category6 -> setType('Joyería y Relojes');

    
        $article -> addCategory($category3);
        $article2 -> addCategory($category);
        $article3 -> addCategory($category4);
    
        $doctrine->persist($category3);
        $doctrine->persist($category);
        $doctrine->persist($category4);

        
        $doctrine->persist($article);
        $doctrine->persist($article2);
        $doctrine->persist($article3);
        $doctrine->flush();


        return new Response('Articulos insertados correctamente');
    }

    //formulario para crear un articulo nuevo 
    #[Route('/insert/articles',name:'InsertArticles')]
    public function InsertArticles(EntityManagerInterface $doctrine , Request $request){
$form = $this -> createForm(ArticleType::class);
$form -> handleRequest($request);

if ($form -> isSubmitted() && $form -> isValid()){
$article = $form -> getData();
$doctrine -> persist($article);
$doctrine -> flush();
}

        return $this -> render('articles/newArticle.html.twig', ['articleForm' => $form]);

    }
};
