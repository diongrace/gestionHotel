<?php

namespace App\Repository;

use App\Entity\NouvelleReservation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NouvelleReservation>
 *
 * @method NouvelleReservation|null find($id, $lockMode = null, $lockVersion = null)
 * @method NouvelleReservation|null findOneBy(array $criteria, array $orderBy = null)
 * @method NouvelleReservation[]    findAll()
 * @method NouvelleReservation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NouvelleReservationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NouvelleReservation::class);
    }

    public function save(NouvelleReservation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(NouvelleReservation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return NouvelleReservation[] Returns an array of NouvelleReservation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?NouvelleReservation
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
