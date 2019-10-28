<?php 

namespace App\Controller;
use App\Entity\Article;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method; 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ArticleController extends Controller{

  /** 
   * @Route("/home")
   * @Method({"GET"})
   */
 
    public function index(){

         $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();
            return $this->render('articles/index.html.twig', [
            'controller_name' => 'ArticleController',
            'atricles' => $articles
        ]);
    }
      /** 
   * @Route("/article/save")
   */
 
    // public function save(){

    //    $entityManager = $this->getDoctrine()->getManager();
    //    $article = new Article();
    //    $article->setTitle('Article 2');
    //    $article->setBody('Body for article 2');
    //    $entityManager->persist($article);
    //    $entityManager->flush();
    //    return new Response("Save atricle with id" . $article->getId());

    // }


}