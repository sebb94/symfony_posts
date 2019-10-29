<?php 

namespace App\Controller;
use App\Entity\Article;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method; 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends Controller{

  /** 
   * @Route("/", name="article_list")
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
   * @Route("/article/new", name="new_article")
   * @Method({"GET", "POST"})
   */

   public function new( Request $request){

    $article = new Article();
    $form = $this->createFormBuilder($article)
    ->add('title', TextType::class, array(
        "attr" => array(
            'class' => 'form-control'),

    ))->add('body', TextareaType::class, array(
        'required' => false,
        "attr" => array(
            'class' => 'form-control'),

    ))->add('save', SubmitType::class, array(
        'label' => "Create",
        "attr" => array(
            'class' => 'btn btn-primary mt-3',),     

    ))->getForm();

    return $this->render('articles/new.html.twig', [
           'form' => $form->CreateView()
        ]);



   }

   
  /** 
   * @Route("/article/{id}", name="article_show")
   * @Method({"GET"})
   */

   public function show($id){
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
                return $this->render('articles/show.html.twig', [
            'article' => $article
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