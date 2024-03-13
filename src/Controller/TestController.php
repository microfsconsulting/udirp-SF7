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
        $liste = [];
        $total_by_order = 0;
        $total_by_order_ttc = 0;
        $current_order = null;
        //dd($orders);

        foreach ($orders as $order) {

            if($current_order == $order["number"]){
                $total_by_order = $order["total_discounted"] + $total_by_order;
                $total_by_order_ttc = $total_by_order * 1.21;
            }else{
                $total_by_order_ttc = 0;
                $total_by_order = 0;
                $total_by_order = $order["total_discounted"] + $total_by_order;
            }
            $liste[$order["number"]]['order'] = ["number" => $order["number"],"contact" => $order["contact"],"user" => $order["user"],"entity" => $order["entity"],"supplier" => $order["supplier"],"entity_number" => $order["entity_number"],"label" => $order["label"],"total_htva" => $total_by_order,"total_ttc" => $total_by_order_ttc];
            $liste[$order["number"]]["files"][$order["fileId"]] = $order["filename"];
            //$total_by_item = (((int)$order["item_amount"] * (float)$order["item_unit_price"]) * (1 - (float)$order["item_discount"] / 100));

            $liste[$order["number"]]['items'][] = ["label" => $order["item_label"],"reference" => $order["item_ref"],"amount" => $order["item_amount"],"unit_price" => $order["item_unit_price"],"discount" => $order["item_discount"],"total" => $order["total_discounted"]];
            $current_order = $order["number"];
        }

        //dd($liste);

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController','orders' => $orders
        ]);
    }
}
