<?php
namespace App\Controller;
use \Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class HomeController extends AbstractController{
    /**
     * @Route (path="/")
     * @return Response
     * @throws \Exception
     */
    public function index():Response{
    return $this->render('home/template1.html.twig',[]);
    }
}