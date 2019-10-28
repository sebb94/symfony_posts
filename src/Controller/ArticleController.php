<?php 

namespace App\Controller;

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

         $articles = ['Art 1', 'Art 2'];
            return $this->render('articles/index.html.twig', [
            'controller_name' => 'ArticleController',
            'atricles' => $articles
        ]);
    }


}