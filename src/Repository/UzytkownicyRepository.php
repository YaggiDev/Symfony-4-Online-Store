<?php

namespace App\Repository;

use App\Entity\Uzytkownicy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @method Uzytkownicy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Uzytkownicy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Uzytkownicy[]    findAll()
 * @method Uzytkownicy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UzytkownicyRepository extends ServiceEntityRepository implements UserLoaderInterface
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Uzytkownicy::class);
    }
    public function loaddUserByUsername($username)
    {

    }
    // /**
    //  * @return Uzytkownicy[] Returns an array of Uzytkownicy objects
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
    public function findOneBySomeField($value): ?Uzytkownicy
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    /**
     * Loads the user for the given username.
     *
     * This method must return null if the user is not found.
     *
     * @param string $username The username
     *
     * @return UserInterface|null
     */
    public function loadUserByUsername($username)
    {
        return $this->createQueryBuilder('u')
            ->where('u.username =:query')
            ->setParameter('query',$username)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
