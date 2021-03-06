<?php

namespace App\Repository;

use App\Entity\Auto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Auto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Auto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Auto[]    findAll()
 * @method Auto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AutoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Auto::class);
    }

    // /**
    //  * @return Auto[] Returns an array of Auto objects
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
    public function findOneBySomeField($value): ?Auto
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findAllGreaterThanPrice($price)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.prix > :price')
            ->setParameter('price', $price)
            ->orderBy('a.prix', 'DESC')
            ->getQuery()
            ->getResult();
        # code...
    }

    // public function findAllGreaterThanPrice2($price)
    // {
    //     $em = $this->getEntityManager();
    //     $q = $em->createQuery(
    //         'SELECT a
    //         FROM App\Entity\Auto a
    //         WHERE a.prix > :p'
    //     )
    //         ->setParameter('p', $price);
    //     return $q->getResult();
    // }

    // public function findAllGreaterThanPrice3($price)
    // {
    //     $db = $this->getEntityManager()->getConnection();
    //     $r = '
    //         SELECT * FROM Auto a
    //         WHERE a.prix > :p';
    //     $result = $db->prepare($r);
    //     $result->execute(['p' => $price]);
    //     return $result->fetchAllAssociative();
    // }

    public function searchAuto($search)
    {
        if($search){
            return $this->createQueryBuilder('a')
            ->andWhere('a.marque LIKE :search OR a.modele LIKE :search')
            ->setParameter('search', '%' . $search . '%')
            ->orderBy('a.prix', 'DESC')
            ->getQuery()
            ->getResult();
        # code...
        }
        
    }
    
}
