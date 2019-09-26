<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class OrderController extends AbstractController
{
    /**
     * @Route("/Zamowienie-dane", name="order_info")
     */
    public function index(Request $request)
    {
        if ($request->request->get('checker')) {
            return $this->render('order/index.html.twig');
        }
        else {
            return $this->redirectToRoute('basket');
        }
    }

}
