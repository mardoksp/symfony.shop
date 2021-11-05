<?php

namespace App\Controller\Main;

use App\Entity\Cart;
use App\Entity\CartProduct;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api", name="main_api_")
 */

class CartApiController extends AbstractController
{
    /**
     * @Route("/cart", methods="POST",  name="cart_save")
     */
    public function saveCart(Request $request, ProductRepository $productRepository): Response
    {
        $productId = $request->request->get('productId');
        $phpSessionId = $request->cookies->get('PHPSESSID');

        $product = $productRepository->findOneBy(['uuid' =>$productId]);

        $cart = new Cart();
        $cart->setSessionId($phpSessionId);

        $cartProduct = new CartProduct();
        $cartProduct->setCart($cart);
        $cartProduct->setQuantity(1);
        $cartProduct->setProduct($product);

        $cart->addCartProduct($cartProduct);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($cart);
        $entityManager->persist($cartProduct);
        $entityManager->flush();
        dd($cart, $cartProduct);

       return new JsonResponse([
           'success' => false,
           'data' => [
               'test' => 123
           ]
       ]);
    }
}
