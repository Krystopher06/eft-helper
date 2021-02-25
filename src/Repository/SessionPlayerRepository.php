<?php

namespace App\Repository;

use App\Entity\SessionPlayer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SessionPlayer|null find($id, $lockMode = null, $lockVersion = null)
 * @method SessionPlayer|null findOneBy(array $criteria, array $orderBy = null)
 * @method SessionPlayer[]    findAll()
 * @method SessionPlayer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SessionPlayerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SessionPlayer::class);
    }

    // /**
    //  * @return SessionPlayer[] Returns an array of SessionPlayer objects
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
    public function findOneBySomeField($value): ?SessionPlayer
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
