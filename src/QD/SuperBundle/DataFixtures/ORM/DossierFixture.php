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
        foreach (array ("1" => "Premier",
                        "2" => "Deuxième",
                        "3" => "Troisième",
                        "4" => "Quatrième") as $key => $value) {        
            $dossier = new Dossier();
            $dossier->setTitre("{$value} dossier");
            $dossier->setSousTitre("{$value} sous-titre");
            $dossier->setContenu("<div>contenu {$key}</div>");
            $dossier->setDateDebut(\DateTime::createFromFormat("d/m/Y", "{$key}/1/2014"));
            $dossier->setDateFin(\DateTime::createFromFormat("d/m/Y", "2{$key}/12/2014"));
            $dossier->setTarif(20.43 + $key);

            $manager->persist($dossier);
            $manager->flush();

            $this->addReference("dossier-{$key}", $dossier);
        }
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return FixtureOrder::DOSSIER; // the order in which fixtures will be loaded
    }
}
