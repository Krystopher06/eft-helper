<?php

namespace App\Repository;

use App\Entity\SessionSherpa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SessionSherpa|null find($id, $lockMode = null, $lockVersion = null)
 * @method SessionSherpa|null findOneBy(array $criteria, array $orderBy = null)
 * @method SessionSherpa[]    findAll()
 * @method SessionSherpa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SessionSherpaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SessionSherpa::class);
    }

    // /**
    //  * @return SessionSherpa[] Returns an array of SessionSherpa objects
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
    public function findOneBySomeField($value): ?SessionSherpa
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
