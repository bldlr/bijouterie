<?php

namespace App\Repository;

use App\Entity\User;
use App\Entity\Search;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(UserInterface $user, string $newEncodedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newEncodedPassword);
        $this->_em->persist($user);
        $this->_em->flush();
    }
    






    public function findAllStatutFalse(){

      $builder = $this->createQueryBuilder('u');
  
      return $builder
          -> select('u')
          -> andWhere('u.statut = :val')
          -> setParameter('val', 0)
      -> getQuery()
      -> getResult();
      }


      

      public function findAllUserThisMouth($ym){
        $term =  $ym . '%';

        $builder = $this->createQueryBuilder('u');
    
        return $builder
            -> select('u')
            -> andWhere('u.register_at LIKE :val')
            -> setParameter('val', $term)
        -> getQuery()
        -> getResult();
        }

    public function findNewMembres($todayYmd){

      $builder = $this->createQueryBuilder('u');
  
      return $builder
          -> select('u')
          -> andWhere('u.register_at = :val')
          -> setParameter('val', $todayYmd)
      -> getQuery()
      -> getResult();
      }

    public function findInscriptionCroissant(){

		$builder = $this->createQueryBuilder('u');

		return $builder
        -> select('u')
        -> andWhere('u.roles = :val')
        -> setParameter('val', "ROLE_USER")
        -> orderBy('u.register_at', 'ASC')
		-> getQuery()
		-> getResult();
    }




    public function findInscriptionDecroissant(){

		$builder = $this->createQueryBuilder('u');

		return $builder
        -> select('u')
        -> andWhere('u.roles = :val')
        -> setParameter('val', "ROLE_USER")
        -> orderBy('u.register_at', 'DESC')
		-> getQuery()
		-> getResult();
    }

    public function find2019(){

		$builder = $this->createQueryBuilder('u');

		return $builder
        -> select('u')
        -> andWhere('u.register_at LIKE :val')
        -> setParameter('val', "2019%")
		-> getQuery()
		-> getResult();
    }

    public function find2020(){

		$builder = $this->createQueryBuilder('u');

		return $builder
        -> select('u')
        -> andWhere('u.register_at LIKE :val')
        -> setParameter('val', "2020%")
		-> getQuery()
		-> getResult();
    }

    public function findNomAz(){

		$builder = $this->createQueryBuilder('u');

        return $builder
        -> select('u')
        -> andWhere('u.roles = :val')
        -> setParameter('val', "ROLE_USER")
        -> orderBy('u.nom', 'ASC')
		-> getQuery()
		-> getResult();
    }

    public function findNomZa(){

		$builder = $this->createQueryBuilder('u');

        return $builder
        -> select('u')
        -> andWhere('u.roles = :val')
        -> setParameter('val', "ROLE_USER")
        -> orderBy('u.nom', 'DESC')
		-> getQuery()
		-> getResult();
    }

    public function findPrenomAz(){

		$builder = $this->createQueryBuilder('u');

        return $builder
        -> select('u')
        -> andWhere('u.roles = :val')
        -> setParameter('val', "ROLE_USER")
        -> orderBy('u.prenom', 'ASC')
		-> getQuery()
		-> getResult();
    }

    public function findPrenomZa(){

		$builder = $this->createQueryBuilder('u');

        return $builder
        -> select('u')
        -> andWhere('u.roles = :val')
        -> setParameter('val', "ROLE_USER")
        -> orderBy('u.prenom', 'DESC')
		-> getQuery()
		-> getResult();
    }


    public function findEmailAz(){

		$builder = $this->createQueryBuilder('u');

        return $builder
        -> select('u')
        -> andWhere('u.roles = :val')
        -> setParameter('val', "ROLE_USER")
        -> orderBy('u.email', 'ASC')
		-> getQuery()
		-> getResult();
    }

    public function findEmailZa(){

		$builder = $this->createQueryBuilder('u');

        return $builder
        -> select('u')
        -> andWhere('u.roles = :val')
        -> setParameter('val', "ROLE_USER")
        -> orderBy('u.email', 'DESC')
		-> getQuery()
		-> getResult();
    }

    public function findEvery($term){
		
		$term = '%' . $term . '%';
		
		
		$builder = $this -> createQueryBuilder('u');
		return $builder 
			//-> select('p')
			-> where('u.email LIKE :term')
			-> orWhere('u.register_at LIKE :term')
			-> setParameter(':term', $term)
			-> getQuery() -> getResult();
	}













    // /**
    //  * @return User[] Returns an array of User objects
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
    public function findOneBySomeField($value): ?User
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
