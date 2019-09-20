<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    /**
     * @Route("/Konto",name="account")
     */
    public function Account()
    {
        return $this->render('Account/konto.html.twig');
    }
}
