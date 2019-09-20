<?php

namespace App\Repository;

use App\Entity\Artykuly;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Artykuly|null find($id, $lockMode = null, $lockVersion = null)
 * @method Artykuly|null findOneBy(array $criteria, array $orderBy = null)
 * @method Artykuly[]    findAll()
 * @method Artykuly[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArtykulyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Artykuly::class);
    }

    // /**
    //  * @return Artykuly[] Returns an array of Artykuly objects
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


    public function findOneById($value): ?Artykuly
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.id_artykulu = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

}
