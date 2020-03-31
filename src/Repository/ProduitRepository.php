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
public function findSearch(SearchData $search): array
{

    $query = $this
        ->createQueryBuilder('p')
        ->select('c', 'p') // selectionne toutes les infos liées aux catégories mais aussi aux produits (moins de requètes)
        ->join('p.categories', 'c');
        //->orderBy('p.id', 'ASC');

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


        if(!empty($ordre = $search->ordre))
        {
            switch($ordre)
            {
                case 1 : 
                    $query = $query
                    ->orderBy("p.prix", "ASC");
                break;

                case 2 : 
                    $query = $query
                    ->orderBy("p.prix", "DESC");
                break;

                case 3 : 
                    $query = $query
                    ->orderBy("p.nom", "ASC");
                break;

                case 4 : 
                    $query = $query
                    ->orderBy("p.nom", "DESC");
                break;
                default;
            }
            
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
