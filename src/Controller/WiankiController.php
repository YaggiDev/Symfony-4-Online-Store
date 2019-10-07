<?php

namespace App\Controller;

use App\Entity\Articles;
use mysql_xdevapi\Exception as d;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException\Exception;

class WiankiController extends AbstractController
{
    /**
     * @Route("/",name="main_menu")
     */
    public function Main()
    {
        return $this->render('index.html.twig');
    }
    /**
     * @Route("/Omnie", name="about_me")
     */
    public function About_me()
    {
        return $this->render('About.html.twig');
    }
    /**
     * @Route("/Kontakt",name="contact")
     */
    public function Contact()
    {
//        throw new NotFoundHttpException("Page not found.");
        return $this-> render('Contact.html.twig');
    }

    /**
     * @Route("/{kategoria}", name="category_page")
     */
    public function Category_show($kategoria)
    {
        $products = $this->getDoctrine()->getRepository(Articles::class)->findBy(array('kategoria'=>$kategoria));
        return $this->render('wianki/index.html.twig',array('products'=>$products,'kategoria'=>$kategoria));
    }

    /**
     * @Route("/{kategoria}/{id}", name="product_show", methods={"GET","POST"},requirements={"id"="\d+"})
     */
    public function Product_evidence($kategoria, Articles $id)
    {
        $product = $this->getDoctrine()->getRepository(Articles::class)->find($id);
        return $this->render('wianki/show.html.twig',array('product'=>$product,'kategoria'=>$kategoria));
    }
}
