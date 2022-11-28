<?php

namespace App\Repository;

use App\Entity\UniteCentrale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UniteCentrale>
 *
 * @method UniteCentrale|null find($id, $lockMode = null, $lockVersion = null)
 * @method UniteCentrale|null findOneBy(array $criteria, array $orderBy = null)
 * @method UniteCentrale[]    findAll()
 * @method UniteCentrale[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UniteCentraleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UniteCentrale::class);
    }

    public function add(UniteCentrale $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(UniteCentrale $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return UniteCentrale[] Returns an array of UniteCentrale objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UniteCentrale
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
