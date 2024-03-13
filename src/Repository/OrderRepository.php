<?php

namespace App\Repository;

use App\Entity\Order;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Order>
 *
 * @method Order|null find($id, $lockMode = null, $lockVersion = null)
 * @method Order|null findOneBy(array $criteria, array $orderBy = null)
 * @method Order[]    findAll()
 * @method Order[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Order::class);
    }

//    /**
//     * @return Order[] Returns an array of Order objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Order
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
    /**
     * @return Order[] Returns an array of Order objects
     */
    public function all() : array
    {


        $query = $this->_em->createQuery("
            SELECT o.number,CONCAT(c.first_name,' ',c.last_name) contact,CONCAT(u.first_name,' ',u.last_name) user,e.name entity,SUBSTRING(s.name,1,10) supplier,o.entity_number,CONCAT(SUBSTRING(o.label,1,50),'...') label,i.label AS item_label,i.reference AS item_ref,i.amount AS item_amount,i.unit_price AS item_unit_price,i.discount AS item_discount,(i.amount * i.unit_price) * (1 - i.discount /100) AS total_discounted,f.filename AS filename,f.id AS fileId
            FROM App:Order o
            LEFT JOIN o.contact c 
            LEFT JOIN o.entity e
            LEFT JOIN o.user u
            LEFT JOIN o.supplier s
            LEFT JOIN o.items i
            LEFT JOIN o.files f
            ORDER BY o.number DESC
            "
        );

        $query->setMaxResults(50);

        return  $query->getArrayResult();
    }
}
