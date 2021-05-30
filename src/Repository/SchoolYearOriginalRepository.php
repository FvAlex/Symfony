<?php

namespace App\Repository;

use App\Entity\SchoolYearOriginal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SchoolYearOriginal|null find($id, $lockMode = null, $lockVersion = null)
 * @method SchoolYearOriginal|null findOneBy(array $criteria, array $orderBy = null)
 * @method SchoolYearOriginal[]    findAll()
 * @method SchoolYearOriginal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SchoolYearOriginalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SchoolYearOriginal::class);
    }

    // /**
    //  * @return SchoolYearOriginal[] Returns an array of SchoolYearOriginal objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SchoolYearOriginal
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
