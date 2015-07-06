<?php

namespace Acme\HelloBundle\DataFixtures\ORM;

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
        $erf->setErfStreetName('Street name 1');
        $erf->setErfSectionId(1);
        $erf->setErfLocationId(1);
        $erf->setErfOwnerFirstName('Owner');
        $erf->setErfOwnerLastName('Owner');
        $erf->setErfOwnerMobile('0720112966');
        $erf->setErfOwnerTelephone('0123464545');
        $erf->setErfOwnerEmail('owner@mail.com');
        $erf->setErfOwnerAddress('800 Church street');
        $erf->setErfCreated(new \DateTime('now'));
        $erf->setErfUpated(new \DateTime('now'));
        
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
