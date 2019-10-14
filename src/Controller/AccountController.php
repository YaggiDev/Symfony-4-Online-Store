<?php

namespace App\Controller;

use App\Entity\Orders;
use App\Entity\User;
use App\Entity\Adress;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class AccountController extends AbstractController
{
    /**
     * @Route("/Konto",name="account")
     */
    public function Account(UserInterface $user)
    {
        $orders = $this->getDoctrine()->getRepository(Orders::class)->findAll();

//        $orders = $this->getDoctrine()->getRepository(Orders::class)->findBy();
        return $this->render('Account/konto.html.twig', [
          'orders' => $orders
            ]);
    }

    /**
     * @Route("/Edycja", name="edit")
     */
    public function EditInfo(Request $request, SessionInterface $session)
    {
        $user = $this->getDoctrine()->getRepository(User::class)->find($this->getUser());
        $adress = $this->getDoctrine()->getRepository(Adress::class)->find($user->getAddress());
        $form = $this->createFormBuilder($user)->add('name',TextType::class)
            ->add('surname',TextType::class)
            ->add('edit',SubmitType::class,array('label'=>'Edytuj', 'attr'=>array('class'=>'submit_button')))
        ->getForm();
       $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();
            return $this->redirectToRoute('account');
        }
        return $this->render('Account/edit.html.twig',array('form'=>$form->createView()));
    }
}
