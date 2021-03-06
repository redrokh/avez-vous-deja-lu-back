<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Category::class);
    }

    // /**
    //  * @return Category[] Returns an array of Category objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Category
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
     * returns all anecdotes by category
    * @return Anecdote[] Return an array of Anecdote objects
    */
    public function findByCategory($categorySlug)
    {
        $dql = "SELECT a FROM App\Entity\Anecdote a JOIN a.category c WHERE c.slug =". " '$categorySlug' ";
    
        $query = $this->getEntityManager()->createQuery($dql);
        $result = $query->execute();

        return $result;
    }

    /**
     * returns all informations of category by category slug
    * @return Category Return an category object
    */
    public function findCategoryNameBySlug($categorySlug)
    {
        $dql = "SELECT c FROM App\Entity\Category c WHERE c.slug =". " '$categorySlug' ";
    
        $query = $this->getEntityManager()->createQuery($dql);
        $result = $query->execute();

        return $result;
    }
    
}
