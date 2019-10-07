<?php

namespace App\Controller;

use App\Entity\Articles;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

        if (isset($_SESSION['basket'])) {
            return $this->render('basket/index.html.twig', [
                'basket' => $_SESSION['basket'],
            ]);
        }
        else{
            return $this->render('basket/index.html.twig',[
                'basket' => null
            ]);
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

        $product = $this->getDoctrine()->getRepository(Articles::class)->find($id);
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
        $product = $this->getDoctrine()->getRepository(Articles::class)->findOneBy(array('nazwa'=>$nazwa));
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
