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
        
        $erftype1 = new ErfType();
        $erftype1->setName('Commercial');
        $erftype1->setDescription('Short description of erf');
        $erftype1->setCreated(new \DateTime('now'));
        $erftype1->setUpdated(new \DateTime('now'));
        
        $erftype2 = new ErfType();
        $erftype2->setName('Business');
        $erftype2->setDescription('Short description of erf');
        $erftype2->setCreated(new \DateTime('now'));
        $erftype2->setUpdated(new \DateTime('now'));
        
        $manager->persist($erftype);
        $manager->persist($erftype1);
        $manager->persist($erftype2);
        
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
