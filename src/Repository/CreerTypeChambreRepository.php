<?php

namespace App\Repository;

use App\Entity\CreerTypeChambre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CreerTypeChambre>
 *
 * @method CreerTypeChambre|null find($id, $lockMode = null, $lockVersion = null)
 * @method CreerTypeChambre|null findOneBy(array $criteria, array $orderBy = null)
 * @method CreerTypeChambre[]    findAll()
 * @method CreerTypeChambre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CreerTypeChambreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CreerTypeChambre::class);
    }

    public function save(CreerTypeChambre $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CreerTypeChambre $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CreerTypeChambre[] Returns an array of CreerTypeChambre objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CreerTypeChambre
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
