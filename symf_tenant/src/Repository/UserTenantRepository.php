<?php

namespace App\Repository;

use App\Entity\UserTenant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserTenant|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserTenant|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserTenant[]    findAll()
 * @method UserTenant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserTenantRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserTenant::class);
    }

    // /**
    //  * @return UserTenant[] Returns an array of UserTenant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserTenant
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
