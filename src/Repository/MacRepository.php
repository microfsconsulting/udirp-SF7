<?php

namespace App\Repository;

use App\Entity\Mac;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Mac>
 *
 * @method Mac|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mac|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mac[]    findAll()
 * @method Mac[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MacRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mac::class);
    }

//    /**
//     * @return Mac[] Returns an array of Mac objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Mac
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
