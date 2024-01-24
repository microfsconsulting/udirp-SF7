<?php

namespace App\Repository;

use App\Entity\ContactSoftware;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ContactSoftware>
 *
 * @method ContactSoftware|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContactSoftware|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContactSoftware[]    findAll()
 * @method ContactSoftware[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactSoftwareRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContactSoftware::class);
    }

//    /**
//     * @return ContactSoftware[] Returns an array of ContactSoftware objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ContactSoftware
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
