<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Owner;

class LoadOwnerData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $s = 1;
        $owner = new Owner();
        $owner->setSocialSecurityNo(1234567890123);
        $owner->setLastName('Foo');
        $owner->setFirstName('Bar');
        $owner->setGender('Male');
        $owner->setEmail('mail@email.com');
        $owner->setMobile('0720112966');
        $owner->setTelephone('0210112966');
        $owner->setAddress('230 Street');
        $owner->setSection($this->getReference('ref-section'.$s));
        $owner->setLocation($this->getReference('ref-location'));
        $owner->setCreated(new \DateTime('now'));
        $owner->setUpdated(new \DateTime('now'));
        $manager->persist($owner);

        $this->addReference('ref-owner', $owner);

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
