<?php

namespace App\Repository;

use App\Classe\SearchRecette;
use App\Entity\Recette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Query\Parameter;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Recette>
 *
 * @method Recette|null find($id, $lockMode = null, $lockVersion = null)
 * @method Recette|null findOneBy(array $criteria, array $orderBy = null)
 * @method Recette[]    findAll()
 * @method Recette[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecetteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Recette::class);
    }

    public function add(Recette $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Recette $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function Filter(SearchRecette $recette){
        $query = $this->createQueryBuilder('r')
            ->select('r');

        if(!empty($recette->string)){
            $query = $query
                ->andWhere('r.name LIKE :string OR r.observation LIKE :client')
                ->setParameters(new ArrayCollection(array(
                            new Parameter('string', "%$recette->string%"),
                            new Parameter('client', "%$recette->string%"),
                )));
        }
        if(!empty($recette->date)){
            $query = $query
                ->andWhere('r.date = :date')
                ->setParameter('date', $recette->date);
        }
        if(!empty($recette->categories)){
            $query = $query
                ->join( 'r.payment', 'p')
                ->andWhere('p.id IN (:categories)')
                ->setParameter('categories', $recette->categories);
        }
        return $query->getQuery()->getResult();
    }
    public function RecetteToday(){
        $date  = new \DateTime('now');
        $date->setTime(0, 0, 0);

        $query = $this->createQueryBuilder('r')
            ->select('r')
            ->andWhere('r.date = :date')
            ->setParameter('date', $date);
       return $query->getQuery()->getResult();
    }

//    /**
//     * @return Recette[] Returns an array of Recette objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Recette
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
