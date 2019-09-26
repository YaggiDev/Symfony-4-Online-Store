<?php

namespace App\Controller;

use App\Entity\Orders;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class AccountController extends AbstractController
{
    /**
     * @Route("/Konto",name="account")
     */
    public function Account(UserInterface $user)
    {
        $orders = $this->getDoctrine()->getRepository(Orders::class)->findBy(array($user->getUsername()));
        return $this->render('Account/konto.html.twig', [
            'orders' => $orders
            ]);
    }
}
