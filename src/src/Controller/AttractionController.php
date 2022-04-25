<?php
namespace App\Controller;
use \Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class AttractionController extends AbstractController{
    /**
     * @Route (path="/attraction")
     * @return Response
     * @throws \Exception
     */
    public function index():Response{
        $attraction="select * from attraction";
        echo $attraction;
        return $this->render('attraction/template1.html.twig',['attraction'=>$attraction]);
    }
}