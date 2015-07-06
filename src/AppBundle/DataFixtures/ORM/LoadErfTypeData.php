<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\ErfType;

class LoadErfTypeData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $erftype = new ErfType();
        $erftype->setName('Residential');
        $erftype->setDescription('Short description of erf');
        $erftype->setCreated(new \DateTime('now'));
        $erftype->setUpdated(new \DateTime('now'));
        
        $manager->persist($erftype);
        $manager->flush();
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}
