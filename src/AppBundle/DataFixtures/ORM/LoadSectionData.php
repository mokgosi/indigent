<?php

namespace Acme\HelloBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Section;

class LoadSectionData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $sec = new Section();
        $sec->setName('Residential');
        $sec->setLocationId(1);
        $sec->setXCoord('012345678');
        $sec->setYCoord('-2012345678');
        $sec->setCreated(new \DateTime('now'));
        $sec->setUpdated(new \DateTime('now'));
        
        $manager->persist($sec);
        $manager->flush();
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}
