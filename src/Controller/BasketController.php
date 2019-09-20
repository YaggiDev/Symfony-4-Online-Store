<?php

namespace App\Controller;

use App\Entity\Artykuly;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Utils\Item;

class BasketController extends AbstractController
{
    /**
     * @Route("/Koszyk", name="basket")
     */
    public function index()
    {
        $item = new Item("Wianek",123,1);
        if (isset($_SESSION['basket'])) {
            return $this->render('basket/index.html.twig', [
                'controller_name' => 'BasketController',
                'item' => $item,
                'basket' => $_SESSION['basket'],
            ]);
        }
        else{
            return $this->render('basket/index.html.twig');
        }
    }
    /**
     * @Route("/koszyk", name="redirect_basket")
     */
    public function redirectToBasket()
    {
        return $this->redirectToRoute('basket');
    }
    /**
     * @Route("/prodAdd/{kategoria}/w/{id}", name="AddToBasket", methods={"POST"})
     */
    public function AddToBasket(string $kategoria, int $id, Request $request)
    {

        $product = $this->getDoctrine()->getRepository(Artykuly::class)->find($id);
        $item = new Item($product->getNazwa(),$product->getCena(),(int)$request->request->getDigits('quantity'));
        $item->AddItem();
        $this->itemSum();
        return $this->redirectToRoute('basket');
    }
    /**
     * @Route("/prodRem/Prod/w/{nazwa}", name="RemoveFromBasket")
     */
    public function RemoveFromBasket(string $nazwa)
    {
        $product = $this->getDoctrine()->getRepository(Artykuly::class)->findOneBy(array('nazwa'=>$nazwa));
        $item = new Item($product->getNazwa(),$product->getCena(),0);
        $item->RemoveItem();
        $this->itemSum();
        return $this->redirectToRoute('basket');
    }
    private function itemSum()
    {
        $count = 0;
        foreach ($_SESSION['basket'] as $array)
        {
            $count = $count + $array['quantity'];
        }
        $session = $this->get('session');
        $session->set('count',$count);
    }
}
