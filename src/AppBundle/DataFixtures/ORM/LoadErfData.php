<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Erf;

class LoadErfData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $erf = new Erf();
        $erf->setErfTypeId(1);
        $erf->setErfNo('A200');
        $erf->setStreetName('Street name 1');
        $erf->setSectionId(1);
        $erf->setLocationId(1);
        $erf->setOwnerFirstName('Owner');
        $erf->setOwnerLastName('Owner');
        $erf->setOwnerMobile('0720112966');
        $erf->setOwnerTelephone('0123464545');
        $erf->setOwnerEmail('owner@mail.com');
        $erf->setOwnerAddress('800 Church street');
        $erf->setOwnerIdNo('1234567891234');
        $erf->setCreated(new \DateTime('now'));
        $erf->setUpdated(new \DateTime('now'));
        
        $manager->persist($erf);
        $manager->flush();
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 4; // the order in which fixtures will be loaded
    }
}
