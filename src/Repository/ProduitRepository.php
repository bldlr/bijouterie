<?php

namespace App\Repository;

use App\Entity\Search;
use App\Entity\Produit;
use Doctrine\ORM\Query;
use App\Data\SearchData;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Produit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produit[]    findAll()
 * @method Produit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }


/**
 * Récupère les produits en lien avec la recherche
 * @return Produit[]
 */
public function findSearch(SearchData $search, $start, $produitsParPage): array
{
    $query = $this
        ->createQueryBuilder('p')
        ->select('c', 'p') // selectionne toutes les infos liées aux catégories mais aussi aux produits (moins de requètes)
        ->join('p.categories', 'c')
        ->orderBy('p.id', 'ASC')
        ->setFirstResult($start)
        ->setMaxResults($produitsParPage);

        if(!empty($search->q))
        {
            $query = $query
            ->andWhere('p.nom LIKE :q')
            ->setParameter('q', "%{$search->q}%");
        }

        if(!empty($search->min))
        {
            $query = $query
            ->andWhere('p.prix >= :min')
            ->setParameter('min', $search->min);
        }

        if(!empty($search->max))
        {
            $query = $query
            ->andWhere('p.prix <= :max')
            ->setParameter('max', $search->max);
        }


        if(!empty($search->categories))
        {
            $query = $query
            ->andWhere('c.id IN (:categories)')
            ->setParameter('categories', $search->categories);
        }


        if(!empty($search->ordre[0]))
        {
            $query = $query
            ->orderBy("p.price", "ASC");
        }

        if(!empty($search->ordre[1]))
        {
            $query = $query
            ->orderBy("p.price", "DESC");
        }

        if(!empty($search->ordre[2]))
        {
            $query = $query
            ->orderBy("p.name", "ASC");
        }

        if(!empty($search->ordre[3]))
        {
            $query = $query
            ->orderBy("p.name", "DESC");
        }

    return $query->getQuery()->getResult();
}


    public function findTen($start, $produitsParPage)
{
    return $this->createQueryBuilder('t')
        ->orderBy('t.id', 'ASC')
        ->setFirstResult($start)
        ->setMaxResults($produitsParPage)
        ->getQuery()
        ->getResult()
    ;
}
    // public function findAllWithPagination() : Query{
    //     return $this->createQueryBuilder('p')
    //                 ->getQuery();
    // }


    // public function getFiltres($propriete, $signe, $sorte)
    // {
    //     return $this->createQueryBuilder('p')
    //         ->andWhere('p.'.$propriete. ' '. $signe.' :val')
    //         ->setParameter('val', $sorte)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }



    // /**
    //  * @return Produit[] Returns an array of Produit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Produit
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}