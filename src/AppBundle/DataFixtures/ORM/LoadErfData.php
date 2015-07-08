<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Erf;

class LoadErfData extends AbstractFixture  implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $erf = new Erf();
        $erf->setErfType($this->getReference('ref-erfType'));
        $erf->setErfNo('A200');
        $erf->setStreetName('Street name 1');
        $erf->setSection($this->getReference('ref-section'));
        $erf->setLocation($this->getReference('ref-location'));
        $erf->setOwnerFirstName('Owner');
        $erf->setOwnerLastName('Owner');
        $erf->setOwnerMobile('0720112966');
        $erf->setOwnerTelephone('0123464545');
        $erf->setOwnerEmail('owner@mail.com');
        $erf->setOwnerAddress('800 Church street');
        $erf->setOwnerIdNo('1234567891234');
        $erf->setCreated(new \DateTime('now'));
        $erf->setUpdated(new \DateTime('now'));
        
        $erf1 = new Erf();
        $erf1->setErfType($this->getReference('ref-erfType'));
        $erf1->setErfNo('A201');
        $erf1->setStreetName('Street name 1');
        $erf1->setSection($this->getReference('ref-section'));
        $erf1->setLocation($this->getReference('ref-location'));
        $erf1->setOwnerFirstName('Owner');
        $erf1->setOwnerLastName('Owner');
        $erf1->setOwnerMobile('0720112966');
        $erf1->setOwnerTelephone('0123464545');
        $erf1->setOwnerEmail('owner@mail.com');
        $erf1->setOwnerAddress('800 Church street');
        $erf1->setOwnerIdNo('1234567891234');
        $erf1->setCreated(new \DateTime('now'));
        $erf1->setUpdated(new \DateTime('now'));
        
        $erf2 = new Erf();
        $erf2->setErfType($this->getReference('ref-erfType'));
        $erf2->setErfNo('A202');
        $erf2->setStreetName('Street name 1');
        $erf2->setSection($this->getReference('ref-section'));
        $erf2->setLocation($this->getReference('ref-location'));
        $erf2->setOwnerFirstName('Owner');
        $erf2->setOwnerLastName('Owner');
        $erf2->setOwnerMobile('0720112966');
        $erf2->setOwnerTelephone('0123464545');
        $erf2->setOwnerEmail('owner@mail.com');
        $erf2->setOwnerAddress('800 Church street');
        $erf2->setOwnerIdNo('1234567891234');
        $erf2->setCreated(new \DateTime('now'));
        $erf2->setUpdated(new \DateTime('now'));
        
        $erf3 = new Erf();
        $erf3->setErfType($this->getReference('ref-erfType'));
        $erf3->setErfNo('A203');
        $erf3->setStreetName('Street name 1');
        $erf3->setSection($this->getReference('ref-section'));
        $erf3->setLocation($this->getReference('ref-location'));
        $erf3->setOwnerFirstName('Owner');
        $erf3->setOwnerLastName('Owner');
        $erf3->setOwnerMobile('0720112966');
        $erf3->setOwnerTelephone('0123464545');
        $erf3->setOwnerEmail('owner@mail.com');
        $erf3->setOwnerAddress('800 Church street');
        $erf3->setOwnerIdNo('1234567891234');
        $erf3->setCreated(new \DateTime('now'));
        $erf3->setUpdated(new \DateTime('now'));
        
        $manager->persist($erf);
        $manager->persist($erf1);
        $manager->persist($erf2);
        $manager->persist($erf3);
        $manager->flush();
        
        $this->addReference('ref-erf', $erf);
    }
    
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 4; // the order in which fixtures will be loaded
    }
}
