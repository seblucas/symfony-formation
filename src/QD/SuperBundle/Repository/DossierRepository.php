<?php

namespace QD\SuperBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Description of DossierRepository
 *
 * @author formation
 */
class DossierRepository extends EntityRepository {
    //put your code here
    /**
     * 
     * @param type $id
     * @return \QD\SuperBundle\Entity\Dossier
     */
    public function findWithDeps($id) {
        $query = $this->createQueryBuilder('d')
            ->leftJoin("d.paragraphes", "p")
            ->andWhere('d.id = :id')
            ->setParameter('id', $id)
            ->orderBy('p.ordre', 'ASC')
            ->addSelect('p')
            ->getQuery();
        
        //return $query->getResult()[0];
        return $query->getOneOrNullResult();
        
    }
}
