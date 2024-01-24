<?php

namespace App\Controller;

use App\Entity\Order;
use App\Repository\OrderRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(EntityManagerInterface $em): Response
    {
        $orders = $em->getRepository(Order::class)->all();
        //dd($orders);

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController','orders' => $orders
        ]);
    }
}
