<?php

namespace App\Repository;

use App\Classe\SearchDepense;
use App\Entity\Depense;
use Cassandra\Date;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\DataTransformer\DateTimeToHtml5LocalDateTimeTransformer;

/**
 * @extends ServiceEntityRepository<Depense>
 *
 * @method Depense|null find($id, $lockMode = null, $lockVersion = null)
 * @method Depense|null findOneBy(array $criteria, array $orderBy = null)
 * @method Depense[]    findAll()
 * @method Depense[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepenseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Depense::class);
    }

    public function add(Depense $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Depense $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    public function FilterByDate(SearchDepense $searchDepense){
        $query = $this->createQueryBuilder('d')
            ->select('d')
            ->orderBy('d.date', 'DESC');

        if(!empty($searchDepense->date)){
            $query = $query->andWhere('d.date = :date')
                ->setParameter('date', $searchDepense->date);
        }
        return $query->getQuery()->getResult();
    }

    public function today()
    {
        $date = new \DateTime('now');
        $date->setTime(0, 0,0);
        $query = $this->createQueryBuilder('d')
            ->select('d')
            ->andWhere('d.date = :date')
            ->setParameter('date', $date);

        return $query->getQuery()->getResult();
    }

//    /**
//     * @return Depense[] Returns an array of Depense objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Depense
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
