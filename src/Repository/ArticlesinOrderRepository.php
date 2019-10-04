<?php

namespace App\Repository;

use App\Entity\ArticlesinOrder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ArticlesinOrder|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticlesinOrder|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticlesinOrder[]    findAll()
 * @method ArticlesinOrder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticlesinOrderRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ArticlesinOrder::class);
    }

    // /**
    //  * @return ArticlesinOrder[] Returns an array of ArticlesinOrder objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ArticlesinOrder
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
