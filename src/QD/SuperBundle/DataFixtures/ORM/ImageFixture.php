<?php


namespace QD\SuperBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use QD\SuperBundle\Entity\Image;


/**
 * Description of ImageFixture
 *
 * @author formation
 */
class ImageFixture extends AbstractFixture implements OrderedFixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $image = new Image();
        $image->setNom("Placeholder");
        $image->setUrl("http://placehold.it/350x150");

        $manager->persist($image);
        $manager->flush();
        $this->addReference('image-1', $image);
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return FixtureOrder::IMAGE; // the order in which fixtures will be loaded
    }
}
