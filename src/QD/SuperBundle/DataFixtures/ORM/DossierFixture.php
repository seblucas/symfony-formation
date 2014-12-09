<?php


namespace QD\SuperBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use QD\SuperBundle\Entity\Dossier;


/**
 * Description of DossierFixture
 *
 * @author formation
 */
class DossierFixture extends AbstractFixture implements OrderedFixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $dossier = new Dossier();
        $dossier->setTitre("Premier dossier");
        $dossier->setSousTitre("Premier sous-titre");
        $dossier->setContenu("<div>contenu</div>");
        $dossier->setDateDebut(\DateTime::createFromFormat("d/m/Y", "1/1/2014"));
        $dossier->setDateFin(\DateTime::createFromFormat("d/m/Y", "31/12/2014"));
        $dossier->setTarif(22.43);

        $manager->persist($dossier);
        $manager->flush();
        
        $this->addReference('dossier-1', $dossier);
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}
