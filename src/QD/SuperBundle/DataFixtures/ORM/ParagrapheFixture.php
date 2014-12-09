<?php


namespace QD\SuperBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use QD\SuperBundle\Entity\Paragraphe;


/**
 * Description of ParagraphFixture
 *
 * @author formation
 */
class ParagraphFixture extends AbstractFixture implements OrderedFixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $paragraphe = new Paragraphe();
        $paragraphe->setTitre("Premier Paragraphe");
        $paragraphe->setSousTitre("Premier sous-titre du paragraphe");
        $paragraphe->setContenu("<div>Paragraphe 1 contenu</div>");
        $paragraphe->setOrdre(1);
        $paragraphe->setDossier($this->getReference('dossier-1'));

        $manager->persist($paragraphe);
        $manager->flush();
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return FixtureOrder::PARAGRAPHE; // the order in which fixtures will be loaded
    }
}
