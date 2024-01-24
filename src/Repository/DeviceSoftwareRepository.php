<?php

namespace App\Repository;

use App\Entity\DeviceSoftware;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DeviceSoftware>
 *
 * @method DeviceSoftware|null find($id, $lockMode = null, $lockVersion = null)
 * @method DeviceSoftware|null findOneBy(array $criteria, array $orderBy = null)
 * @method DeviceSoftware[]    findAll()
 * @method DeviceSoftware[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeviceSoftwareRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DeviceSoftware::class);
    }

//    /**
//     * @return DeviceSoftware[] Returns an array of DeviceSoftware objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DeviceSoftware
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
